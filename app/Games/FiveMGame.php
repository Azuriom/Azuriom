<?php

namespace Azuriom\Games;

use Azuriom\Games\Steam\Servers\AzLink;
use Azuriom\Games\Steam\Servers\FiveMRcon;
use Azuriom\Games\Steam\Servers\FiveMStatus;
use Azuriom\Models\Setting;
use Azuriom\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use phpseclib3\Crypt\RSA;
use TheCoati\CfxSocialite\Cfx;

class FiveMGame extends Game
{
    public const USER_INFO_URL = 'https://forum.cfx.re/u/%s.json';

    protected UserAttribute $userPrimaryAttribute = UserAttribute::ID;

    public function name(): string
    {
        return 'FiveM';
    }

    public function id(): string
    {
        return 'fivem-cfx';
    }

    public function loginWithOAuth(): bool
    {
        return true;
    }

    public function getSocialiteDriverName(): string
    {
        return 'cfx';
    }

    public function getAvatarUrl(User $user, int $size = 64): string
    {
        return asset('img/user.svg');
    }

    public function getUserUniqueId(string $name): ?string
    {
        $url = sprintf(self::USER_INFO_URL, $name);

        return Cache::remember("users.{$name}.cfx", now()->addMinutes(15),
            fn () => Http::get($url)->throw()->json('user.id'));
    }

    public function getUserName(User $user): ?string
    {
        return null; // Not implemented
    }

    public function getSupportedServers(): array
    {
        return [
            'fivem-status' => FiveMStatus::class,
            'fivem-rcon' => FiveMRcon::class,
            'steam-azlink' => AzLink::class,
        ];
    }

    public function trans(string $key, array $placeholders = []): string
    {
        return trans('game.fivem.'.$key, $placeholders);
    }

    public static function generateKeys()
    {
        Setting::updateSettings('cfx.id', Str::uuid()->toString());

        $publicKey = Cfx::keyPath('cfx-public.key');
        $privateKey = Cfx::keyPath('cfx-private.key');

        if (! file_exists($publicKey) && ! file_exists($privateKey)) {
            $key = RSA::createKey(4096);

            file_put_contents($publicKey, (string) $key->getPublicKey());
            file_put_contents($privateKey, (string) $key);
        }
    }
}
