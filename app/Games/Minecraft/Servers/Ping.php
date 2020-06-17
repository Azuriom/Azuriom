<?php

namespace Azuriom\Games\Minecraft\Servers;

use Azuriom\Games\Minecraft\Servers\Protocol\MinecraftPing;
use Azuriom\Games\ServerBridge;
use Exception;
use RuntimeException;

class Ping extends ServerBridge
{
    protected const TIMEOUT = 1;
    protected const DEFAULT_PORT = 25565;

    public function getServerData()
    {
        try {
            return $this->ping($this->server->address, $this->server->port);
        } catch (Exception $e) {
            return null;
        }
    }

    public function verifyLink()
    {
        return $this->ping($this->server->address, $this->server->port);
    }

    public function executeCommands(array $commands, ?string $playerName, bool $needConnected = false)
    {
        report(new RuntimeException('Command cannot be executed with ping link.'));
    }

    public function canExecuteCommand()
    {
        return false;
    }

    public function getDefaultPort()
    {
        return self::DEFAULT_PORT;
    }

    protected function ping(string $address, int $port = null, bool $resolveSrv = true)
    {
        $pinger = new MinecraftPing($address, $port ?? self::DEFAULT_PORT, $resolveSrv);

        try {
            $response = $pinger->ping(self::TIMEOUT);

            return [
                'players' => $response->players->online,
                'max_players' => $response->players->max,
            ];
        } finally {
            $pinger->close();
        }
    }
}
