<?php

namespace Azuriom\Http\Controllers\Auth;

use Azuriom\Http\Controllers\Controller;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Redirect users after resetting their password to login screen.
     */
    protected string $redirectTo = '/user/login';

    /**
     * Reset the given user's password.
     */
    protected function resetPassword($user, $password): void
    {
        $this->setUserPassword($user, $password);
        $user->setRememberToken(Str::random(60));

        $user->save();

        event(new PasswordReset($user));

        session()->flash('success', trans('passwords.reset'));
    }
}
