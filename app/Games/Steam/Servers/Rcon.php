<?php

namespace Azuriom\Games\Steam\Servers;

use Azuriom\Models\User;

class Rcon extends Query
{
    use SteamBridge;

    public function verifyLink()
    {
        $query = $this->connect(true);

        $reflection = new \ReflectionClass($query);
        $property = $reflection->getProperty('Connected');
        $property->setAccessible(true);

        return $property->getValue($query);
    }

    public function sendCommands(array $commands, User $user, bool $needConnected = false)
    {
        $query = $this->connect(true);

        foreach ($commands as $command) {
            $query->Rcon($this->replaceSteamPlaceholders($command, $user));
        }
    }

    public function canExecuteCommand()
    {
        return true;
    }
}
