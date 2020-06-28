<?php

namespace Azuriom\Games;

use Azuriom\Models\Server;
use Azuriom\Models\User;

abstract class ServerBridge
{
    protected const TIMEOUT = 1;
    protected const COMMANDS_TIMEOUT = 3;

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
     * Send commands on the given server.
     *
     * @param  array  $commands
     * @param  \Azuriom\Models\User|null  $user
     * @param  bool  $needConnected
     */
    abstract public function sendCommands(array $commands, User $user = null, bool $needConnected = false);

    /**
     * Execute a command on the given server.
     *
     * @param  array  $commands
     * @param  string|null  $playerName
     * @param  bool  $needConnected
     * @deprecated Use sendCommands() instead.
     */
    public function executeCommands(array $commands, ?string $playerName, bool $needConnected = false)
    {
        $this->sendCommands($commands, User::firstWhere('name', $playerName), $needConnected);
    }

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
