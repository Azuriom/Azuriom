<?php

namespace Azuriom\Games\Minecraft\Servers;

use Azuriom\Models\User;

class Rcon extends Ping
{
    use RconTrait;

    public function verifyLink()
    {
        if (! parent::verifyLink()) {
            return false;
        }

        return $this->connectRcon()->sendCommand('list');
    }

    public function replacePlaceholders(string $command, User $user = null)
    {
        if ($user === null) {
            return parent::replacePlaceholders($command, $user);
        }

        return parent::replacePlaceholders($command, $user)
            ->replace('{uuid}', $user->game_id);
    }
}
