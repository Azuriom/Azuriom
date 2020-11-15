<?php

namespace Azuriom\Games\Steam\Servers;

use Azuriom\Games\ServerBridge;
use Azuriom\Games\Steam\SteamID;
use Azuriom\Models\User;
use Exception;
use xPaw\SourceQuery\SourceQuery;

class Query extends ServerBridge
{
    protected const DEFAULT_PORT = 27015;

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

        $timeout = $rcon ? self::COMMANDS_TIMEOUT : self::TIMEOUT;

        $query->Connect($address, $port, $timeout, $this->engine);

        if ($rcon) {
            $password = decrypt($this->server->data['rcon-password'], false);

            $query->SetRconPassword($password);
        }

        return $query;
    }

    public function replacePlaceholders(string $command, User $user = null)
    {
        if ($user === null) {
            return parent::replacePlaceholders($command, $user);
        }

        return parent::replacePlaceholders($command, $user)
            ->replace('{steam_id}', $user->game_id)
            ->replace('{steam_id_32}', SteamID::convertTo32($user->game_id));
    }
}
