<?php

namespace Azuriom\Game\Server;

use Azuriom\Models\Server;
use RuntimeException;

class MinecraftPingBridge implements ServerBridge
{
    use MinecraftPinger;

    /**
     * @inheritDoc
     */
    public function getServerData(Server $server)
    {
        return $this->ping($server->ip, $server->port ?? 25565) ?? null;
    }

    /**
     * @inheritDoc
     */
    public function getOnlinePlayers(Server $server)
    {
        $data = $this->getServerData($server);

        return $data ? $data['players'] : null;
    }

    /**
     * @inheritDoc
     */
    public function executeCommand(Server $server, string $command)
    {
        throw new RuntimeException('Command cannot be executed with ping link.');
    }

    /**
     * @inheritDoc
     */
    public function canExecuteCommand(Server $server)
    {
        return false;
    }
}
