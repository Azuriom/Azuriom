<?php

namespace Azuriom\Http\Controllers;

use Azuriom\Models\ActionLog;
use Azuriom\Models\User;
use Azuriom\Notifications\AlertNotification;
use Azuriom\Notifications\UserDelete;
use Azuriom\Rules\Username;
use Azuriom\Support\QrCodeRenderer;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use PragmaRX\Google2FA\Google2FA;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(function (Request $request, callable $next) {
            abort_if(! setting('user.delete'), 404);

            return $next($request);
        })->only(['showDelete', 'sendDelete', 'confirmDelete']);
    }

    /**
     * Show the user profile.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('profile.index', [
            'user' => $request->user(),
            'canChangeName' => ! oauth_login() && setting('user.change_name', false),
            'canDelete' => setting('user.delete', false),
        ]);
    }

    /**
     * Update the user email address.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
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

        return redirect()->route('profile.index')
            ->with('success', trans('messages.profile.updated'));
    }

    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'password_confirm_pass' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', Password::default()],
        ]);

        $password = $request->input('password');
        $user = $request->user();

        $user->update(['password' => Hash::make($password)]);
        Auth::logoutOtherDevices($password);
        event(new PasswordReset($user));

        return redirect()->route('profile.index')
            ->with('success', trans('messages.profile.updated'));
    }

    /**
     * @param  Request  $request
     * @return RedirectResponse
     */
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

        return redirect()->route('profile.index')
            ->with('success', trans('messages.profile.updated'));
    }

    /**
     * Show the form to enable two-factor authentification.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
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
            return redirect()->route('profile.2fa.index');
        }

        $code = str_replace(' ', '', $request->input('code'));
        $secret = $request->session()->get('2fa.secret');

        if (! $secret || ! (new Google2FA())->verifyKey($secret, $code)) {
            throw ValidationException::withMessages(['code' => trans('auth.2fa.invalid')]);
        }

        $request->user()->forceFill([
            'two_factor_secret' => $secret,
            'two_factor_recovery_codes' => $request->user()->generateRecoveryCodes(),
        ])->save();

        ActionLog::log('users.2fa.enabled', null, ['ip' => $request->ip()]);

        return redirect()->route('profile.2fa.index');
    }

    /**
     * Disable two-factor authentification for this user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function disable2fa(Request $request)
    {
        $request->user()->forceFill([
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
        ])->save();

        $request->session()->remove('2fa.secret');

        ActionLog::log('users.2fa.disabled', null, ['ip' => $request->ip()]);

        return redirect()->route('profile.index')
            ->with('success', trans('messages.profile.2fa.disabled'));
    }

    public function theme(Request $request)
    {
        $this->validate($request, [
            'theme' => ['required', 'in:light,dark'],
        ]);

        $cookie = cookie('theme', $request->input('theme'), 525600, null, null, null, false);

        return redirect()->back()->withCookie($cookie);
    }

    public function showDelete()
    {
        return view('profile.delete', ['confirmDelete' => false]);
    }

    public function sendDelete(Request $request)
    {
        $request->user()->notify(new UserDelete());

        return redirect()
            ->route('profile.index')
            ->with('success', trans('messages.profile.delete.sent'));
    }

    public function showDeleteConfirm()
    {
        return view('profile.delete', ['confirmDelete' => true]);
    }

    public function confirmDelete(Request $request)
    {
        $user = $request->user();

        abort_if((int) $request->input('id') !== $user->id, 403);
        ActionLog::log('users.deleted', $user);

        $user->delete();
        $request->session()->flush();

        return redirect()
            ->route('home')
            ->with('success', trans('messages.profile.delete.success'));
    }

    public function transferMoney(Request $request)
    {
        abort_if(! setting('users.money_transfer'), 403);

        $this->validate($request, [
            'name' => ['required', 'exists:users,name'],
            'money' => ['required', 'numeric', 'min:0.01'],
        ]);

        $user = $request->user();
        $money = $request->input('money');

        $receiver = User::firstWhere('name', $request->input('name'));

        if ($user->is($receiver)) {
            throw ValidationException::withMessages([
                'name' => trans('messages.profile.money_transfer.self'),
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

        return redirect()->route('profile.index')
            ->with('success', trans('messages.profile.money_transfer.success'));
    }
}
