<?php

namespace Azuriom\Http\Controllers;

use Azuriom\Models\ActionLog;
use Azuriom\Models\User;
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
        return view('profile.index', ['user' => $request->user()]);
    }

    /**
     * Update the user e-mail address.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateEmail(Request $request)
    {
        $this->validate($request, [
            'email_confirm_pass' => ['required', 'password'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
        ]);

        $request->user()->update($request->only('email'));

        return redirect()->route('profile.index')->with('success', trans('messages.profile.updated'));
    }

    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'password_confirm_pass' => ['required', 'password'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $password = Hash::make($request->input('password'));

        $request->user()->update(['password' => $password]);

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
            return redirect()->route('profile.index');
        }

        $google2fa = new Google2FA();
        $secret = $request->old('2fa_key', $google2fa->generateSecretKey());
        $otpUrl = $google2fa->getQRCodeUrl(site_name(), $request->user()->email, $secret);

        $qrCodeUrl = (new QRCode(new QROptions([
            'imageTransparent' => false,
        ])))->render($otpUrl);

        return view('profile.2fa', [
            'secretKey' => $secret,
            'qrCodeUrl' => $qrCodeUrl,
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
            '2fa_key' => ['required', 'string', 'min:8'],
            'code' => ['required', 'string'],
        ]);

        $code = str_replace(' ', '', $request->input('code'));

        if (! (new Google2FA())->verifyKey($request->input('2fa_key'), $code)) {
            throw ValidationException::withMessages(['code' => trans('auth.2fa-invalid')]);
        }

        $request->user()->update(['google_2fa_secret' => $request->input('2fa_key')]);

        return redirect()->route('profile.index')->with('success', trans('messages.profile.2fa.enabled'));
    }

    /**
     * Disable two-factor authentification for this user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function disable2fa(Request $request)
    {
        $request->user()->update(['google_2fa_secret' => null]);

        return redirect()->route('profile.index')->with('success', trans('messages.profile.2fa.disabled'));
    }

    public function transferMoney(Request $request)
    {
        abort_if(! setting('user_money_transfer'), 403);

        $this->validate($request, [
            'name' => ['required', 'exists:users,name'],
            'money' => ['required', 'numeric', 'min:0.01'],
        ]);

        $user = $request->user();
        $money = $request->input('money');

        $receiver = User::firstWhere('name', $request->input('name'));

        if ($user->is($receiver)) {
            throw ValidationException::withMessages([
                'name' => trans('messages.profile.money-transfer.self'),
            ]);
        }

        if ($user->money < $money) {
            throw ValidationException::withMessages([
                'money' => trans('messages.profile.money-transfer.not-enough'),
            ]);
        }

        $receiver->money += $money;
        $user->money -= $money;
        $receiver->save();
        $user->save();

        ActionLog::log('users.transfer', $receiver, ['money' => $money]);

        return redirect()->route('profile.index')
            ->with('success', trans('messages.profile.money-transfer.success'));
    }
}
