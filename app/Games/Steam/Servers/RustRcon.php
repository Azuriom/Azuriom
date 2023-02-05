<?php

namespace Azuriom\Games\Steam\Servers;

use Azuriom\Games\Steam\Servers\Protocol\RustRcon as RustRconProtocol;
use Azuriom\Models\User;
use Exception;
use Illuminate\Support\Arr;

class RustRcon extends Query
{
    use SteamBridge;

    private const DEFAULT_RCON_PORT = 28016;

    public function getServerData()
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

    public function verifyLink()
    {
        $this->sendCommands(['status'], new User([
            'name' => 'Test',
            'game_id' => 'O',
        ]));

        return true;
    }

    public function getDefaultPort()
    {
        return self::DEFAULT_RCON_PORT;
    }

    public function canExecuteCommand()
    {
        return true;
    }

    public function sendCommands(array $commands, User $user, bool $needConnected = false)
    {
        $rcon = $this->connectWebRcon();

        foreach ($commands as $command) {
            $rcon->sendCommand($this->replaceSteamPlaceholders($command, $user));
        }
    }

    protected function connectWebRcon()
    {
        $address = $this->server->address;
        $port = $this->server->data['rcon-port'] ?? ($this->server->port ?? self::DEFAULT_RCON_PORT);
        $password = decrypt($this->server->data['rcon-password'], false);

        return new RustRconProtocol($address, $port, $password);
    }
}
