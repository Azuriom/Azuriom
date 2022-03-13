<?php

namespace Azuriom\Socialite\Minecraft;

use Illuminate\Support\Str;

class AzuriomMinecraftProvider extends MinecraftProvider
{
    protected function getAuthUrl($state)
    {
        if (empty($this->clientSecret) || empty($this->clientId)) {
            return $this->buildAuthUrlFromBase('https://xbox-api.azuriom.com/auth/redirect', $state);
        }

        return parent::getAuthUrl($state);
    }

    public function getAccessTokenResponse($code)
    {
        if (Str::startsWith($code, 'access_token:')) {
            return [
                'access_token' => Str::replaceFirst('access_token:', '', $code),
            ];
        }

        return parent::getAccessTokenResponse($code);
    }
}
