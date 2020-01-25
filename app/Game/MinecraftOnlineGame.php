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
        return "https://crafatar.com/avatars/{$user->game_id}?size={$size}&overlay";
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
        $cacheKey = 'minecraft-profile-cache.'.$user->game_id;

        return Cache::remember($cacheKey, now()->addMinutes(15), function () use ($user) {
            $uuid = str_replace('-', '', $user->game_id);

            $response = $this->guzzle->get("https://api.mojang.com/user/profiles/{$uuid}/names");

            return json_decode($response->getBody()->getContents())[0]->name;
        });
    }
}
