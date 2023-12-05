<?php

namespace Azuriom\Socialite;

use Laravel\Socialite\Two\User;
use TheCoati\CfxSocialite\CfxProvider as BaseCfxProvider;

class CfxProvider extends BaseCfxProvider
{
    private const BASE_URL = 'https://forum.cfx.re';

    /**
     * Map the returned data to a socialite user object.
     */
    protected function mapUserToObject(array $user): User
    {
        $user = $user['current_user'];

        return (new User())->setRaw($user)->map([
            'id' => $user['id'],
            'nickname' => $user['username'],
            'avatar' => self::BASE_URL.$user['avatar_template'],
        ]);
    }
}
