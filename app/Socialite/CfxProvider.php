<?php

namespace Azuriom\Socialite;

use Laravel\Socialite\Two\User;
use TheCoati\CfxSocialite\CfxProvider as BaseCfxProvider;

class CfxProvider extends BaseCfxProvider
{
    private const BASE_URL = 'https://forum.cfx.re';

    /**
     * The scopes being requested.
     *
     * @var array
     */
    protected $scopes = ['read'];

    /**
     * Gets the user information from the session endpoint.
     *
     * @param  string  $token
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    protected function getCurrentUser($token): array
    {
        $response = $this->getHttpClient()->get(self::BASE_URL.'/session/current.json', [
            'headers' => $this->getTokenHeaders($token),
        ]);

        $json = json_decode($response->getBody(), true);

        return $json['current_user'];
    }

    /**
     * Gets the user information from the users endpoint.
     *
     * @param  string  $token
     * @return array|mixed
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    protected function getUserByToken($token): mixed
    {
        $base = self::BASE_URL;
        $username = $this->getCurrentUser($token)['username'];

        $response = $this->getHttpClient()->get("{$base}/users/{$username}.json", [
            'headers' => $this->getTokenHeaders($token),
        ]);

        $json = json_decode($response->getBody(), true);

        return $json['user'];
    }

    /**
     * Map the returned data to a socialite user object.
     */
    protected function mapUserToObject(array $user): User
    {
        return (new User())->setRaw($user)->map([
            'id' => $user['id'],
            'nickname' => $user['username'],
            'email' => $user['email'],
            'avatar' => self::BASE_URL.$user['avatar_template'],
        ]);
    }
}
