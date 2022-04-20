<?php

namespace Azuriom\Games;

use Azuriom\Models\User;

class FallbackServerBridge extends ServerBridge
{
    public function getServerData()
    {
        return null;
    }

    public function verifyLink()
    {
        return false;
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
        return false;
    }
}
