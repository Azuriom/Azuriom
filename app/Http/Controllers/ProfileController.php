<?php

namespace Azuriom\Http\Controllers;

use Azuriom\Models\User;
use Azuriom\Rules\CurrentPassword;
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PragmaRX\Google2FA\Google2FA;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        return view('profile.index', ['user' => $request->user()]);
    }

    public function updateEmail(Request $request)
    {
        $this->validate($request, [
            'email_confirm_pass' => ['required', 'string', new CurrentPassword()],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
        ]);

        $request->user()->update($request->only('email'));

        return redirect()->route('profile.index')->with('success', trans('messages.profile.updated'));
    }

    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'password_confirm_pass' => ['required', 'string', new CurrentPassword()],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $request->user()->update(['password' => Hash::make($request->input('password'))]);

        return redirect()->route('profile.index')->with('success', trans('messages.profile.updated'));
    }

    public function show2fa(Request $request)
    {
        if ($request->user()->hasTwoFactorAuth()) {
            return redirect()->route('profile.index');
        }

        $google2fa = new Google2FA();
        $secretKey = $request->old('2fa_key', $google2fa->generateSecretKey());
        $otpUrl = $google2fa->getQRCodeUrl(site_name(), $request->user()->email, $secretKey);

        $qrCode = new QRCode(new QROptions([
            'imageTransparent' => false,
        ]));
        $qrCodeUrl = $qrCode->render($otpUrl);

        return view('profile.2fa', [
            'secretKey' => $secretKey,
            'qrCodeUrl' => $qrCodeUrl,
        ]);
    }

    public function enable2fa(Request $request)
    {
        $this->validate($request, [
            '2fa_key' => ['required', 'string', 'min:8'],
            'code' => ['required', 'string'],
        ]);

        if (! (new Google2FA())->verifyKey($request->input('2fa_key'), str_replace(' ', '', $request->input('code')))) {
            return redirect()->route('profile.2fa.index')->with('error', trans('auth.2fa-invalid'));
        }

        $request->user()->update(['google_2fa_secret' => $request->input('2fa_key')]);

        return redirect()->route('profile.index')->with('success', trans('messages.profile.2fa.enabled'));
    }

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
            return redirect()->route('profile.index')
                ->with('error', trans('messages.profile.money-transfer.self'));
        }

        if ($user->money < $money) {
            return redirect()->route('profile.index')
                ->with('error', trans('messages.profile.money-transfer.not-enough'));
        }

        $receiver->money += $money;
        $user->money -= $money;
        $receiver->save();
        $user->save();

        return redirect()->route('profile.index')->with('success', trans('messages.profile.updated'));
    }
}
