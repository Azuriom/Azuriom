<?php

namespace Azuriom\Games\Minecraft;

use Azuriom\Games\Game;
use Azuriom\Games\Minecraft\Servers\AzLink;
use Azuriom\Games\Minecraft\Servers\Ping;
use Azuriom\Games\Minecraft\Servers\Rcon;
use Azuriom\Socialite\Xbox\XboxProvider;
use Illuminate\Http\Exceptions\HttpResponseException;

abstract class AbstractMinecraftGame extends Game
{
    public function __construct()
    {
        XboxProvider::$notFoundCallback = fn () => new HttpResponseException(
            to_route('home')->with('error', trans('game.minecraft.missing')));

        XboxProvider::$childCallback = fn () => new HttpResponseException(
            to_route('home')->with('error', trans('game.minecraft.child')));
    }

    public function name(): string
    {
        return 'Minecraft';
    }

    public function getSupportedServers(): array
    {
        return [
            'mc-ping' => Ping::class,
            'mc-rcon' => Rcon::class,
            'mc-azlink' => AzLink::class,
        ];
    }

    public function trans(string $key, array $placeholders = []): string
    {
        return trans('game.minecraft.'.$key, $placeholders);
    }

    public function isExtensionCompatible(array $supportedGames): bool
    {
        if (parent::isExtensionCompatible($supportedGames)) {
            return true;
        }

        return in_array('minecraft', $supportedGames, true);
    }
}
