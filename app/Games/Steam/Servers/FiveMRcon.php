<?php

namespace Azuriom\Games\Steam\Servers;

use Azuriom\Games\Steam\Servers\Protocol\FiveMRcon as FiveMRconProtocol;
use Azuriom\Models\User;

class FiveMRcon extends FiveMStatus
{
    use SteamBridge;

    public function sendCommands(array $commands, User $user, bool $needConnected = false)
    {
        $rcon = $this->connectRcon();

        foreach ($commands as $command) {
            $rcon->sendCommand($this->replaceSteamPlaceholders($command, $user));
        }
    }

    public function verifyLink()
    {
        return parent::verifyLink() && $this->connectRcon() !== null;
    }

    public function canExecuteCommand()
    {
        return true;
    }

    protected function connectRcon()
    {
        $port = $this->server->data['rcon-port'] ?? ($this->server->port ?? self::DEFAULT_PORT);
        $password = decrypt($this->server->data['rcon-password'], false);

        $rcon = new FiveMRconProtocol($this->server->address, $port, $password);

        $rcon->connect();

        return $rcon;
    }
}
