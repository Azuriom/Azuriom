<?php

namespace Azuriom\Games;

use Azuriom\Models\Server;

abstract class ServerBridge
{
    /**
     * The associated server.
     *
     * @var \Azuriom\Models\Server
     */
    protected $server;

    /**
     * Create a new ServerBridge instance.
     *
     * @param  \Azuriom\Models\Server  $server
     */
    public function __construct(Server $server)
    {
        $this->server = $server;
    }

    /**
     * Get all the server data.
     *
     * @return array|null
     */
    abstract public function getServerData();

    /**
     * Test the connection to the server.
     *
     * @return bool
     */
    abstract public function verifyLink();

    /**
     * Execute a command on the given server.
     *
     * @param  array  $commands
     * @param  string|null  $playerName
     * @param  bool  $needConnected
     */
    abstract public function executeCommands(array $commands, ?string $playerName, bool $needConnected = false);

    /**
     * Return if the server can execute commands.
     *
     * @return bool
     */
    abstract public function canExecuteCommand();

    public function getDefaultPort()
    {
        return 0;
    }
}
