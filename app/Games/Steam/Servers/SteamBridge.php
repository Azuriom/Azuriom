<?php

namespace Azuriom\Games\Steam\Servers;

use Azuriom\Games\Steam\SteamID;
use Azuriom\Models\User;

trait SteamBridge
{
    public function replaceSteamPlaceholders(string $command, User $user = null): string
    {
        if ($user === null) {
            return $this->replacePlaceholders($command, $user);
        }

        return $this->replacePlaceholders($command, $user)
            ->replace('{steam_id}', $user->game_id)
            ->replace('{steam_id_32}', SteamID::convertTo32((int) $user->game_id));
    }
}
