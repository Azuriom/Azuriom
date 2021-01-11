<?php

namespace Azuriom\Providers;

use Azuriom\Games\FallbackGame;
use Azuriom\Games\Minecraft\MinecraftBedrockGame;
use Azuriom\Games\Minecraft\MinecraftOfflineGame;
use Azuriom\Games\Minecraft\MinecraftOnlineGame;
use Azuriom\Games\Steam\RustGame;
use Azuriom\Games\Steam\SteamGame;
use Illuminate\Support\Arr;
use Illuminate\Support\ServiceProvider;

class GameServiceProvider extends ServiceProvider
{
    protected static $games = [];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        self::registerGames([
            'mc-online' => MinecraftOnlineGame::class,
            'mc-offline' => MinecraftOfflineGame::class,
            'mc-bedrock' => MinecraftBedrockGame::class,
            'gmod' => SteamGame::forName('gmod', 'Garry\'s Mod'),
            'ark' => SteamGame::forName('ark', 'ARK'),
            'rust' => RustGame::class,
            'csgo' => SteamGame::forName('csgo', 'CS:GO'),
            'tf2' => SteamGame::forName('tf2', 'Team Fortress 2'),
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
        $game = Arr::get(static::$games, $gameType, FallbackGame::class);

        if (is_string($game)) {
            $this->app->singleton('game', $game);

            return;
        }

        $this->app->instance('game', $game);
    }

    public static function registerGames(array $games)
    {
        static::$games = array_merge(static::$games, $games);
    }
}
