<?php

namespace Azuriom\Http\Controllers\Auth;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Models\User;
use Azuriom\Providers\RouteServiceProvider;
use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use PragmaRX\Google2FA\Google2FA;

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

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
        $this->validateLogin($request);

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->guard()->once($this->credentials($request))) {
            $user = $this->guard()->user();

            if ($user === null || $user->is_deleted) {
                return $this->sendFailedLoginResponse($request);
            }

            if ($user->refreshActiveBan()->is_banned) {
                return $this->sendResponseWithMessage($request, trans('messages.profile.suspended'), 403);
            }

            if (setting('maintenance-status', false) && ! $user->can('maintenance.access')) {
                return $this->sendResponseWithMessage($request, trans('auth.maintenance'), 503);
            }

            if (! $user->hasTwoFactorAuth()) {
                $this->guard()->login($user, $request->filled('remember'));

                return $this->sendLoginResponse($request);
            }

            $request->session()->flash('2fa_id', $user->id);
            $request->session()->flash('2fa_remember', $request->filled('remember'));

            if ($request->expectsJson()) {
                return response()->json(['2fa' => true]);
            }

            return redirect()->route('login.2fa');
        }

        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    /**
     * Show the application's 2fa form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show2fa(Request $request)
    {
        if (! $request->session()->has('2fa_id')) {
            return redirect()->route('login');
        }

        $request->session()->keep(['2fa_id', '2fa_remember']);

        return view('auth.2fa');
    }

    /**
     * Handle a 2fa request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     * @throws \Illuminate\Auth\AuthenticationException
     * @throws \Illuminate\Validation\ValidationException
     * @throws \PragmaRX\Google2FA\Exceptions\Google2FAException
     */
    public function login2fa(Request $request)
    {
        $userId = $request->session()->get('2fa_id');

        $user = $userId ? User::find($userId) : null;

        if ($user === null) {
            throw new AuthenticationException('Unauthenticated.', [$this->guard()], route('login'));
        }

        $request->session()->keep(['2fa_id', '2fa_remember']);

        $this->validate($request, ['code' => 'required|string']);

        $code = str_replace(' ', '', $request->input('code'));

        if (! (new Google2FA())->verifyKey($user->google_2fa_secret, $code)) {
            throw ValidationException::withMessages(['code' => [trans('auth.2fa-invalid')]]);
        }

        $this->guard()->login($user, $request->session()->get('2fa_remember'));

        return $this->sendLoginResponse($request);
    }

    /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
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
        } catch (Exception $e) {
            report($e);
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

    protected function sendResponseWithMessage(Request $request, string $message, int $code)
    {
        if ($request->expectsJson()) {
            return response()->json(['message' => $message], $code);
        }

        return back()->with('error', $message);
    }
}
