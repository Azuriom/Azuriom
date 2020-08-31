<?php

namespace Azuriom\Games\Steam;

use Azuriom\Games\Game;
use Azuriom\Games\Steam\Servers\Query;
use Azuriom\Games\Steam\Servers\Rcon;
use Azuriom\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class SteamGame extends Game
{
    protected const USER_INFO_URL = 'https://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002';

    /**
     * The game's name.
     *
     * @var string
     */
    protected $name;

    /**
     * Create a new game instance.
     *
     * @param  string  $name
     */
    protected function __construct(string $name)
    {
        $this->name = $name;
    }

    public static function forName(string $name)
    {
        return new self($name);
    }

    public function name()
    {
        return $this->name;
    }

    public function getAvatarUrl(User $user, int $size = 64)
    {
        $key = $size > 64 ? 'avatarfull' : ($size > 32 ? 'avatarmedium' : 'avatar');

        return Arr::get($this->getUserProfile($user), $key, asset('img/user.png'));
    }

    public function getUserUniqueId(string $name)
    {
        return null; // Not implemented
    }

    public function getUserName(User $user)
    {
        return Arr::get($this->getUserProfile($user), 'personaname');
    }

    public function getSupportedServers()
    {
        return [
            'source-query' => Query::class,
            'source-rcon' => Rcon::class,
        ];
    }

    public function loginWithOAuth()
    {
        return true;
    }

    public function getSocialiteDriverName()
    {
        return 'steam';
    }

    public function trans(string $key, array $placeholders = [])
    {
        return trans('game.steam.'.$key, $placeholders);
    }

    public function getUserProfile(User $user)
    {
        return Cache::remember("users.{$user->id}.steam", now()->addMinutes(15), function () use ($user) {
            $data = Http::get(self::USER_INFO_URL, [
                'key' => config('services.steam.client_secret'),
                'steamids' => $user->game_id,
            ])->throw()->json();

            return Arr::get($data, 'response.players.0');
        });
    }
}
