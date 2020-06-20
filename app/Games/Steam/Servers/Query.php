<?php

namespace Azuriom\Games\Steam\Servers;

use Azuriom\Games\ServerBridge;
use Azuriom\Models\User;
use Exception;
use RuntimeException;
use xPaw\SourceQuery\SourceQuery;

class Query extends ServerBridge
{
    protected const DEFAULT_PORT = 27015;

    protected const TIMEOUT = 1;

    protected $engine = SourceQuery::SOURCE;

    public function getServerData()
    {
        try {
            $info = $this->connect()->GetInfo();

            if (! $info) {
                return null;
            }

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
        return $this->connect()->GetInfo() !== false;
    }

    public function sendCommands(array $commands, User $user = null, bool $needConnected = false)
    {
        report(new RuntimeException('Command cannot be executed with ping link.'));
    }

    public function canExecuteCommand()
    {
        return false;
    }

    public function getDefaultPort()
    {
        return self::DEFAULT_PORT;
    }

    protected function connect(bool $rcon = false)
    {
        $address = $this->server->address;
        $portKey = $rcon ? 'rcon-port' : 'query-port';
        $port = $this->server->data[$portKey] ?? ($this->server->port ?? self::DEFAULT_PORT);

        $query = new SourceQuery();

        $query->Connect($address, $port, self::TIMEOUT, $this->engine);

        if ($rcon) {
            $password = decrypt($this->server->data['rcon-password'], false);

            $query->SetRconPassword($password);
        }

        return $query;
    }
}
