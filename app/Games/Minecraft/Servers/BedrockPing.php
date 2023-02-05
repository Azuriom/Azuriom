<?php

namespace Azuriom\Games\Minecraft\Servers;

use Azuriom\Games\Minecraft\Servers\Protocol\MinecraftBedrockPing;
use Azuriom\Games\ServerBridge;
use Azuriom\Models\User;
use Exception;
use Illuminate\Support\Arr;
use RuntimeException;

class BedrockPing extends ServerBridge
{
    protected const DEFAULT_PORT = 19132;

    public function getServerData()
    {
        try {
            return $this->ping($this->server->address, $this->server->port);
        } catch (Exception) {
            return null;
        }
    }

    public function verifyLink()
    {
        $this->ping($this->server->address, $this->server->port);

        return true;
    }

    public function sendCommands(array $commands, User $user, bool $needConnected = false)
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

    protected function ping(string $address, int $port = null)
    {
        $pinger = new MinecraftBedrockPing($address, $port ?? self::DEFAULT_PORT);

        try {
            $response = $pinger->ping();

            return [
                'players' => Arr::get($response, 'Players', 0),
                'max_players' => Arr::get($response, 'MaxPlayers', 0),
            ];
        } finally {
            $pinger->close();
        }
    }
}
