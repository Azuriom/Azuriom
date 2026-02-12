<?php

namespace Azuriom\Games;

use Azuriom\Games\Minecraft\Servers\AzLink;
use Azuriom\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class HytaleGame extends Game
{
    public const PLAYER_LOOKUP = 'https://playerdb.co/api/player/hytale/';

    public function id(): string
    {
        return 'hytale';
    }

    public function name(): string
    {
        return 'Hytale';
    }

    public function getAvatarUrl(User $user, int $size = 64): string
    {
        return "https://crafthead.net/hytale/avatar/{$user->name}/{$size}.png";
    }

    public function getUserUniqueId(string $name): ?string
    {
        return Cache::remember('games.minecraft.uuid.'.$name, now()->addMinutes(30), function () use ($name) {
            return Http::get(self::PLAYER_LOOKUP.$name)
                ->throw()
                ->json('data.player.id');
        });
    }

    public function getUserName(User $user): ?string
    {
        if ($user->game_id === null) {
            return $user->name;
        }

        $cacheKey = 'games.minecraft.profile.'.$user->game_id;

        return Cache::remember($cacheKey, now()->addMinutes(30), function () use ($user) {
            return Http::get(self::PLAYER_LOOKUP.$user->game_id)
                ->throw()
                ->json('data.player.username');
        });
    }

    public function getSupportedServers()
    {
        return [
            'mc-azlink' => AzLink::class,
        ];
    }

    public function trans(string $key, array $placeholders = []): string
    {
        return trans('game.minecraft.'.$key, $placeholders);
    }
}
