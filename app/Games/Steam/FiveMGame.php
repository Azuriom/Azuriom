<?php

namespace Azuriom\Games\Steam;

use Azuriom\Games\Steam\Servers\FiveMRcon;
use Azuriom\Games\Steam\Servers\FiveMStatus;

class FiveMGame extends SteamGame
{
    public function __construct()
    {
        parent::__construct('fivem', 'FiveM');
    }

    public function getSupportedServers()
    {
        return [
            'fivem-status' => FiveMStatus::class,
            'fivem-rcon' => FiveMRcon::class,
        ];
    }
}
