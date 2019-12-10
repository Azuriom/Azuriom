<?php

namespace Azuriom\Game\Server;

use Thedudeguy\Rcon;

class MinecraftRconBridge extends ServerBridge
{
    use MinecraftPinger;

    public function getServerData()
    {
        return $this->ping($this->server->ip, $server->port ?? 25565) ?? null;
    }

    public function verifyLink(string $ip, int $port, array $data = [])
    {
        if ($this->ping($ip, $port) === null) {
            return false;
        }

        $password = decrypt($this->server->data['rcon-password'], false);

        $rcon = new Rcon($ip, $data['rcon-port'] ?? 25575, $password, 3);

        return $rcon->connect() && $rcon->sendCommand('list');
    }

    public function executeCommands(array $commands, ?string $playerName)
    {
        $password = decrypt($this->server->data['rcon-password'], false);

        $rcon = new Rcon($this->server->ip, $server->data['rcon-port'] ?? 25575, $password, 3);

        if ($rcon->connect()) {
            foreach ($commands as $command) {
                $rcon->sendCommand(str_replace('{player}', $playerName ?? '?', $command));
            }
        }
    }

    public function canExecuteCommand()
    {
        return true;
    }
}
