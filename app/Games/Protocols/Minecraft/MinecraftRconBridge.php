<?php

namespace Azuriom\Games\Protocols\Minecraft;

use RuntimeException;
use Thedudeguy\Rcon;

class MinecraftRconBridge extends MinecraftPingBridge
{
    use MinecraftPinger;

    public function verifyLink()
    {
        if (! parent::verifyLink()) {
            return false;
        }

        $rcon = $this->createRcon();

        return $rcon !== null && $rcon->sendCommand('list');
    }

    public function executeCommands(array $commands, ?string $playerName, bool $needConnected = false)
    {
        $rcon = $this->createRcon();

        if ($rcon === null) {
            throw new RuntimeException('Unable to connect to rcon.');
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

        $rcon = new Rcon($this->server->address, $this->server->data['rcon-port'] ?? 25575, $password, 3);

        return $rcon->connect() ? $rcon : null;
    }
}
