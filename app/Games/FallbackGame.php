<?php

namespace Azuriom\Games;

use Azuriom\Models\User;

/**
 * Fallback auth implementation unrelated to a game.
 */
class FallbackGame extends Game
{
    public function name(): string
    {
        return 'None';
    }

    public function id(): string
    {
        return 'none';
    }

    public function getAvatarUrl(User $user, int $size = 64): string
    {
        return 'https://www.gravatar.com/avatar/'.md5($user->email ?? '').'?d=mp&s='.$size;
    }

    public function getUserUniqueId(string $name): ?string
    {
        return null;
    }

    public function getUserName(User $user): ?string
    {
        return $user->name;
    }

    public function getSupportedServers(): array
    {
        return [];
    }

    public function isExtensionCompatible(array $supportedGames): bool
    {
        return empty($supportedGames);
    }
}
