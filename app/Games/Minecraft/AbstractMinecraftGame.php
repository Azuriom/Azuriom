<?php

namespace Azuriom\Games\Minecraft;

use Azuriom\Games\Game;
use Azuriom\Games\Minecraft\Servers\AzLink;
use Azuriom\Games\Minecraft\Servers\Ping;
use Azuriom\Games\Minecraft\Servers\Rcon;
use Azuriom\Socialite\Minecraft\MinecraftProvider;
use Azuriom\Socialite\Xbox\XboxProvider;
use Illuminate\Http\Exceptions\HttpResponseException;

abstract class AbstractMinecraftGame extends Game
{
    public function __construct()
    {
        XboxProvider::$notFoundCallback = function () {
            return new HttpResponseException(
                redirect()->home()->with('error', trans('game.minecraft.missing'))
            );
        };

        MinecraftProvider::$notFoundCallback = function () {
            return new HttpResponseException(
                redirect()->home()->with('error', trans('game.minecraft.missing'))
            );
        };
    }

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

    public function isExtensionCompatible(array $supportedGames)
    {
        if (parent::isExtensionCompatible($supportedGames)) {
            return true;
        }

        return in_array('minecraft', $supportedGames, true);
    }
}
