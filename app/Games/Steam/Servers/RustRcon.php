<?php

namespace Azuriom\Games\Steam\Servers;

use Azuriom\Games\Steam\Servers\Protocol\RustRcon as RustRconProtocol;
use Azuriom\Models\User;

class RustRcon extends Query
{
    private const DEFAULT_RCON_PORT = 28016;

    public function verifyLink()
    {
        $this->sendCommands(['status']);

        return true;
    }

    public function sendCommands(array $commands, User $user = null, bool $needConnected = false)
    {
        $address = $this->server->address;
        $port = $this->server->data['rcon-port'] ?? ($this->server->port ?? self::DEFAULT_RCON_PORT);
        $password = decrypt($this->server->data['rcon-password'], false);

        $rcon = new RustRconProtocol($address, $port, $password);

        foreach ($commands as $command) {
            $rcon->sendCommand($this->replacePlaceholders($command, $user));
        }
    }
}
