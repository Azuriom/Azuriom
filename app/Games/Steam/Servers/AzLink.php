<?php

namespace Azuriom\Games\Steam\Servers;

use Azuriom\Games\ServerBridge;
use Azuriom\Models\User;

class AzLink extends ServerBridge
{
    public function getServerData()
    {
        return null;
    }

    public function verifyLink()
    {
        return true;
    }

    public function sendCommands(array $commands, User $user, bool $needConnected = false)
    {
        foreach ($commands as $command) {
            $this->server->commands()->create([
                'command' => $command,
                'user_id' => $user->id,
                'need_online' => $needConnected,
            ]);
        }
    }

    public function canExecuteCommand()
    {
        return true;
    }

    public function getDefaultPort()
    {
        return Query::DEFAULT_PORT;
    }
}
