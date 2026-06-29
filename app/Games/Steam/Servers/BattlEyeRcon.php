<?php

namespace Azuriom\Games\Steam\Servers;

use Azuriom\Games\Steam\Servers\Protocol\BattlEyeRcon as RconClient;
use Azuriom\Models\User;

class BattlEyeRcon extends Query
{
    use SteamBridge;

    private const DEFAULT_RCON_PORT = 2305;

    public function verifyLink(): bool
    {
        $rcon = $this->connectBattlEye();

        try {
            // "version" is a harmless command that requires a valid login.
            $rcon->command('version');
        } finally {
            $rcon->disconnect();
        }

        return true;
    }

    public function canExecuteCommand(): bool
    {
        return true;
    }

    public function sendCommands(array $commands, User $user, bool $needConnected = false): void
    {
        $rcon = $this->connectRcon();

        try {
            foreach ($commands as $command) {
                $rcon->command($this->replaceSteamPlaceholders($command, $user));
            }
        } finally {
            $rcon->disconnect();
        }
    }

    protected function connectRcon(): RconClient
    {
        $address = $this->server->address;
        $port = $this->server->data['rcon-port'] ?? ($this->server->port ?? self::DEFAULT_RCON_PORT);
        $password = decrypt($this->server->data['rcon-password'], false);

        $rcon = (new RconClient($address, $port, $password, self::COMMANDS_TIMEOUT));
        $rcon->connect();

        return $rcon;
    }
}
