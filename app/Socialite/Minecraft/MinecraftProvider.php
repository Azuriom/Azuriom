<?php

namespace Azuriom\Socialite\Minecraft;

use Azuriom\Socialite\Xbox\XboxProvider;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Laravel\Socialite\Two\InvalidStateException;
use Laravel\Socialite\Two\User;

class MinecraftProvider extends XboxProvider
{
    protected function getUserByToken($token)
    {
        $response = Http::asJson()->post('https://api.minecraftservices.com/authentication/login_with_xbox', [
            'identityToken' => $this->getXboxIdentityToken($token, 'rp://api.minecraftservices.com/'),
        ])->throw();

        $response = Http::withToken($response->json('access_token'))
            ->get('https://api.minecraftservices.com/minecraft/profile');

        if ($response->status() === 404) {
            throw value(static::$notFoundCallback)
                ?? new InvalidStateException('No Minecraft profile for this account.');
        }

        return $response->throw()->json();
    }

    protected function mapUserToObject(array $user)
    {
        return (new User())->setRaw($user)->map([
            'id' => Arr::get($user, 'id'),
            'nickname' => Arr::get($user, 'name'),
        ]);
    }
}
