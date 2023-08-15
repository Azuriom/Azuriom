<?php

namespace Azuriom\Games\Steam;

use Azuriom\Games\Game;
use Azuriom\Games\Steam\Servers\AzLink;
use Azuriom\Games\Steam\Servers\Query;
use Azuriom\Games\Steam\Servers\Rcon;
use Azuriom\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class SteamGame extends Game
{
    public const USER_INFO_URL = 'https://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002';

    protected string $name;

    protected string $id;

    protected bool $azLinkSupport;

    /**
     * Create a new game instance.
     */
    protected function __construct(string $id, string $name, bool $azLink = false)
    {
        $this->id = $id;
        $this->name = $name;
        $this->azLinkSupport = $azLink;
    }

    public static function forName(string $id, string $name, bool $azLink = false): Game
    {
        return new self($id, $name, $azLink);
    }

    public function id(): string
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function getAvatarUrl(User $user, int $size = 64): string
    {
        $key = $size > 64 ? 'avatarfull' : ($size > 32 ? 'avatarmedium' : 'avatar');

        return Arr::get($this->getUserProfile($user), $key, asset('img/user.svg'));
    }

    public function getUserUniqueId(string $name): ?string
    {
        return null; // Not implemented
    }

    public function getUserName(User $user): ?string
    {
        return Arr::get($this->getUserProfile($user), 'personaname');
    }

    public function getSupportedServers(): array
    {
        $games = [
            'source-query' => Query::class,
            'source-rcon' => Rcon::class,
        ];

        return $this->azLinkSupport
            ? array_merge($games, ['steam-azlink' => AzLink::class])
            : $games;
    }

    public function loginWithOAuth(): bool
    {
        return true;
    }

    public function getSocialiteDriverName(): string
    {
        return 'steam';
    }

    public function trans(string $key, array $placeholders = []): string
    {
        return trans('game.steam.'.$key, $placeholders);
    }

    public function getUserProfile(User $user)
    {
        $steamKey = config('services.steam.client_secret');

        if (empty($user->game_id) || empty($steamKey)) {
            return [];
        }

        return Cache::remember("users.{$user->id}.steam", now()->addMinutes(15),
            fn () => Http::get(self::USER_INFO_URL, [
                'key' => $steamKey,
                'steamids' => $user->game_id,
            ])->throw()->json('response.players.0'));
    }

    public function isExtensionCompatible(array $supportedGames): bool
    {
        if (parent::isExtensionCompatible($supportedGames)) {
            return true;
        }

        return in_array('steam', $supportedGames, true);
    }
}
