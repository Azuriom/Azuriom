<?php

namespace Azuriom\Http\Controllers\Auth;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Models\SocialIdentity;
use Azuriom\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Socialite;

class SocialController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($provider)
    {
        if (! setting("enable_{$provider}_login")) {
            return redirect()->back()->with('error', "$provider is not enabled for login.");
        }

        if ($provider === 'sign-in-with-apple') {
            return Socialite::driver($provider)->scopes(['name', 'email'])->redirect();
        }

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
        if ($authUser === false) {
            return redirect('/')->with('error', "The user email is not given by $provider, please change your app permisions");
        }
        if ($authUser->refreshActiveBan()->is_banned || $authUser->is_deleted) {
            return redirect('/')->with('error', trans('auth.suspended'));
        }
        Auth::login($authUser, true);

        return redirect('/profile');
    }

    public function findOrCreateUser($request, $providerUser, $provider)
    {
        $account = SocialIdentity::whereProviderName($provider)
                    ->whereProviderId($providerUser->getId())
                    ->first();

        if ($account) {
            $account->data = [
                'avatar' => $providerUser->getAvatar(),
            ];
            $user_name = $providerUser->getName();

            if ($account->user->name !== $user_name) {
                $look_for_duplicate_user = User::where('name', $user_name)->first();

                if ($look_for_duplicate_user) {
                    $user_name .= ' (Duplicate-'.Str::random(3).')';
                }
                $account->user->name = $user_name;
                $account->user->save();
            }

            $account->save();

            return $account->user;
        } else {
            $user = null;
            if ($request->user()) {
                $user = $request->user();
            } else {
                $user = User::whereEmail($providerUser->getEmail())->first();
            }

            if (! $user) {
                $user_name = $providerUser->getName();
                $look_for_duplicate_user = User::where('name', $user_name)->first();

                if ($look_for_duplicate_user) {
                    $user_name .= ' (Duplicate-'.Str::random(3).')';
                }

                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'name'  => $user_name,
                    'password' => null,
                    'game_id' => null,
                ]);
            }

            $user->identities()->create([
                'provider_id'   => $providerUser->getId(),
                'provider_name' => $provider,
                'data' => [
                    'avatar' => $providerUser->getAvatar(),
                ],
            ]);
        }

        return $user;
    }
}
