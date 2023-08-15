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
        $this->client->send(json_encode([
            'Identifier' => -1,
            'Message' => $command,
            'name' => 'AzuriomRcon',
        ], JSON_THROW_ON_ERROR));

        $data = $this->client->receive();

        return json_decode($data, true, flags: JSON_THROW_ON_ERROR);
    }

    /**
     * Get the server information.
     *
     * @throws \WebSocket\BadOpcodeException
     */
    public function getServerInfo(): array
    {
        $data = $this->sendCommand('serverinfo');

        return json_decode($data['Message'], true, flags: JSON_THROW_ON_ERROR);
    }

    /**
     * Disconnect from the server.
     */
    public function disconnect(): void
    {
        $this->client->close();
    }
}
