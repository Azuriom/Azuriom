<?php

namespace Azuriom\Providers;

use Azuriom\Game\MinecraftOfflineGame;
use Azuriom\Game\MinecraftOnlineGame;
use Illuminate\Support\ServiceProvider;

class GameServiceProvider extends ServiceProvider
{
    public const GAMES = [
        'mc-online' => MinecraftOnlineGame::class,
        'mc-offline' => MinecraftOfflineGame::class,
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
