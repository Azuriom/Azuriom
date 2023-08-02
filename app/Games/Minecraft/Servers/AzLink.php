<?php

namespace Azuriom\Games\Minecraft\Servers;

use Azuriom\Games\ServerBridge;
use Azuriom\Models\User;
use Exception;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;

class AzLink extends ServerBridge
{
    private const DEFAULT_LINK_PORT = 25588;

    public function getServerData(): ?array
    {
        // Data are sent by the plugins every minute,
        // this method will not be call unless the
        // server is down.

        return null;
    }

    public function verifyLink(): bool
    {
        return true;
    }

    public function sendCommands(array $commands, User $user, bool $needConnected = false): void
    {
        foreach ($commands as $command) {
            $this->server->commands()->create([
                'command' => $command,
                'user_id' => $user->id,
                'need_online' => $needConnected,
            ]);
        }

        if (! ($this->server->data['azlink-ping'] ?? true)) {
            return;
        }

        try {
            $this->sendServerRequest();
        } catch (Exception) {
            // ignore, commands will be dispatched few minutes later
        }
    }

    public function canExecuteCommand(): bool
    {
        return true;
    }

    public function getDefaultPort(): int
    {
        return 25565;
    }

    public function sendServerRequest(): Response
    {
        $host = $this->resolveSrv($this->server->address);
        $port = $this->server->data['azlink-port'] ?? self::DEFAULT_LINK_PORT;
        $token = hash('sha256', $this->server->token);

        return Http::withToken($token, '')
            ->timeout(self::COMMANDS_TIMEOUT)
            ->post("http://{$host}:{$port}");
    }

    protected function resolveSrv(string $host): string
    {
        if (ip2long($host) !== false) {
            return $host;
        }

        $record = @dns_get_record('_minecraft._tcp.'.$host, DNS_SRV);

        return empty($record) ? $host : Arr::get($record, '0.target', $host);
    }
}
