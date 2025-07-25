<?php

namespace Azuriom\Games\Minecraft;

use Azuriom\Models\User;
use Closure;
use Illuminate\Support\Str;
use Ramsey\Uuid\Generator\NameGeneratorInterface;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidFactory;
use Ramsey\Uuid\UuidInterface;

class MinecraftOfflineGame extends AbstractMinecraftGame
{
    protected static ?Closure $avatarRetriever = null;

    public function id(): string
    {
        return 'mc-offline';
    }

    public function getAvatarUrl(User $user, int $size = 64): string
    {
        if (static::$avatarRetriever !== null) {
            return (static::$avatarRetriever)($user, $size);
        }

        $name = strtolower($user->name);
        return "https://mc-heads.net/avatar/{$name}/{$size}.png";
    }

    public function getUserUniqueId(string $name): ?string
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

        return Str::remove('-', $uuid);
    }

    public function getUserName(User $user): ?string
    {
        return $user->name;
    }

    public static function setAvatarRetriever(Closure $avatarRetriever): void
    {
        self::$avatarRetriever = $avatarRetriever;
    }
}
