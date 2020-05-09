<?php

namespace Azuriom\Http\Controllers;

use Azuriom\Models\User;
use Azuriom\Rules\CurrentPassword;
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PragmaRX\Google2FA\Google2FA;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index', ['user' => Auth::user()]);
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

    public function searchUsers(Request $request)
    {
        return User::select('id', 'name')->where('name', 'LIKE', '%'.$request->q.'%')->get();
    }

    public function transferMoney(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'exists:users,name'],
            'money' => ['numeric', 'min:0.01'],
        ]);

        $receiver = User::where('name', $request->input('name'))->first();

        $user = $request->user();
        if ($receiver->id === $user->id || !setting('allow_users_money_transfer')) {
            return redirect()->route('profile.index')->with('error', trans('messages.not-authorized'));
        }

        $money_sent = $request->input('money');

        if ($user->money - $money_sent < 0) {
            return redirect()->route('profile.index')->with('error', trans('messages.not-authorized'));
        }

        $receiver->money += $money_sent;
        $user->money -= $money_sent;
        $receiver->save();
        $user->save();

        return redirect()->route('profile.index')->with('success', trans('messages.profile.updated'));
    }
}
