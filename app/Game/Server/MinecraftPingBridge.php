<?php

namespace Azuriom\Game\Server;

use RuntimeException;

class MinecraftPingBridge extends ServerBridge
{
    use MinecraftPinger;

    public function getServerData()
    {
        return $this->ping($this->server->ip, $server->port ?? 25565) ?? null;
    }

    public function verifyLink(string $ip, int $port, array $data = [])
    {
        return $this->ping($ip, $port) !== null;
    }

    public function executeCommands(array $commands, ?string $playerName)
    {
        throw new RuntimeException('Command cannot be executed with ping link.');
    }

    public function canExecuteCommand()
    {
        return false;
    }
}
