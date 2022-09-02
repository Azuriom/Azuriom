<?php

namespace Azuriom\Games\Minecraft;

use Azuriom\Models\User;
use Closure;
use Ramsey\Uuid\Generator\NameGeneratorInterface;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidFactory;
use Ramsey\Uuid\UuidInterface;

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

        return "https://mc-heads.net/avatar/{$user->name}/{$size}.png";
    }

    public function getUserUniqueId(string $name)
    {
        $factory = new UuidFactory();
        $factory->setNameGenerator(new class implements NameGeneratorInterface
        {
            public function generate(UuidInterface $ns, string $name, string $hashAlgorithm): string
            {
                return md5($name, true);
            }
        });
        $uuid = $factory->uuid3(Uuid::NIL, 'OfflinePlayer:'.$name)->toString();

        return str_replace('-', '', $uuid);
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
