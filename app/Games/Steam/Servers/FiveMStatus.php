<?php

namespace Azuriom\Games\Steam\Servers;

use Azuriom\Games\ServerBridge;
use Exception;
use Illuminate\Support\Facades\Http;

class FiveMStatus extends ServerBridge
{
    protected const TIMEOUT = 3;

    protected const DEFAULT_PORT = 30120;

    public function getServerData()
    {
        try {
            return $this->getData();
        } catch (Exception) {
            return null;
        }
    }

    public function verifyLink()
    {
        return $this->getData() !== null;
    }

    public function canExecuteCommand()
    {
        return false;
    }

    public function getDefaultPort()
    {
        return self::DEFAULT_PORT;
    }

    private function getData()
    {
        $port = $this->server->port ?? self::DEFAULT_PORT;

        $players = Http::timeout(self::TIMEOUT)
            ->get("{$this->server->address}:{$port}/players.json")
            ->throw()
            ->json();

        $maxPlayers = Http::timeout(self::TIMEOUT)
            ->get("{$this->server->address}:{$port}/info.json")
            ->throw()
            ->json('vars.sv_maxClients', 64);

        return [
            'players' => is_array($players) ? count($players) : 0,
            'max_players' => $maxPlayers,
        ];
    }
}
