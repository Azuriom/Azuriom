<?php

namespace Azuriom\Socialite\Xbox;

use Closure;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Laravel\Socialite\Two\AbstractProvider;
use Laravel\Socialite\Two\InvalidStateException;
use Laravel\Socialite\Two\User;

class XboxProvider extends AbstractProvider
{
    public static ?Closure $notFoundCallback = null;

    public static ?Closure $childCallback = null;

    protected $parameters = [
        'prompt' => 'select_account',
    ];

    protected $scopes = ['XboxLive.signin'];

    protected $scopeSeparator = ' ';

    protected function getAuthUrl($state)
    {
        return $this->buildAuthUrlFromBase('https://login.live.com/oauth20_authorize.srf', $state);
    }

    protected function getTokenUrl()
    {
        return 'https://login.live.com/oauth20_token.srf';
    }

    protected function getUserByToken($token)
    {
        $token = $this->getXboxIdentityToken($token, 'http://xboxlive.com');

        return Http::withToken($token, '')
            ->withHeaders(['x-xbl-contract-version' => 2])
            ->get('https://profile.xboxlive.com/users/me/profile/settings', [
                'settings' => 'Gamertag,PublicGamerpic',
            ])
            ->throw()
            ->json('profileUsers.0');
    }

    protected function mapUserToObject(array $user)
    {
        $data = Arr::pluck(Arr::get($user, 'settings'), 'value', 'id');

        return (new User())->setRaw($user)->map([
            'id' => Arr::get($user, 'id'), // XUID
            'nickname' => Arr::get($data, 'Gamertag'),
            'avatar' => Arr::get($data, 'PublicGamerpic'),
        ]);
    }

    protected function getXboxIdentityToken(string $token, string $relying)
    {
        $response = Http::asJson()->post('https://user.auth.xboxlive.com/user/authenticate', [
            'Properties' => [
                'AuthMethod' => 'RPS',
                'SiteName' => 'user.auth.xboxlive.com',
                'RpsTicket' => 'd='.$token,
            ],
            'RelyingParty' => 'http://auth.xboxlive.com',
            'TokenType' => 'JWT',
        ])->throw();

        $userHash = $response->json('DisplayClaims.xui.0.uhs');

        $response = Http::asJson()->post('https://xsts.auth.xboxlive.com/xsts/authorize', [
            'Properties' => [
                'SandboxId' => 'RETAIL',
                'UserTokens' => [$response->json('Token')],
            ],
            'RelyingParty' => $relying,
            'TokenType' => 'JWT',
        ]);

        if ($response->status() === 401) {
            $code = $response->json('XErr');

            if ($code === 2148916233) {
                throw value(static::$notFoundCallback)
                    ?? new InvalidStateException('No Xbox profile for this account.');
            }

            if ($code === 2148916238) {
                throw value(static::$childCallback)
                    ?? new InvalidStateException('Child accounts must be added to a Family by an adult.');
            }

            throw new InvalidStateException('Invalid Xbox response: '.$code);
        }

        return "XBL3.0 x={$userHash};{$response->throw()->json('Token')}";
    }
}
