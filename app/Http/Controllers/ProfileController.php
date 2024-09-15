<?php

namespace Azuriom\Http\Controllers;

use Azuriom\Models\ActionLog;
use Azuriom\Models\User;
use Azuriom\Notifications\AlertNotification;
use Azuriom\Notifications\UserDelete;
use Azuriom\Rules\Username;
use Azuriom\Support\Discord\LinkedRoles;
use Azuriom\Support\QrCodeRenderer;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Laravel\Socialite\Facades\Socialite;
use PragmaRX\Google2FA\Google2FA;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(function (Request $request, callable $next) {
            abort_if(! setting('user.delete'), 404);

            return $next($request);
        })->only(['showDelete', 'showDeleteConfirm', 'sendDelete', 'confirmDelete']);
    }

    /**
     * Show the user profile.
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $discordLink = setting('discord.link_roles', false);
        $emailVerification = setting('mail.users_email_verification', false);

        return view('profile.index', [
            'user' => $user,
            'canChangeName' => ! oauth_login() && setting('user.change_name', false),
            'canUploadAvatar' => setting('user.upload_avatar', false) && $user->canUploadAvatar(),
            'hasAvatar' => $user->hasUploadedAvatar(),
            'canDelete' => setting('user.delete', false),
            'canVerifyEmail' => $user->email !== null && ! $user->hasVerifiedEmail() && $emailVerification,
            'discordAccount' => $discordLink ? $user->discordAccount : null,
            'enableDiscordLink' => $discordLink,
        ]);
    }

    /**
     * Update the user email address.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateEmail(Request $request)
    {
        $this->validate($request, [
            'email_confirm_pass' => oauth_login()
                ? ['sometimes', 'nullable']
                : ['required', 'current_password'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
        ]);

        $user = $request->user();

        $user->forceFill([
            'email' => $request->input('email'),
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();

        return to_route('profile.index')
            ->with('success', trans('messages.profile.updated'));
    }

    /**
     * Update the user password.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'password_confirm_pass' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', Password::default()],
        ]);

        $password = $request->input('password');
        $user = $request->user();

        $user->update([
            'password' => $password,
            'access_token' => null,
        ]);

        Auth::logoutOtherDevices($password);
        event(new PasswordReset($user));

        return to_route('profile.index')
            ->with('success', trans('messages.profile.updated'));
    }

    public function updateName(Request $request): RedirectResponse
    {
        abort_if(oauth_login() || ! setting('user.change_name'), 403);

        $validated = $this->validate($request, [
            'name' => [
                'required', 'max:25', new Username(),
                Rule::unique('users', 'name')->ignore($request->user()),
            ],
        ]);

        $request->user()->update($validated);

        return to_route('profile.index')
            ->with('success', trans('messages.profile.updated'));
    }

    public function uploadAvatar(Request $request)
    {
        $user = $request->user();

        abort_if(! setting('user.upload_avatar', false) || ! $user->canUploadAvatar(), 403);

        $this->validate($request, [
            'image' => ['required', 'mimes:jpg,jpeg,png,gif', 'dimensions:ratio=1', 'max:2048'],
        ]);

        $user->storeImage($request->file('image'), true);

        return to_route('profile.index')
            ->with('success', trans('messages.profile.updated'));
    }

    public function deleteAvatar(Request $request)
    {
        if ($request->user()->hasUploadedAvatar()) {
            $request->user()->deleteImage(true);
        }

        return to_route('profile.index')
            ->with('success', trans('messages.profile.updated'));
    }

    /**
     * Show the form to enable two-factor authentification.
     *
     * @throws \PragmaRX\Google2FA\Exceptions\Google2FAException
     */
    public function show2fa(Request $request)
    {
        if ($request->user()->hasTwoFactorAuth()) {
            return view('profile.2fa.index', [
                'user' => $request->user(),
                'codesBackupName' => Str::slug(site_name()).'-codes.txt',
            ]);
        }

        $google2fa = new Google2FA();
        $secret = $request->session()->get('2fa.secret', $google2fa->generateSecretKey());
        $qrCodeUrl = $google2fa->getQRCodeUrl(site_name(), $request->user()->email, $secret);

        $request->session()->put('2fa.secret', $secret);

        return view('profile.2fa.enable', [
            'secret' => $secret,
            'qrCode' => new HtmlString(QrCodeRenderer::render($qrCodeUrl, 250)),
        ]);
    }

    public function download2faCodes(Request $request)
    {
        abort_if(! $request->user()->hasTwoFactorAuth(), 404);

        $codes = $request->user()->two_factor_recovery_codes;

        return new Response(Arr::join($codes, "\n"), 200, [
            'Content-Disposition' => 'attachment',
            'Content-Type' => 'text/plain',
        ]);
    }

    /**
     * Enable two-factor authentification for this user.
     *
     * @throws \Illuminate\Validation\ValidationException
     * @throws \PragmaRX\Google2FA\Exceptions\Google2FAException
     */
    public function enable2fa(Request $request)
    {
        $this->validate($request, [
            'code' => ['required', 'string'],
        ]);

        if ($request->user()->hasTwoFactorAuth()) {
            return to_route('profile.2fa.index');
        }

        $code = Str::remove(' ', $request->input('code'));
        $secret = $request->session()->get('2fa.secret');

        if (! $secret || ! (new Google2FA())->verifyKey($secret, $code)) {
            throw ValidationException::withMessages(['code' => trans('auth.2fa.invalid')]);
        }

        $request->user()->forceFill([
            'two_factor_secret' => $secret,
            'two_factor_recovery_codes' => $request->user()->generateRecoveryCodes(),
        ])->save();

        ActionLog::log('users.2fa.enabled', null, ['ip' => $request->ip()]);

        return to_route('profile.2fa.index');
    }

    /**
     * Disable two-factor authentification for this user.
     */
    public function disable2fa(Request $request)
    {
        $request->user()->forceFill([
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
        ])->save();

        $request->session()->remove('2fa.secret');

        ActionLog::log('users.2fa.disabled', null, ['ip' => $request->ip()]);

        return to_route('profile.index')
            ->with('success', trans('messages.profile.2fa.disabled'));
    }

    /**
     * Update the user preferred theme.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function theme(Request $request)
    {
        $this->validate($request, [
            'theme' => ['required', 'in:light,dark'],
        ]);

        $cookie = cookie('theme', $request->input('theme'), 525600, null, null, null, false);

        return $request->expectsJson()
            ? response()->json($request->only('theme'))->withCookie($cookie)
            : redirect()->back()->withCookie($cookie);
    }

    /**
     * Redirect the user to the Discord OAuth page to link his account.
     */
    public function linkDiscord()
    {
        return Socialite::driver('discord')->redirect();
    }

    /**
     * Unlink the Discord account from the user.
     */
    public function unlinkDiscord(Request $request)
    {
        $discordAccount = $request->user()->discordAccount;

        if ($discordAccount !== null) {
            LinkedRoles::clearRole($discordAccount);

            $discordAccount->delete();
        }

        return to_route('profile.index')
            ->with('success', trans('messages.status.success'));
    }

    /**
     * Handle the Discord OAuth callback.
     */
    public function discordCallback(Request $request)
    {
        abort_if(! $request->filled('code'), 401);

        $user = $request->user();
        $discordUser = Socialite::driver('discord')->user();

        $discordAccount = $user->discordAccount()->updateOrCreate([], [
            'name' => $discordUser->getNickname(),
            'discord_user_id' => $discordUser->getId(),
            'access_token' => $discordUser->token,
            'refresh_token' => $discordUser->refreshToken,
            'expires_at' => now()->addSeconds($discordUser->expiresIn),
        ]);

        LinkedRoles::linkRole($discordAccount);

        return to_route('profile.index')
            ->with('success', trans('messages.profile.discord.linked'));
    }

    public function showDelete()
    {
        return view('profile.delete', ['confirmDelete' => false]);
    }

    public function sendDelete(Request $request)
    {
        $request->user()->notify(new UserDelete());

        return to_route('profile.index')
            ->with('success', trans('messages.profile.delete.sent'));
    }

    public function showDeleteConfirm()
    {
        return view('profile.delete', ['confirmDelete' => true]);
    }

    public function confirmDelete(Request $request)
    {
        $user = $request->user();

        abort_if($request->integer('id') !== $user->id, 403);

        ActionLog::log('users.deleted', $user);

        $user->delete();
        $request->session()->flush();

        return to_route('home')
            ->with('success', trans('messages.profile.delete.success'));
    }

    /**
     * Transfer money from one user to another.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function transferMoney(Request $request)
    {
        abort_if(! setting('users.money_transfer'), 403);

        $this->validate($request, [
            'name' => ['required'],
            'money' => ['required', 'numeric', 'min:0.01'],
        ]);

        $user = $request->user();
        $money = $request->input('money');

        $receiver = User::where('game_id', $request->input('name'))
            ->orWhere('name', $request->input('name'))
            ->first();

        if ($receiver === null || $user->is($receiver)) {
            throw ValidationException::withMessages([
                'name' => trans('messages.profile.money_transfer.user'),
            ]);
        }

        if ($user->money < $money) {
            throw ValidationException::withMessages([
                'money' => trans('messages.profile.money_transfer.balance'),
            ]);
        }

        $user->removeMoney($money);
        $receiver->addMoney($money);

        ActionLog::log('users.transfer', $receiver, ['money' => $money]);

        (new AlertNotification(trans('messages.profile.money_transfer.notification', [
            'user' => $user->name,
            'money' => format_money($money),
        ])))
            ->from($user)
            ->send($receiver);

        return to_route('profile.index')
            ->with('success', trans('messages.profile.money_transfer.success'));
    }
}
