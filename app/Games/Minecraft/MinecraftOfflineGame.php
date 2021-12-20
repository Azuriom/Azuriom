<?php

namespace Azuriom\Games\Minecraft;

use Azuriom\Models\User;
use Illuminate\Support\Str;

class MinecraftOfflineGame extends AbstractMinecraftGame
{
    public function id()
    {
        return 'mc-offline';
    }

    public function getAvatarUrl(User $user, int $size = 64)
    {
        return "https://crafthead.net/helm/{$user->name}/{$size}.png";
    }

    public function getUserUniqueId(string $name)
    {
        return Str::uuid();
    }

    public function getUserName(User $user)
    {
        return $user->name;
    }
}
