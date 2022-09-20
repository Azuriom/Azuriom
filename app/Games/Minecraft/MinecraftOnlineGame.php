<?php

namespace Azuriom\Games\Minecraft;

use Azuriom\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use RuntimeException;

class MinecraftOnlineGame extends AbstractMinecraftGame
{
    public const PROFILE_LOOKUP = 'https://sessionserver.mojang.com/session/minecraft/profile/';

    public const USERNAME_LOOKUP = 'https://api.mojang.com/users/profiles/minecraft/';

    public function id()
    {
        return 'mc-online';
    }

    public function loginWithOAuth()
    {
        return true;
    }

    public function getSocialiteDriverName()
    {
        return 'minecraft';
    }

    public function getAvatarUrl(User $user, int $size = 64)
    {
        // Fallback to MHF_Steve if the user don't have an uuid
        $uuid = $user->game_id ?? 'c06f8906-4c8a-4911-9c29-ea1dbd1aab82';

        return "https://crafatar.com/avatars/{$uuid}?size={$size}&overlay&default=MHF_Steve";
    }

    public function getUserUniqueId(string $name)
    {
        return Cache::remember('games.minecraft.uuid.'.$name, now()->addMinutes(30), function () use ($name) {
            $uuid = Http::get(self::USERNAME_LOOKUP.$name)
                ->throw()
                ->json('id');

            if ($uuid === null) {
                throw new RuntimeException("No UUID for {$name}");
            }

            return $uuid;
        });
    }

    public function getUserName(User $user)
    {
        if ($user->game_id === null) {
            return $user->name;
        }

        $cacheKey = 'games.minecraft.profile.'.$user->game_id;

        return Cache::remember($cacheKey, now()->addMinutes(30), function () use ($user) {
            return Http::get(self::PROFILE_LOOKUP.$user->game_id)
                ->throw()
                ->json('name');
        });
    }
}
