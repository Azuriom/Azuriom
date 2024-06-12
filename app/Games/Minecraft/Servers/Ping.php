<?php

namespace Azuriom\Games\Minecraft\Servers;

use Azuriom\Games\Minecraft\Servers\Protocol\MinecraftPing;
use Azuriom\Games\ServerBridge;
use Exception;
use Illuminate\Support\Arr;

class Ping extends ServerBridge
{
    protected const DEFAULT_PORT = 25565;

    public function getServerData(): ?array
    {
        try {
            return $this->ping($this->server->address, $this->server->port);
        } catch (Exception) {
            return null;
        }
    }

    public function verifyLink(): bool
    {
        $this->ping($this->server->address, $this->server->port);

        return true;
    }

    public function canExecuteCommand(): bool
    {
        return false;
    }

    public function getDefaultPort(): int
    {
        return self::DEFAULT_PORT;
    }

    protected function ping(string $address, ?int $port = null, bool $resolveSrv = true): array
    {
        $client = new MinecraftPing($address, $port ?? self::DEFAULT_PORT, $resolveSrv);

        try {
            $response = $client->ping(self::TIMEOUT);

            return [
                'players' => Arr::get($response, 'players.online', 0),
                'max_players' => Arr::get($response, 'players.max', 0),
            ];
        } finally {
            $client->close();
        }
    }
}
