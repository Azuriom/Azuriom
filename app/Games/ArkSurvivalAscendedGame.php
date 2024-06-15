<?php

namespace Azuriom\Games;

use Azuriom\Games\Steam\Servers\Query;
use Azuriom\Games\Steam\Servers\Rcon;
use Azuriom\Models\User;

class ArkSurvivalAscendedGame extends Game
{
    protected UserAttribute $userPrimaryAttribute = UserAttribute::ID;

    public function name(): string
    {
        return 'ARK: Survival Ascended';
    }

    public function id(): string
    {
        return 'ark-sa';
    }

    public function loginWithOAuth(): bool
    {
        return true;
    }

    public function getSocialiteDriverName(): string
    {
        return 'epic-online-services';
    }

    public function getAvatarUrl(User $user, int $size = 64): string
    {
        return asset('svg/user.svg');
    }

    public function getUserUniqueId(string $name): ?string
    {
        return null; // Not implemented
    }

    public function getUserName(User $user): ?string
    {
        return null; // Not implemented
    }

    public function getSupportedServers(): array
    {
        return [
            'source-query' => Query::class,
            'source-rcon' => Rcon::class,
        ];
    }

    public function trans(string $key, array $placeholders = []): string
    {
        return trans('game.epic.'.$key, $placeholders);
    }
}
