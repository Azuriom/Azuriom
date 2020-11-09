<?php

namespace Azuriom\Providers;

use Azuriom\Games\FallbackGame;
use Azuriom\Games\Minecraft\MinecraftOfflineGame;
use Azuriom\Games\Minecraft\MinecraftOnlineGame;
use Azuriom\Games\Steam\RustGame;
use Azuriom\Games\Steam\SteamGame;
use Illuminate\Support\Arr;
use Illuminate\Support\ServiceProvider;

class GameServiceProvider extends ServiceProvider
{

    protected static $games = [
        'fallback' => FallbackGame::class,
        'mc-online' => MinecraftOnlineGame::class,
        'mc-offline' => MinecraftOfflineGame::class,
        'rust' => RustGame::class,
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->addGames([
            'gmod' => SteamGame::forName('Garry\'s Mod'),
            'ark' => SteamGame::forName('ARK'),
            'csgo' => SteamGame::forName('CS:GO'),
            'tf2' => SteamGame::forName('Team Fortress 2')
        ]); 
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $gameType = config('azuriom.game') ?? setting('game-type', 'mc-offline');
        $game = Arr::get($this->getAvailableGames(), $gameType, FallbackGame::class);

        if (is_string($game)) {
            $this->app->singleton('game', $game);

            return;
        }

        $this->app->instance('game', $game);
    }

    protected function getAvailableGames()
    {
        return GameServiceProvider::$games;
    }

    public static function addGames(array $games)
    {
        GameServiceProvider::$games = array_merge(GameServiceProvider::$games, $games);
    }
}
