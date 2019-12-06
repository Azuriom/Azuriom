<?php

namespace Azuriom\Game\Server;

use Azuriom\Models\Server;
use Thedudeguy\Rcon;

class MinecraftRconBridge implements ServerBridge
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
        $password = decrypt($server->data['rcon-password'], false);

        $rcon = new Rcon($server->ip, $server->data['rcon-port'] ?? 25575, $password, 3);

        if ($rcon->connect()) {
            $rcon->sendCommand($command);
        }
    }

    /**
     * @inheritDoc
     */
    public function canExecuteCommand(Server $server)
    {
        return true;
    }
}
