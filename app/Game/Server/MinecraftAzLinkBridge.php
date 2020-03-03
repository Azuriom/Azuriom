<?php

namespace Azuriom\Game\Server;

use Exception;
use GuzzleHttp\Client;

class MinecraftAzLinkBridge extends ServerBridge
{
    use MinecraftPinger;

    private const DEFAULT_PORT = 25588;

    public function getServerData()
    {
        // Data are sent by the plugins every minute,
        // this method will not be call unless the
        // server is down.

        return null;
    }

    public function verifyLink()
    {
        return true;
    }

    public function executeCommands(array $commands, ?string $playerName, bool $needConnected = false)
    {
        foreach ($commands as $command) {
            $this->server->commands()->create([
                'command' => $command,
                'player_name' => $playerName ?? '?',
            ]);
        }

        try {
            $this->sendServerRequest();
        } catch (Exception $t) {
            // ignore, commands will be dispatched few minutes later
        }
    }

    public function canExecuteCommand()
    {
        return true;
    }

    public function sendServerRequest()
    {
        $client = new Client(['timeout' => 5]);

        $port = $this->server->data['azlink-port'] ?? self::DEFAULT_PORT;
        $client->post("http://{$this->server->address}:{$port}", [
            'headers' => [
                'Authorization' => hash('sha256', $this->server->token),
                'Content-Type' => 'application/json',
            ],
        ]);
    }
}
