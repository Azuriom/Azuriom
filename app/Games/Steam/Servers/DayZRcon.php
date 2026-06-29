<?php

namespace Azuriom\Games\Steam\Servers;

use Azuriom\Games\Steam\Servers\Protocol\BattlEyeRcon;
use Azuriom\Models\User;

class DayZRcon extends Query
{
    use SteamBridge;

    private const DEFAULT_RCON_PORT = 2306;

    public function verifyLink(): bool
    {
        $rcon = $this->connectBattlEye();

        try {
            // "players" is a harmless command that requires a valid login.
            $rcon->command('players');
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
        $rcon = $this->connectBattlEye();

        try {
            foreach ($commands as $command) {
                $rcon->command($this->replaceSteamPlaceholders($command, $user));
            }
        } finally {
            $rcon->disconnect();
        }
    }

    public function getDefaultPort(): int
    {
        return self::DEFAULT_RCON_PORT;
    }

    protected function connectBattlEye(): BattlEyeRcon
    {
        $address = $this->server->address;
        $port = $this->server->data['rcon-port'] ?? ($this->server->port ?? self::DEFAULT_RCON_PORT);
        $password = decrypt($this->server->data['rcon-password'], false);

        $rcon = new BattlEyeRcon($address, (int) $port, $password, self::COMMANDS_TIMEOUT);
        $rcon->connect();

        return $rcon;
    }
}
