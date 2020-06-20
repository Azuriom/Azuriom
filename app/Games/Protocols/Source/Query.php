<?php

namespace Azuriom\Games\Protocols\Source;

use Azuriom\Games\ServerBridge;
use Exception;
use RuntimeException;
use xPaw\SourceQuery\SourceQuery;

class Query extends ServerBridge
{
    protected const DEFAULT_PORT = 27015;

    protected const TIMEOUT = 1;

    public function getServerData()
    {
        try {
            $info = $this->connect()->GetInfo();

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

    public function executeCommands(array $commands, ?string $playerName, bool $needConnected = false)
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

        $query->Connect($address, $port, self::TIMEOUT, SourceQuery::SOURCE);

        if ($rcon) {
            $password = decrypt($this->server->data['rcon-password'], false);

            $query->SetRconPassword($password);
        }

        return $query;
    }
}
