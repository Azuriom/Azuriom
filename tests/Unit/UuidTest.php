<?php

namespace Tests\Unit;

use Azuriom\Games\Minecraft\MinecraftOfflineGame;
use PHPUnit\Framework\TestCase;

class UuidTest extends TestCase
{
    public function testOfflineModeUuid()
    {
        $game = new MinecraftOfflineGame();

        $this->assertSame('1391789e884331de8eb3726813c10211', $game->getUserUniqueId('Azuriom'));
        $this->assertSame('167a91f89eb63496a700340000b5f9e6', $game->getUserUniqueId('MrMicky_'));
    }
}
