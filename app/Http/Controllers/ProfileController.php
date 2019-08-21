<?php

namespace Azuriom\Http\Controllers;

use Azuriom\Rules\ConfirmCurrentPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        $user = $request->user();
        $user->update($request->only('email'));

        return redirect()->route('profile.index')->with('success', 'Email updated, please confirm it');
    }

    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'password_confirm_pass' => ['required', 'string', new ConfirmCurrentPassword],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        $user = $request->user();
        $user->update(['password' => Hash::make($request->get('password'))]);

        return redirect()->route('profile.index')->with('success', 'Password updated');
    }
}
