<?php

namespace Azuriom\Game\Server;

use Azuriom\Models\Server;

interface ServerBridge
{
    /**
     * Get all the server data
     *
     * @param  Server  $server
     * @return array|null
     */
    public function getServerData(Server $server);

    /**
     * Get the online players on the server.
     *
     * @param  Server  $server
     * @return int|null
     */
    public function getOnlinePlayers(Server $server);

    /**
     * Execute a command on the given server.
     *
     * @param  Server  $server
     * @param  string  $command
     */
    public function executeCommand(Server $server, string $command);

    /**
     * Return if the server can execute commands.
     *
     * @param  Server  $server
     * @return bool
     */
    public function canExecuteCommand(Server $server);
}
