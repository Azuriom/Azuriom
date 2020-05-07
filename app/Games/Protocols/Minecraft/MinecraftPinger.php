<?php

namespace Azuriom\Games\Protocols\Minecraft;

use Exception;

trait MinecraftPinger
{
    public function ping(string $address, int $port = 25565, bool $resolveSrv = true)
    {
        try {
            return $this->makePing($address, $port, $resolveSrv);
        } catch (Exception $t) {
            return null;
        }
    }

    protected function makePing(string $address, int $port = 25565, bool $resolveSrv = true)
    {
        $pinger = new MinecraftPing($address, $port, $resolveSrv);

        try {
            $ping = $pinger->ping();

            return [
                'players' => $ping->players->online,
                'max' => $ping->players->max,
            ];
        } finally {
            $pinger->close();
        }
    }
}
