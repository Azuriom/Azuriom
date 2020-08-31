<?php

namespace Azuriom\Games\Minecraft;

use Azuriom\Games\Game;
use Azuriom\Games\Minecraft\Servers\AzLink;
use Azuriom\Games\Minecraft\Servers\Ping;
use Azuriom\Games\Minecraft\Servers\Rcon;

abstract class AbstractMinecraftGame extends Game
{
    public function name()
    {
        return 'Minecraft';
    }

    public function getSupportedServers()
    {
        return [
            'mc-ping' => Ping::class,
            'mc-rcon' => Rcon::class,
            'mc-azlink' => AzLink::class,
        ];
    }

    public function trans(string $key, array $placeholders = [])
    {
        return trans('game.minecraft.'.$key, $placeholders);
    }
}
