<?php

namespace Azuriom\Games\Protocols;

use Azuriom\Games\ServerBridge;
use Azuriom\Models\Server;
use RuntimeException;
use xPaw\SourceQuery\SourceQuery;

class Query extends ServerBridge
{
    private const DEFAULT_TIMEOUT = 1;

    private $query;

    public function __construct(Server $server)
    {
        parent::__construct($server);
        try {
            $this->query = new SourceQuery();
            $this->query->Connect($this->server->address, $this->server->data['query-port'], self::DEFAULT_TIMEOUT, SourceQuery::SOURCE);
        } catch (\Throwable $th) {
            //The server is offline
        }
    }

    public function getServerData()
    {
        if ($this->query === null) {
            $infos['players'] = -1;
            $infos['max'] = -1;
        } else {
            $infos = $this->query->GetInfo();

            $infos['players'] = $infos['Players'] ?? -1;
            $infos['max'] = $infos['MaxPlayers'] ?? -1;
        }

        return $infos;
    }

    public function verifyLink()
    {
        return $this->query->Ping();
    }

    public function executeCommands(array $commands, ?string $playerName, bool $needConnected = false)
    {
        report(new RuntimeException('Command cannot be executed with ping link.'));
    }

    public function canExecuteCommand()
    {
        return false;
    }
}
