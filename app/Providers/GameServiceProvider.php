<?php

namespace Azuriom\Providers;

use Azuriom\Games\Minecraft\Auth\MinecraftOfflineGameAuth;
use Azuriom\Games\Minecraft\Auth\MinecraftOnlineGameAuth;
use Illuminate\Support\ServiceProvider;

class GameServiceProvider extends ServiceProvider
{
    public const GAMES = [
        'mc-online' => MinecraftOnlineGameAuth::class,
        'mc-offline' => MinecraftOfflineGameAuth::class,
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $game = self::GAMES[setting('game-type', 'mc-offline')];

        $this->app->singleton('game', $game);
    }
}
