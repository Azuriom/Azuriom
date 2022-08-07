<?php

namespace Azuriom\Http\Controllers;

use Azuriom\Models\ActionLog;
use Azuriom\Models\User;
use Azuriom\Notifications\AlertNotification;
use Azuriom\Notifications\UserDelete;
use Azuriom\Support\QrCodeRenderer;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\HtmlString;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use PragmaRX\Google2FA\Google2FA;

class ProfileController extends Controller
{
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

        return redirect()->route('profile.index')->with('success', trans('messages.profile.updated'));
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

        return redirect()->route('profile.index')->with('success', trans('messages.profile.updated'));
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
            return view('profile.2fa.index', ['user' => $request->user()]);
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

        return redirect()->route('profile.index')->with('success', trans('messages.profile.2fa.disabled'));
    }

    public function theme(Request $request)
    {
        $this->validate($request, [
            'theme' => ['required', 'in:light,dark'],
        ]);

        $cookie = cookie('theme', $request->input('theme'), 525600, null, null, null, false);

        return redirect()->back()->withCookie($cookie);
    }

    public function delete(Request $request)
    {
        abort_if(! setting('user.delete'), 404);

        $request->user()->notify(new UserDelete());

        return redirect()
            ->back()
            ->with('success', trans('messages.profile.delete.sent'));
    }

    public function confirmDelete(Request $request)
    {
        $user = $request->user();

        abort_if(! setting('user.delete'), 404);
        abort_if((int) $request->input('id') !== $user->id, 403);

        ActionLog::log('users.deleted', $user);

        $user->delete();
        $request->session()->flush();

        return redirect()
            ->back()
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

        $notification = (new AlertNotification(trans('messages.profile.money_transfer.notification', [
            'user' => $user->name,
            'money' => format_money($money),
        ])))->from($user);

        $receiver->notifications()->create($notification->toArray());

        return redirect()->route('profile.index')
            ->with('success', trans('messages.profile.money_transfer.success'));
    }
}
