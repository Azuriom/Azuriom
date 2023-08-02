<?php

namespace Azuriom\Games\Steam\Servers;

use Azuriom\Games\Steam\Servers\Protocol\RustRcon as RconClient;
use Azuriom\Models\User;
use Exception;
use Illuminate\Support\Arr;

class RustRcon extends Query
{
    use SteamBridge;

    private const DEFAULT_RCON_PORT = 28016;

    public function getServerData(): ?array
    {
        try {
            $info = $this->connectWebRcon()->getServerInfo();

            return [
                'players' => Arr::get($info, 'Players'),
                'max_players' => Arr::get($info, 'MaxPlayers'),
                'ram' => Arr::get($info, 'Memory'),
                'entities' => Arr::get($info, 'EntityCount'),
                'framerate' => Arr::get($info, 'Framerate'),
            ];
        } catch (Exception) {
            return parent::getServerData();
        }
    }

    public function verifyLink(): bool
    {
        $this->sendCommands(['status'], new User([
            'name' => 'Test',
            'game_id' => 'O',
        ]));

        return true;
    }

    public function getDefaultPort(): int
    {
        return self::DEFAULT_RCON_PORT;
    }

    public function canExecuteCommand(): bool
    {
        return true;
    }

    public function sendCommands(array $commands, User $user, bool $needConnected = false): void
    {
        $rcon = $this->connectWebRcon();

        foreach ($commands as $command) {
            $rcon->sendCommand($this->replaceSteamPlaceholders($command, $user));
        }
    }

    protected function connectWebRcon(): RconClient
    {
        $address = $this->server->address;
        $port = $this->server->data['rcon-port'] ?? ($this->server->port ?? self::DEFAULT_RCON_PORT);
        $password = decrypt($this->server->data['rcon-password'], false);

        return new RconClient($address, $port, $password);
    }
}
