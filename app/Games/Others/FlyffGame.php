<?php

namespace Azuriom\Games\Others;

use Azuriom\Games\Game;
use Azuriom\Games\Others\Servers\FlyffServerBridge;
use Azuriom\Models\User;

class FlyffGame extends Game
{
    public function name()
    {
        return 'Flyff';
    }

    public function getAvatarUrl(User $user, int $size = 64)
    {
        return 'https://www.gravatar.com/avatar/'.md5($user->email).'?d=mp&s='.$size;
    }

    public function getUserUniqueId(string $name)
    {
        return null;
    }

    public function getUserName(User $user)
    {
        return $user->name;
    }

    public function getSupportedServers()
    {
        return [
            'flyff-server' => FlyffServerBridge::class,
        ];
    }
}
