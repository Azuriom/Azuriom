<?php

namespace Azuriom\Http\Controllers\Auth;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Models\User;
use Azuriom\Providers\RouteServiceProvider;
use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Laravel\Socialite\Contracts\User as SocialUser;
use Laravel\Socialite\Facades\Socialite;
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

        $this->middleware('login.socialite')->only(['showLoginForm', 'login']);
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

        if (! $this->guard()->once($this->credentials($request))) {
            $this->incrementLoginAttempts($request);

            return $this->sendFailedLoginResponse($request);
        }

        /** @var \Azuriom\Models\User $user */
        $user = $this->guard()->user();

        if ($user === null || $user->is_deleted) {
            return $this->sendFailedLoginResponse($request);
        }

        return $this->loginUser($request, $user);
    }

    protected function loginUser(Request $request, User $user)
    {
        if ($user->isBanned()) {
            throw ValidationException::withMessages([
                $this->username() => trans('auth.suspended'),
            ]);
        }

        if (setting('maintenance-status', false) && ! $user->can('maintenance.access')) {
            return $this->sendMaintenanceResponse($request);
        }

        if ($user->hasTwoFactorAuth()) {
            return $this->redirectTo2fa($request, $user);
        }

        $this->guard()->login($user, $request->filled('remember'));

        return $this->sendLoginResponse($request);
    }

    /**
     * Obtain the user information from the provider.
     *
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function handleProviderCallback(Request $request)
    {
        abort_if(! game()->loginWithOAuth(), 404);

        $userProfile = Socialite::driver(game()->getSocialiteDriverName())->user();
        $user = User::firstWhere('game_id', (string) $userProfile->getId());

        if ($user === null) {
            $user = $this->registerUser($request, $userProfile);

            $this->guard()->login($user);

            return $request->expectsJson() ? response()->noContent() : redirect($this->redirectPath());
        }

        return $this->loginUser($request, $user);
    }

    protected function registerUser(Request $request, SocialUser $userProfile)
    {
        $socialiteDriver = game()->getSocialiteDriverName();

        return User::forceCreate([
            'name' => $userProfile->getNickname() ?? $userProfile->getName(),
            'email' => "{$userProfile->getId()}@{$socialiteDriver}.oauth",
            'password' => Hash::make(Str::random(32)),
            'game_id' => (string) $userProfile->getId(),
            'last_login_ip' => $request->ip(),
            'last_login_at' => now(),
        ]);
    }

    protected function redirectTo2fa(Request $request, User $user)
    {
        $request->session()->flash('login.2fa', [
            'id' => $user->id,
            'remember' => $request->filled('remember'),
        ]);

        if ($request->expectsJson()) {
            return response()->json(['2fa' => true], 423);
        }

        return redirect()->route('login.2fa');
    }

    /**
     * Show the application's 2fa form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function showCodeForm(Request $request)
    {
        if (! $request->session()->has('login.2fa.id')) {
            return redirect()->route('login');
        }

        $request->session()->keep('login.2fa');

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
    public function verifyCode(Request $request)
    {
        $this->validate($request, ['code' => 'required']);

        if (! $request->session()->has('login.2fa.id')) {
            throw new AuthenticationException('Unauthenticated.', [$this->guard()], route('login'));
        }

        /** @var \Azuriom\Models\User $user */
        $user = User::findOrFail($request->session()->get('login.2fa.id'));
        $code = str_replace(' ', '', $request->input('code'));

        if (! (new Google2FA())->verifyKey($user->google_2fa_secret, $code)) {
            $request->session()->keep('login.2fa');

            throw ValidationException::withMessages(['code' => trans('auth.2fa-invalid')]);
        }

        $this->guard()->login($user, $request->session()->get('login.2fa.remember'));

        $request->session()->remove('login.2fa');

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
        $user->forceFill([
            'last_login_ip' => $request->ip(),
            'last_login_at' => now(),
        ])->save();

        try {
            $name = game()->getUserName($user);

            if ($name !== null && $name !== $user->name) {
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

        $field = Str::contains($username, '@') ? $this->username() : 'name';

        return [$field => $username] + $request->only('password');
    }

    /**
     * Get the maintenance response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function sendMaintenanceResponse(Request $request)
    {
        if ($request->expectsJson()) {
            return response()->json(['message' => trans('auth.maintenance')], 503);
        }

        return redirect()->back()->with('error', trans('auth.maintenance'));
    }
}
