<?php

namespace Azuriom\Http\Controllers\Auth;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Models\Role;
use Azuriom\Models\User;
use Azuriom\Providers\RouteServiceProvider;
use Azuriom\Rules\GameAuth;
use Azuriom\Rules\Username;
use Azuriom\Support\Markdown;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     */
    protected string $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('login.socialite');
        $this->middleware('captcha')->only('register');
    }

    /**
     * Show the application registration form.
     */
    public function showRegistrationForm()
    {
        $conditions = setting('conditions');

        if ($conditions !== null) {
            $rawConditions = preg_match('/^https?:\/\//i', $conditions)
                ? trans('auth.conditions', ['url' => $conditions])
                : Str::between(Markdown::parse($conditions, true), '<p>', '</p>');

            $conditions = new HtmlString($rawConditions);
        }

        return view('auth.register', [
            'conditions' => null,
            'registerConditions' => $conditions,
        ]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:25', 'unique:users', new Username(), new GameAuth()],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
            'password' => ['required', 'confirmed', Password::default()],
            'conditions' => [setting('conditions', false) ? 'accepted' : 'nullable'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     */
    protected function create(array $data): User
    {
        return User::forceCreate([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'role_id' => Role::defaultRoleId(),
            'game_id' => game()->getUserUniqueId($data['name']),
            'last_login_ip' => Request::ip(),
            'last_login_at' => now(),
        ]);
    }
}
