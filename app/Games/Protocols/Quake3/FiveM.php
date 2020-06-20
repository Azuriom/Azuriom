<?php

namespace Azuriom\Games\Protocols\Quake3;

use Illuminate\Support\Facades\Http;
use Throwable;

class FiveM extends Rcon
{
    public function getServerData()
    {
        try {
            $port = $this->server->data['rcon-port'] ?? ($this->server->port ?? self::DEFAULT_PORT);

            $players = Http::get("{$this->server->address}:{$port}/players.json")->throw()->json();
            $info = Http::get("{$this->server->address}:{$port}/info.json")->throw()->json();

            return [
                'players' => count($players),
                'max_players' => $info['vars']['sv_maxClients'],
            ];
        } catch (Throwable $e) {
            return null;
        }
    }
}
