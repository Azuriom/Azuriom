<?php

namespace Azuriom\Games\Minecraft;

use Azuriom\Models\User;
use Closure;
use Illuminate\Support\Str;

class MinecraftOfflineGame extends AbstractMinecraftGame
{
    protected static ?Closure $avatarRetriever = null;

    public function id()
    {
        return 'mc-offline';
    }

    public function getAvatarUrl(User $user, int $size = 64)
    {
        if (static::$avatarRetriever !== null) {
            return (static::$avatarRetriever)($user, $size);
        }

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

    public static function setAvatarRetriever(Closure $avatarRetriever)
    {
        self::$avatarRetriever = $avatarRetriever;
    }
}
