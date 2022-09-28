<?php

namespace Azuriom\Games;

use Azuriom\Models\Server;
use Azuriom\Models\User;
use RuntimeException;

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
     * Depending on the server ping, this may take a while (up to one second).
     *
     * @param  string[]  $commands
     * @param  \Azuriom\Models\User  $user
     * @param  bool  $needConnected
     */
    public function sendCommands(array $commands, User $user, bool $needConnected = false)
    {
        if (! $this->canExecuteCommand()) {
            report(new RuntimeException('Command cannot be executed with this link.'));

            return;
        }

        throw new RuntimeException('The sendCommands() method must be implemented.');
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

    public function replacePlaceholders(string $command, User $user = null)
    {
        if ($user === null) {
            return str($command);
        }

        return str($command)
            ->replace('{player}', $user->name)
            ->replace('{name}', $user->name);
    }
}
