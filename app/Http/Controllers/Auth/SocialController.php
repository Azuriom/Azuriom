<?php

namespace Azuriom\Http\Controllers\Auth;

use Socialite;
use Azuriom\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Azuriom\Models\SocialIdentity;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Azuriom\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

class SocialController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback(Request $request, $provider)
    {
        try {
            $user = Socialite::driver($provider)->user();
        } catch (Exception $e) {
            return redirect('/login');
        }

        $authUser = $this->findOrCreateUser($request, $user, $provider);
        Auth::login($authUser, true);
        return redirect('/profile');
    }

    public function findOrCreateUser($request, $providerUser, $provider)
    {
        $account = SocialIdentity::whereProviderName($provider)
                    ->whereProviderId($providerUser->getId())
                    ->first();

        if ($account) {
            return $account->user;
        } else {
            $user = null;
            if($request->user()) {
                $user = $request->user();
            } else {
                $user = User::whereEmail($providerUser->getEmail())->first();
            }

            if (! $user) {
                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'name'  => $providerUser->getName(),
                    'password' => Hash::make(Str::random(8)),
                    'game_id' => null,
                ]);
            }

            $user->identities()->create([
                'provider_id'   => $providerUser->getId(),
                'provider_name' => $provider,
            ]);

            
        }

        if ($user->refreshActiveBan()->is_banned || $user->is_deleted) {
            throw ValidationException::withMessages([
                $user->name => trans('auth.suspended'),
            ]);
        }

        return $user;
    }


}