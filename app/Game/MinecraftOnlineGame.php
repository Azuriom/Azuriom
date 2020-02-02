<?php

namespace Azuriom\Game;

use Azuriom\Models\User;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;
use Ramsey\Uuid\Uuid;

class MinecraftOnlineGame implements Game
{
    private $guzzle;

    public function name()
    {
        return 'Minecraft';
    }

    /**
     * Create a new MinecraftOnlineGame instance.
     */
    public function __construct()
    {
        $this->guzzle = new Client();
    }

    public function getAvatarUrl(User $user, int $size = 64)
    {
        // Fallback to MHF_Steve if the user don't have an uuid
        $id = $user->game_id ?? 'c06f8906-4c8a-4911-9c29-ea1dbd1aab82';

        return "https://crafatar.com/avatars/{$id}?size={$size}&overlay&default=MHF_Steve";
    }

    public function getUserUniqueId(string $name)
    {
        return Cache::remember('minecraft-uuid-cache.'.$name, now()->addMinutes(15), function () use ($name) {
            $response = $this->guzzle->get("https://api.mojang.com/users/profiles/minecraft/{$name}");

            $uuid = json_decode($response->getBody()->getContents())->id;

            return Uuid::fromString($uuid)->toString();
        });
    }

    public function getUserName(User $user)
    {
        if ($user->game_id === null) {
            return $user->name;
        }

        $cacheKey = 'minecraft-profile-cache.'.$user->game_id;

        return Cache::remember($cacheKey, now()->addMinutes(15), function () use ($user) {
            $uuid = str_replace('-', '', $user->game_id);

            $response = $this->guzzle->get("https://api.mojang.com/user/profiles/{$uuid}/names");

            return json_decode($response->getBody()->getContents())[0]->name;
        });
    }
}
