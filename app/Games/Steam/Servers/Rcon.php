<?php

namespace Azuriom\Games\Steam\Servers;

use Azuriom\Models\User;

class Rcon extends Query
{
    use SteamBridge;

    public function verifyLink(): bool
    {
        // This will call SourceQuery::SetRconPassword which will call SourceRcon::Authorize
        // Both methods will throw if the socket is not connected or password is wrong
        $this->connect(true);

        return true;
    }

    public function sendCommands(array $commands, User $user, bool $needConnected = false): void
    {
        $query = $this->connect(true);

        foreach ($commands as $command) {
            $query->Rcon($this->replaceSteamPlaceholders($command, $user));
        }
    }

    public function canExecuteCommand(): bool
    {
        return true;
    }
}
