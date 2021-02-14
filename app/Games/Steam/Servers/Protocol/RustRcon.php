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
    /**
     * The websocket client.
     *
     * @var \WebSocket\Client
     */
    private $client;

    /**
     * Create a new Rcon instance.
     *
     * @param  string  $host
     * @param  int  $port
     * @param  string  $password
     */
    public function __construct(string $host, int $port, string $password)
    {
        $this->client = new Client("ws://{$host}:{$port}/{$password}");
    }

    /**
     * Send a command to the connected server.
     *
     * @param  string  $command
     * @return array
     *
     * @throws \WebSocket\BadOpcodeException
     */
    public function sendCommand(string $command)
    {
        $data = [
            'Identifier' => -1,
            'Message' => $command,
            'name' => 'AzuriomRcon',
        ];

        $this->client->send(json_encode($data));

        return json_decode($this->client->receive(), true);
    }

    /**
     * Get the server information.
     *
     * @return array
     *
     * @throws \WebSocket\BadOpcodeException
     */
    public function getServerInfo()
    {
        $response = $this->sendCommand('serverinfo');

        return json_decode($response['Message'], true);
    }

    /**
     * Disconnect from the server.
     *
     * @return void
     */
    public function disconnect()
    {
        $this->client->close();
    }
}
