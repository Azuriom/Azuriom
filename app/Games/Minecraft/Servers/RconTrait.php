<?php

namespace Azuriom\Games\Minecraft\Servers;

use Azuriom\Models\User;
use RuntimeException;
use Thedudeguy\Rcon as MinecraftRcon;

trait RconTrait
{
    public function sendCommands(array $commands, User $user, bool $needConnected = false)
    {
        $rcon = $this->connectRcon();

        foreach ($commands as $command) {
            $rcon->sendCommand($this->replacePlaceholders($command, $user));
        }
    }

    public function canExecuteCommand()
    {
        return true;
    }

    protected function connectRcon()
    {
        $port = ($this->server->data['rcon-port'] ?? $this->server->port) ?? $this->getDefaultPort();
        $password = decrypt($this->server->data['rcon-password'], false);
        $timeout = self::COMMANDS_TIMEOUT;

        $rcon = new MinecraftRcon($this->server->address, $port, $password, $timeout);

        if (! $rcon->connect()) {
            throw new RuntimeException('Unable to connect to rcon.');
        }

        return $rcon;
    }
}
