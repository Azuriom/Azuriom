<?php

namespace Azuriom\Games\Steam;

class SteamID
{
    public static function convertTo32(int $steamId64): string
    {
        $id = $steamId64 & 0xFFFFFFFF;

        // $x = ($steamId64 >> 56) & 0xF;
        $y = $id & 1;
        $z = $id >> 1;

        return "STEAM_0:{$y}:{$z}";
    }

    public static function convertTo64(string $steamId32): int
    {
        [, $y, $z] = explode(':', $steamId32);

        return $z * 2 + (int) $y + 0x110000100000000;
    }
}
