<?php

namespace Azuriom\Socialite;

use Illuminate\Support\Str;
use Laravel\Socialite\Two\AbstractProvider;
use Laravel\Socialite\Two\ProviderInterface;
use Laravel\Socialite\Two\User;

/**
 * Socialite provider for Discord, based on https://github.com/kawax/socialite-discord,
 * under the MIT License.
 *
 * Copyright (c) 2018 kawax
 */
class DiscordProvider extends AbstractProvider implements ProviderInterface
{
    protected string $endpoint = 'https://discord.com/api';

    /**
     * The scopes being requested.
     *
     * @var array
     */
    protected $scopes = [
        'role_connections.write', 'identify',
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
        $url = $this->endpoint.'/oauth2/authorize';

        return $this->buildAuthUrlFromBase($url, $state);
    }

    /**
     * {@inheritdoc}
     */
    protected function getTokenUrl(): string
    {
        return $this->endpoint.'/oauth2/token';
    }

    /**
     * {@inheritdoc}
     */
    protected function getUserByToken($token): array
    {
        $response = $this->getHttpClient()
            ->get($this->endpoint.'/users/@me', [
                'headers' => [
                    'Authorization' => 'Bearer '.$token,
                ],
            ]);

        return json_decode($response->getBody(), true);
    }

    /**
     * {@inheritdoc}
     */
    protected function mapUserToObject(array $user): User
    {
        $discriminator = $user['discriminator']
            ? '#'.Str::padLeft($user['discriminator'], 4, '0')
            : '';

        return (new User())->setRaw($user)->map([
            'id' => $user['id'],
            'nickname' => $user['username'].$discriminator,
            'name' => $user['username'],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    protected function getTokenFields($code): array
    {
        return array_merge(parent::getTokenFields($code), [
            'grant_type' => 'authorization_code',
        ]);
    }
}
