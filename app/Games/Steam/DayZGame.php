<?php

namespace Azuriom\Games\Steam;

use Azuriom\Games\Steam\Servers\BattlEyeRcon;
use Azuriom\Games\Steam\Servers\Query;

class DayZGame extends SteamGame
{
    public function __construct()
    {
        parent::__construct('dayz', 'DayZ');
    }

    public function getSupportedServers(): array
    {
        return [
            // Server status / player count via the Steam (A2S) query protocol.
            'source-query' => Query::class,
            // DayZ uses BattlEye RCON instead of Source RCON for commands.
            'battleye-rcon' => BattlEyeRcon::class,
        ];
    }
}
