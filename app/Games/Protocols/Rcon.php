<?php

namespace Azuriom\Games\Protocols;

use Azuriom\Games\ServerBridge;
use Azuriom\Models\Server;
use xPaw\SourceQuery\SourceQuery;

class Rcon extends ServerBridge
{
    private const DEFAULT_PORT = 25575;
    private const DEFAULT_TIMEOUT = 1;

    private $query;

    public function __construct(Server $server)
    {
        parent::__construct($server);

        try {
            $this->query = new SourceQuery();
            $this->query->Connect($this->server->address, $this->server->data['rcon-port'] ?? self::DEFAULT_PORT, self::DEFAULT_TIMEOUT, SourceQuery::SOURCE);
            $password = decrypt($this->server->data['rcon-password'], false);

            $this->query->SetRconPassword($password);
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
        if (! $this->verifyLink()) {
            throw new Exception('Unable to connect to rcon.');
        }

        foreach ($commands as $command) {
            $this->query->Rcon(str_replace('{player}', $playerName ?? '?', $command));
        }
    }

    public function canExecuteCommand()
    {
        return true;
    }
}
