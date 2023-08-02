<?php

namespace Azuriom\Games\Steam\Servers;

use Azuriom\Games\ServerBridge;
use Azuriom\Models\User;

class AzLink extends ServerBridge
{
    public function getServerData(): ?array
    {
        return null;
    }

    public function verifyLink(): bool
    {
        return true;
    }

    public function sendCommands(array $commands, User $user, bool $needConnected = false): void
    {
        foreach ($commands as $command) {
            $this->server->commands()->create([
                'command' => $command,
                'user_id' => $user->id,
                'need_online' => $needConnected,
            ]);
        }
    }

    public function canExecuteCommand(): bool
    {
        return true;
    }

    public function getDefaultPort(): int
    {
        return Query::DEFAULT_PORT;
    }
}
