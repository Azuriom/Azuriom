<?php

namespace Azuriom\Games\Protocols;

use RuntimeException;
use Azuriom\Models\Server;
use xPaw\SourceQuery\SourceQuery;
use Azuriom\Games\ServerBridge;

class Query extends ServerBridge {

    private const DEFAULT_TIMEOUT = 1;

    private $query;

    public function __construct(Server $server)
    {
        parent::__construct($server);
        $this->query = new SourceQuery();
        $this->query->Connect($this->server->address, $this->server->data['query-port'], self::DEFAULT_TIMEOUT, SourceQuery::SOURCE );
    }
    
    public function getServerData()
    {
        $infos = $this->query->GetInfo();
        if($infos !== false){
            $infos['players'] = $infos['Players'];
            $infos['max'] = $infos['MaxPlayers'];
        }else $infos = null;
        
        return $infos;
    }

    public function verifyLink()
    {
        return true;
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