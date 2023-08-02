<?php

namespace Azuriom\Games\Steam\Servers\Protocol;

use WebSocket\Client;

/**
 * A Rust RCON client implementation in PHP.
 *
 * Based on https://github.com/Facepunch/webrcon under MIT license.
 */
class RustRcon
{
    private Client $client;

    /**
     * Create a new Rcon client instance.
     */
    public function __construct(string $host, int $port, string $password)
    {
        $this->client = new Client("ws://{$host}:{$port}/{$password}");
    }

    /**
     * Send a command to the connected server.
     *
     * @throws \JsonException
     * @throws \WebSocket\BadOpcodeException
     */
    public function sendCommand(string $command): array
    {
        $data = [
            'Identifier' => -1,
            'Message' => $command,
            'name' => 'AzuriomRcon',
        ];

        $this->client->send(json_encode($data, JSON_THROW_ON_ERROR));

        return json_decode($this->client->receive(), true);
    }

    /**
     * Get the server information.
     *
     * @throws \WebSocket\BadOpcodeException
     */
    public function getServerInfo(): array
    {
        $response = $this->sendCommand('serverinfo');

        return json_decode($response['Message'], true);
    }

    /**
     * Disconnect from the server.
     */
    public function disconnect(): void
    {
        $this->client->close();
    }
}
