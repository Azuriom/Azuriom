<?php

namespace Azuriom\Games\Steam\Servers;

use Azuriom\Games\ServerBridge;
use Exception;
use xPaw\SourceQuery\SourceQuery;

class Query extends ServerBridge
{
    public const DEFAULT_PORT = 27015;

    protected int $engine = SourceQuery::SOURCE;

    public function getServerData(): ?array
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
        } catch (Exception) {
            return null;
        }
    }

    public function verifyLink(): bool
    {
        return $this->connect()->GetInfo() !== null;
    }

    public function canExecuteCommand(): bool
    {
        return false;
    }

    public function getDefaultPort(): int
    {
        return self::DEFAULT_PORT;
    }

    protected function connect(bool $rcon = false): SourceQuery
    {
        $address = $this->server->address;
        $portKey = $rcon ? 'rcon-port' : 'query-port';
        $port = $this->server->data[$portKey] ?? ($this->server->port ?? self::DEFAULT_PORT);

        $query = new SourceQuery();

        $timeout = $rcon ? self::COMMANDS_TIMEOUT : self::TIMEOUT;

        $query->Connect($address, $port, $timeout, $this->engine);

        if ($rcon) {
            $password = decrypt($this->server->data['rcon-password'], false);

            $query->SetRconPassword($password);
        }

        return $query;
    }
}
