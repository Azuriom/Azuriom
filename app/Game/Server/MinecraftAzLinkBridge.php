<?php

namespace Azuriom\Game\Server;

class MinecraftAzLinkBridge extends ServerBridge
{
    use MinecraftPinger;

    public function getServerData()
    {
        // Data are sent by the plugins every minute,
        // this method will not be call unless the
        // server is down.

        return null;
    }

    public function verifyLink()
    {
        return $this->ping($this->server->ip, $this->server->port ?? 25565) !== null;
    }

    public function executeCommands(array $commands, ?string $playerName) {
    }

    public function canExecuteCommand()
    {
        return true;
    }
}
