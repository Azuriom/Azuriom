<?php

namespace Azuriom\Games\Minecraft\Servers;

use RuntimeException;
use Thedudeguy\Rcon as MinecraftRcon;

class Rcon extends Ping
{
    public function verifyLink()
    {
        if (! parent::verifyLink()) {
            return false;
        }

        return $this->connectRcon()->sendCommand('list');
    }

    public function executeCommands(array $commands, ?string $playerName, bool $needConnected = false)
    {
        $rcon = $this->connectRcon();

        foreach ($commands as $command) {
            $rcon->sendCommand(str_replace('{player}', $playerName ?? '?', $command));
        }
    }

    public function canExecuteCommand()
    {
        return true;
    }

    protected function connectRcon()
    {
        $port = $this->server->data['rcon-port'] ?? 27015;
        $password = decrypt($this->server->data['rcon-password'], false);

        $rcon = new MinecraftRcon($this->server->address, $port, $password, 3);

        if (! $rcon->connect()) {
            throw new RuntimeException('Unable to connect to rcon.');
        }

        return $rcon;
    }
}
