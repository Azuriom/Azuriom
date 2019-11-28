<?php

namespace Azuriom\Game;

use Azuriom\Models\User;

class MinecraftGame implements GameBridge
{
    public function getAvatarUrl(User $user, int $size = 64)
    {
        return "https://minotar.net/helm/{$user->name}/{$size}.png";
    }

}
