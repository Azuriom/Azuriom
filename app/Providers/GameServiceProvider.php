<?php

namespace Azuriom\Providers;

use Azuriom\Games\FallbackGame;
use Azuriom\Games\Minecraft\MinecraftBedrockGame;
use Azuriom\Games\Minecraft\MinecraftOfflineGame;
use Azuriom\Games\Minecraft\MinecraftOnlineGame;
use Azuriom\Games\Steam\FiveMGame;
use Azuriom\Games\Steam\RustGame;
use Azuriom\Games\Steam\SteamGame;
use Azuriom\Socialite\DiscordProvider;
use Azuriom\Socialite\Minecraft\AzuriomMinecraftProvider;
use Azuriom\Socialite\Xbox\AzuriomXboxProvider;
use Illuminate\Support\Arr;
use Illuminate\Support\ServiceProvider;
use Laravel\Socialite\Contracts\Factory;

class GameServiceProvider extends ServiceProvider
{
    protected static array $games = [];

    /**
     * Register services.
     */
    public function register(): void
    {
        self::registerGames([
            'mc-online' => MinecraftOnlineGame::class,
            'mc-offline' => MinecraftOfflineGame::class,
            'mc-bedrock' => MinecraftBedrockGame::class,
            'gmod' => SteamGame::forName('gmod', 'Garry\'s Mod', true),
            'ark' => SteamGame::forName('ark', 'ARK'),
            'rust' => RustGame::class,
            'fivem' => FiveMGame::class,
            'csgo' => SteamGame::forName('csgo', 'CS:GO'),
            'tf2' => SteamGame::forName('tf2', 'Team Fortress 2'),
        ]);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->registerSocialiteProviders();

        $gameType = config('azuriom.game') ?? '';
        $game = Arr::get(static::$games, $gameType, FallbackGame::class);

        if (is_string($game)) {
            $this->app->singleton('game', $game);

            return;
        }

        $this->app->instance('game', $game);
    }

    protected function registerSocialiteProviders(): void
    {
        $socialite = $this->app->make(Factory::class);

        $socialite->extend('xbox', function ($app) use ($socialite) {
            $config = $app['config']['services.microsoft'];

            return $socialite->buildProvider(AzuriomXboxProvider::class, $config);
        });

        $socialite->extend('minecraft', function ($app) use ($socialite) {
            $config = $app['config']['services.microsoft'];

            return $socialite->buildProvider(AzuriomMinecraftProvider::class, $config);
        });

        $socialite->extend('discord', function () use ($socialite) {
            return $socialite->buildProvider(DiscordProvider::class, [
                'client_id' => setting('discord.client_id'),
                'client_secret' => setting('discord.client_secret'),
                'redirect' => '/profile/discord/callback',
            ]);
        });
    }

    public static function registerGames(array $games): void
    {
        static::$games = array_merge(static::$games, $games);
    }
}
