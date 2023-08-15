<?php

namespace Azuriom\Games\Steam\Servers;

use Azuriom\Games\Steam\Servers\Protocol\FiveMRcon as RconClient;
use Azuriom\Models\User;

class FiveMRcon extends FiveMStatus
{
    use SteamBridge;

    public function sendCommands(array $commands, User $user, bool $needConnected = false): void
    {
        $rcon = $this->connectRcon();

        foreach ($commands as $command) {
            $rcon->sendCommand($this->replaceSteamPlaceholders($command, $user));
        }
    }

    public function verifyLink(): bool
    {
        return parent::verifyLink() && $this->connectRcon() !== null;
    }

    public function canExecuteCommand(): bool
    {
        return true;
    }

    protected function connectRcon(): RconClient
    {
        $port = $this->server->data['rcon-port'] ?? ($this->server->port ?? self::DEFAULT_PORT);
        $password = decrypt($this->server->data['rcon-password'], false);

        $rcon = new RconClient($this->server->address, $port, $password);

        $rcon->connect();

        return $rcon;
    }
}
