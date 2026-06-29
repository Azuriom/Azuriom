<?php

namespace Tests\Unit;

use Azuriom\Games\Steam\DayZGame;
use Azuriom\Games\Steam\Servers\DayZRcon;
use Azuriom\Games\Steam\Servers\Query;
use PHPUnit\Framework\TestCase;

class DayZGameTest extends TestCase
{
    public function test_game_identity(): void
    {
        $game = new DayZGame();

        $this->assertSame('dayz', $game->id());
        $this->assertSame('DayZ', $game->name());
    }

    public function test_reuses_steam_login(): void
    {
        $game = new DayZGame();

        $this->assertTrue($game->loginWithOAuth());
        $this->assertSame('steam', $game->getSocialiteDriverName());
    }

    public function test_supported_servers(): void
    {
        $servers = (new DayZGame())->getSupportedServers();

        // Status via the Steam (A2S) query, commands via BattlEye RCON.
        $this->assertSame(Query::class, $servers['source-query']);
        $this->assertSame(DayZRcon::class, $servers['dayz-rcon']);

        // DayZ does not speak Source RCON, so it must not be advertised.
        $this->assertArrayNotHasKey('source-rcon', $servers);
    }
}
