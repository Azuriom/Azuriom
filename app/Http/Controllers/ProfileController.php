<?php

namespace Azuriom\Http\Controllers;

use Azuriom\Rules\ConfirmCurrentPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PragmaRX\Google2FA\Google2FA;
use PragmaRX\Google2FA\Support\Url;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index')->with('user', auth()->user());
    }

    public function updateEmail(Request $request)
    {
        $this->validate($request, [
            'email_confirm_pass' => ['required', 'string', new ConfirmCurrentPassword],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:users']
        ]);

        $request->user()->update($request->only('email'));

        return redirect()->route('profile.index')->with('success', 'Email updated, please confirm it');
    }

    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'password_confirm_pass' => ['required', 'string', new ConfirmCurrentPassword],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        $request->user()->update(['password' => Hash::make($request->get('password'))]);

        return redirect()->route('profile.index')->with('success', 'Password updated');
    }

    public function show2fa(Request $request)
    {
        if ($request->user()->hasTwoFactorAuth()) {
            return redirect()->route('profile.index');
        }

        $google2fa = new Google2FA();
        $secretKey = old('2fa_key', $google2fa->generateSecretKey());
        $qrCodeUrl = $google2fa->getQRCodeUrl(site_name(), $request->user()->email, $secretKey);

        $googleQrUrl = Url::generateGoogleQRCodeUrl('https://chart.googleapis.com/', 'chart', 'chs=250x250&cht=qr&chl=', $qrCodeUrl);

        return view('profile.2fa', [
            'secretKey' => $secretKey,
            'qrCodeUrl' => $googleQrUrl
        ]);
    }

    public function enable2fa(Request $request)
    {
        $this->validate($request, [
            '2fa_key' => ['required', 'string', 'min:8'],
            'code' => ['required', 'string']
        ]);

        if (! (new Google2FA())->verifyKey($request->get('2fa_key'), str_replace(' ', '', $request->get('code')))) {
            return redirect()->route('profile.2fa.index')->with('error', 'Invalid code');
        }

        $request->user()->update(['google_2fa_secret' => $request->get('2fa_key')]);

        return redirect()->route('profile.index')
            ->with('success', 'Two factor auth enabled')
            ->withInput($request->all());
    }

    public function disable2fa(Request $request)
    {
        $request->user()->update(['google_2fa_secret' => null]);

        return redirect()->route('profile.index')->with('success', 'Two factor auth disabled');
    }
}
