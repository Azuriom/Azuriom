<?php

namespace Azuriom\Game\Server;

use Throwable;

trait MinecraftPinger
{

    public function ping(string $address, int $port = 25565, bool $resolveSrv = true)
    {
        $pinger = new MinecraftPing($address, $port, $resolveSrv);

        try {
            $ping = $pinger->ping();

            return [
                'players' => $ping->players->online,
                'max' => $ping->players->max
            ];
        } catch (Throwable $t) {
            return null;
        } finally {
            $pinger->close();
        }
    }
}
