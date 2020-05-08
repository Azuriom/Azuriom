<?php

namespace Azuriom\Game\Steam;

use Azuriom\Models\User;

class CSGOGame implements Game
{
    public function name()
    {
        return 'Counter-Strike: Global Offensive';
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
