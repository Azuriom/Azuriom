<?php

namespace Azuriom\Game;

use Azuriom\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Ramsey\Uuid\Uuid;
use RuntimeException;

class MinecraftOnlineGame implements Game
{
    public function name()
    {
        return 'Minecraft';
    }

    public function getAvatarUrl(User $user, int $size = 64)
    {
        // Fallback to MHF_Steve if the user don't have an uuid
        $id = $user->game_id ?? 'c06f8906-4c8a-4911-9c29-ea1dbd1aab82';

        return "https://crafatar.com/avatars/{$id}?size={$size}&overlay&default=MHF_Steve";
    }

    public function getUserUniqueId(string $name)
    {
        return Cache::remember('minecraft-uuid-cache.'.$name, now()->addMinutes(30), function () use ($name) {
            $response = Http::get("https://api.mojang.com/users/profiles/minecraft/{$name}");

            $uuid = $response->throw()->json()['id'];

            if ($uuid === null) {
                throw new RuntimeException("No UUID for {$name}");
            }

            return Uuid::fromString($uuid)->toString();
        });
    }

    public function getUserName(User $user)
    {
        if ($user->game_id === null) {
            return $user->name;
        }

        $cacheKey = 'minecraft-profile-cache.'.$user->game_id;

        return Cache::remember($cacheKey, now()->addMinutes(30), function () use ($user) {
            $uuid = str_replace('-', '', $user->game_id);

            $response = Http::get("https://api.mojang.com/user/profiles/{$uuid}/names");

            return Arr::last($response->throw()->json())['name'];
        });
    }
}
