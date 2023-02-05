<?php

namespace Azuriom\Games\Steam;

class SteamID
{
    public static function convertTo32($steamId64)
    {
        $id = ((int) $steamId64) & 0xFFFFFFFF;

        // $x = ($steamId64 >> 56) & 0xF;
        $y = $id & 1;
        $z = $id >> 1;

        return "STEAM_0:{$y}:{$z}";
    }

    public static function convertTo64(string $steamId32)
    {
        [, $y, $z] = explode(':', $steamId32);

        return $z * 2 + $y + 0x110000100000000;
    }
}
