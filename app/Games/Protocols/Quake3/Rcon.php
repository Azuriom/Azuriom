<?php

namespace Azuriom\Games\Protocols\Quake3;

use Exception;
use RuntimeException;
use Azuriom\Games\ServerBridge;
use Azuriom\Games\ProtocolAdapters\Quake3Protocol;

class Rcon extends ServerBridge
{
    protected const DEFAULT_PORT = 30120; // FiveM default

    protected const TIMEOUT = 1;

    protected $isConnected = false;

    public function getServerData()
    {
        try {
            $info = $this->connect()->getGameStatus();

            return [
                'players' => $info['Players'],
                'max_players' => $info['MaxPlayers'],
            ];
        } catch (Exception $e) {
            return null;
        }
    }

    public function verifyLink()
    {
        $this->connect();
        return $this->isConnected;
    }

    public function executeCommands(array $commands, ?string $playerName, bool $needConnected = false)
    {
        $query = $this->connect();

        foreach ($commands as $command) {
            $query->rcon(str_replace('{player}', $playerName ?? '?', $command));
        }
    }

    public function canExecuteCommand()
    {
        return true;
    }

    public function getDefaultPort()
    {
        return self::DEFAULT_PORT;
    }

    protected function connect(bool $rcon = true)
    {
        $address = $this->server->address;
        $port = $this->server->data['rcon-port'] ?? ($this->server->port ?? self::DEFAULT_PORT);

        $query = new Quake3Protocol($address, $port, $success);

        $this->isConnected = $success;

        if ($rcon) {
            $password = decrypt($this->server->data['rcon-password'], false);

            $query->setRconpassword($password);
        }

        return $query;
    }
}
