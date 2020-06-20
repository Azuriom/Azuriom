<?php

namespace Azuriom\Games\Minecraft\Servers;

use Azuriom\Games\ServerBridge;
use Exception;
use Illuminate\Support\Facades\Http;

class AzLink extends ServerBridge
{
    private const DEFAULT_LINK_PORT = 25588;

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
                'need_online' => $needConnected,
            ]);
        }

        try {
            $this->sendServerRequest();
        } catch (Exception $e) {
            // ignore, commands will be dispatched few minutes later
        }
    }

    public function canExecuteCommand()
    {
        return true;
    }

    public function getDefaultPort()
    {
        return 25565;
    }

    public function sendServerRequest()
    {
        $port = $this->server->data['azlink-port'] ?? self::DEFAULT_LINK_PORT;
        $token = hash('sha256', $this->server->token);

        return Http::withToken($token, '')->post("http://{$this->server->address}:{$port}");
    }
}
