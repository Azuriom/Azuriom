<?php

namespace Azuriom\Socialite\Xbox;

use Illuminate\Support\Str;

class AzuriomXboxProvider extends XboxProvider
{
    protected function getAuthUrl($state): string
    {
        if (empty($this->clientSecret) || empty($this->clientId)) {
            return $this->buildAuthUrlFromBase('https://xbox-api.azuriom.com/auth/redirect', $state);
        }

        return parent::getAuthUrl($state);
    }

    public function getAccessTokenResponse($code): array
    {
        if (Str::startsWith($code, 'access_token:')) {
            return [
                'access_token' => Str::after($code, 'access_token:'),
            ];
        }

        return parent::getAccessTokenResponse($code);
    }
}
