<?php

namespace Azuriom\Games\Steam;

use Azuriom\Games\Steam\Servers\DayZRcon;
use Azuriom\Games\Steam\Servers\Query;

class DayZGame extends SteamGame
{
    public function __construct()
    {
        // DayZ has no AzLink server mod, so AzLink support is disabled.
        parent::__construct('dayz', 'DayZ', false);
    }

    public function getSupportedServers(): array
    {
        return [
            // Server status / player count via the Steam (A2S) query protocol.
            'source-query' => Query::class,
            // DayZ uses BattlEye RCON instead of Source RCON for commands.
            'dayz-rcon' => DayZRcon::class,
        ];
    }
}
