<?php

namespace Azuriom\Http\Controllers\Auth;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Models\User;
use Azuriom\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use PragmaRX\Google2FA\Google2FA;
use Throwable;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->guard()->once($this->credentials($request))) {
            $user = $this->guard()->user();

            if ($user->is_deleted) {
                return $this->sendFailedLoginResponse($request);
            }

            if ($user->refreshActiveBan()->is_banned) {
                return redirect()->back()->with('error', trans('messages.profile.suspended'));
            }

            if (setting('maintenance-status', false) && ! $request->user()->can('maintenance.access')) {
                return redirect()->back()->with('error', trans('auth.maintenance'));
            }

            if (! $user->hasTwoFactorAuth()) {
                $this->guard()->login($user, $request->filled('remember'));

                return $this->sendLoginResponse($request);
            }

            $request->session()->flash('2fa_id', $user->id);
            $request->session()->flash('2fa_remember', $request->filled('remember'));

            return redirect()->route('login.2fa');
        }

        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    public function show2fa(Request $request)
    {
        if (! $request->session()->has('2fa_id')) {
            return redirect()->route('login');
        }

        $request->session()->keep(['2fa_id', '2fa_remember']);

        return view('auth.2fa');
    }

    public function login2fa(Request $request)
    {
        $userId = $request->session()->get('2fa_id');

        $user = $userId ? User::find($userId) : null;

        if ($user === null) {
            return redirect()->route('login');
        }

        $request->session()->keep(['2fa_id', '2fa_remember']);

        $this->validate($request, ['code' => 'required|string']);

        $code = str_replace(' ', '', $request->input('code'));

        if (! (new Google2FA())->verifyKey($user->google_2fa_secret, $code)) {
            return redirect()->route('login.2fa')->withErrors(['code' => trans('auth.2fa-invalid')]);
        }

        $this->guard()->login($user, $request->session()->get('2fa_remember'));

        return $this->sendLoginResponse($request);
    }

    /**
     * @param  Request  $request
     * @param  \Azuriom\Models\User  $user
     */
    protected function authenticated(Request $request, $user)
    {
        $user->last_login_ip = $request->ip();
        $user->last_login_at = now();
        $user->save();

        try {
            $name = game()->getUserName($user);

            if ($name && $name !== $user->name && ! User::where('name', $name)->exists()) {
                $user->update(['name' => $name]);
            }
        } catch (Throwable $t) {
            report($t);
        }
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        $username = $request->input($this->username());

        $validMail = filter_var($username, FILTER_VALIDATE_EMAIL) !== false;
        $field = $validMail ? $this->username() : 'name';

        return [$field => $username] + $request->only('password');
    }
}
