<?php

namespace Azuriom\Games;

use Azuriom\Models\User;

class FallbackServerBridge extends ServerBridge
{
    public function getServerData(): ?array
    {
        return null;
    }

    public function verifyLink(): bool
    {
        return false;
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
        return false;
    }
}
