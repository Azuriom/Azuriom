<?php

namespace Azuriom\Games\Minecraft\Auth;

use Azuriom\Games\Game;
use Azuriom\Models\User;

class MinecraftOfflineGame implements Game
{
    public function name()
    {
        return 'Minecraft';
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
