<?php

namespace Azuriom\Games;

use Azuriom\Models\User;

/**
 * Fallback auth implementation unrelated to a game.
 */
class FallbackGame extends Game
{
    public function name()
    {
        return 'None';
    }

    public function id()
    {
        return 'none';
    }

    public function getAvatarUrl(User $user, int $size = 64)
    {
        return 'https://www.gravatar.com/avatar/'.md5($user->email ?? '').'?d=mp&s='.$size;
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
        return [];
    }

    public function isExtensionCompatible(array $supportedGames)
    {
        return empty($supportedGames);
    }
}
