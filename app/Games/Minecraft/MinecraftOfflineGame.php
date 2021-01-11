<?php

namespace Azuriom\Games\Minecraft;

use Azuriom\Models\User;

class MinecraftOfflineGame extends AbstractMinecraftGame
{
    public function id()
    {
        return 'mc-offline';
    }

    public function getAvatarUrl(User $user, int $size = 64)
    {
        return "https://minotar.net/helm/{$user->name}/{$size}.png";
    }

    public function getUserUniqueId(string $name)
    {
        return null;
    }

    public function getUserName(User $user)
    {
        return $user->name;
    }
}
