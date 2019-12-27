<?php

namespace Azuriom\Game\Server;

use Exception;
use Thedudeguy\Rcon;
use Throwable;

class MinecraftRconBridge extends ServerBridge
{
    use MinecraftPinger;

    public function getServerData()
    {
        return $this->ping($this->server->ip, $this->server->port ?? 25565) ?? null;
    }

    public function verifyLink()
    {
        if ($this->getServerData() === null) {
            return false;
        }

        try {
            $rcon = $this->createRcon();

            return $rcon->sendCommand('list');
        } catch (Throwable $t) {
            return false;
        }
    }

    public function executeCommands(array $commands, ?string $playerName)
    {
        $rcon = $this->createRcon();

        if (! $rcon) {
            throw new Exception('Unable to connect to rcon.');
        }

        foreach ($commands as $command) {
            $rcon->sendCommand(str_replace('{player}', $playerName ?? '?', $command));
        }
    }

    public function canExecuteCommand()
    {
        return true;
    }

    protected function createRcon()
    {
        $password = decrypt($this->server->data['rcon-password'], false);

        $rcon = new Rcon($this->server->ip, $this->server->data['rcon-port'] ?? 25575, $password, 3);

        return $rcon->connect() ? $rcon : false;
    }
}
