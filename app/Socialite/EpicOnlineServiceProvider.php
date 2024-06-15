<?php

namespace Azuriom\Socialite;

use Illuminate\Support\Arr;
use Laravel\Socialite\Two\AbstractProvider;
use Laravel\Socialite\Two\ProviderInterface;
use Laravel\Socialite\Two\User;

class EpicOnlineServiceProvider extends AbstractProvider implements ProviderInterface
{
    /**
     * The scopes being requested.
     *
     * @var array
     */
    protected $scopes = [
        'basic_profile',
    ];

    /**
     * The separating character for the requested scopes.
     *
     * @var string
     */
    protected $scopeSeparator = ' ';

    /**
     * {@inheritdoc}
     */
    protected function getAuthUrl($state): string
    {
        return $this->buildAuthUrlFromBase('https://www.epicgames.com/id/authorize', $state);
    }

    /**
     * {@inheritdoc}
     */
    protected function getTokenUrl(): string
    {
        return 'https://api.epicgames.dev/epic/oauth/v2/token';
    }

    /**
     * {@inheritdoc}
     */
    protected function getTokenHeaders($code)
    {
        return array_merge(parent::getTokenHeaders($code), [
            'Authorization' => 'Basic '.base64_encode($this->clientId.':'.$this->clientSecret),
        ]);
    }

    protected function getUserByToken($token): array
    {
        $response = $this->getHttpClient()->post('https://api.epicgames.dev/epic/oauth/v2/tokenInfo', [
            'form_params' => [
                'token' => $token,
            ],
        ]);

        $tokenInfo = json_decode($response->getBody()->getContents(), true);

        $response = $this->getHttpClient()->get('https://api.epicgames.dev/epic/id/v2/accounts', [
            'query' => [
                'accountId' => $tokenInfo['account_id'],
            ],
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer '.$token,
            ],
        ]);

        return Arr::first(json_decode($response->getBody(), true));
    }

    protected function mapUserToObject(array $user): User
    {
        return (new User())->setRaw($user)->map([
            'id' => $user['accountId'],
            'nickname' => $user['displayName'],
        ]);
    }
}
