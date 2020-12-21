<?php

namespace Azuriom\Games\Steam;

use Azuriom\Games\Steam\Servers\Query;
use Azuriom\Games\Steam\Servers\RustRcon;

class RustGame extends SteamGame
{
    public function __construct()
    {
        parent::__construct('rust', 'Rust');
    }

    public function getSupportedServers()
    {
        return [
            'source-query' => Query::class,
            // Rust use a WebSocket based Rcon
            'rust-rcon' => RustRcon::class,
        ];
    }
}
