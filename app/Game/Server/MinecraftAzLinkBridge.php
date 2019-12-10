<?php

namespace Azuriom\Game\Server;

class MinecraftAzLinkBridge extends ServerBridge
{
    public function getServerData()
    {
        // Data are sent by the plugins every minute,
        // this method will not be call unless the
        // server is down.

        return null;
    }

    public function verifyLink(string $ip, int $port, array $data = [])
    {
        // TODO
    }

    public function executeCommands(array $commands, ?string $playerName) {
    }

    public function canExecuteCommand()
    {
        return true;
    }
}
