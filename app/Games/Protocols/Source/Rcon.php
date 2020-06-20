<?php

namespace Azuriom\Games\Protocols\Source;

class Rcon extends Query
{
    public function verifyLink()
    {
        return $this->connect(true)->GetInfo() !== null;
    }

    public function executeCommands(array $commands, ?string $playerName, bool $needConnected = false)
    {
        $query = $this->connect(true);

        foreach ($commands as $command) {
            $query->Rcon(str_replace('{player}', $playerName ?? '?', $command));
        }
    }

    public function canExecuteCommand()
    {
        return true;
    }
}
