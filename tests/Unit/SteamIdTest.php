<?php

namespace Tests\Unit;

use Azuriom\Games\Steam\SteamID;
use PHPUnit\Framework\TestCase;

class SteamIdTest extends TestCase
{
    public function testConversionFrom64To32()
    {
        $this->assertSame('STEAM_0:0:44051465', SteamID::convertTo32(76561198048368658));
        $this->assertSame('STEAM_0:0:553987157', SteamID::convertTo32(76561199068240042));
        $this->assertSame('STEAM_0:0:12670972', SteamID::convertTo32(76561197985607672));
        $this->assertSame('STEAM_0:0:24898512', SteamID::convertTo32(76561198010062752));
    }

    public function testConversionFrom32To64()
    {
        $this->assertSame(76561198048368658, SteamID::convertTo64('STEAM_0:0:44051465'));
        $this->assertSame(76561199068240042, SteamID::convertTo64('STEAM_0:0:553987157'));
        $this->assertSame(76561197985607672, SteamID::convertTo64('STEAM_0:0:12670972'));
        $this->assertSame(76561198010062752, SteamID::convertTo64('STEAM_0:0:24898512'));
    }
}
