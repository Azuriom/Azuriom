<?php

namespace Azuriom\Games\Steam\Servers;

use Azuriom\Models\User;

class Rcon extends Query
{
    public function verifyLink()
    {
        return $this->connect(true)->GetInfo() !== null;
    }

    public function sendCommands(array $commands, User $user = null, bool $needConnected = false)
    {
        $query = $this->connect(true);

        foreach ($commands as $command) {
            $query->Rcon($this->replacePlaceholders($command, $user));
        }
    }

    public function canExecuteCommand()
    {
        return true;
    }
}
