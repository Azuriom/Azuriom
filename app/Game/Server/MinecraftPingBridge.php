<?php

namespace Azuriom\Game\Server;

use RuntimeException;

class MinecraftPingBridge extends ServerBridge
{
    use MinecraftPinger;

    public function getServerData()
    {
        return $this->ping($this->server->address, $this->server->port ?? 25565);
    }

    public function verifyLink()
    {
        return $this->makePing($this->server->address, $this->server->port ?? 25565);
    }

    public function executeCommands(array $commands, ?string $playerName, bool $needConnected = false)
    {
        report(new RuntimeException('Command cannot be executed with ping link.'));
    }

    public function canExecuteCommand()
    {
        return false;
    }
}
