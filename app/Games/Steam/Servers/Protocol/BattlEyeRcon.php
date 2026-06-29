<?php

namespace Azuriom\Games\Steam\Servers\Protocol;

use RuntimeException;

/**
 * A BattlEye RCON (BERcon) client implementation in PHP.
 *
 * Used by DayZ (and other BattlEye-protected games such as Arma) which,
 * unlike Source-based games, expose their console over BattlEye's own
 * UDP protocol instead of Source RCON.
 *
 * Based on the official protocol specification:
 * https://www.battleye.com/downloads/BERConProtocol.txt
 */
class BattlEyeRcon
{
    private const LOGIN = 0x00;

    private const COMMAND = 0x01;

    private const SERVER_MESSAGE = 0x02;

    /**
     * The UDP socket resource.
     *
     * @var resource|null
     */
    private $socket = null;

    private bool $loggedIn = false;

    /**
     * Create a new BattlEye RCON client instance.
     */
    public function __construct(
        private readonly string $host,
        private readonly int $port,
        private readonly string $password,
        private readonly float $timeout = 3.0,
    ) {
        //
    }

    /**
     * Open the socket and authenticate against the server.
     *
     * @throws \RuntimeException
     */
    public function connect(): void
    {
        $errno = 0;
        $error = '';

        $socket = @stream_socket_client(
            "udp://{$this->host}:{$this->port}", $errno, $error, $this->timeout
        );

        if ($socket === false) {
            throw new RuntimeException("Unable to connect to the BattlEye RCON server: {$error} ({$errno}).");
        }

        $this->socket = $socket;

        stream_set_timeout(
            $this->socket,
            (int) $this->timeout,
            (int) (fmod($this->timeout, 1) * 1_000_000)
        );

        $this->login();
    }

    /**
     * Send a command to the connected server and return its response.
     *
     * @throws \RuntimeException
     */
    public function command(string $command): string
    {
        if (! $this->loggedIn) {
            throw new RuntimeException('Not authenticated to the BattlEye RCON server.');
        }

        // A single command is sent at a time, so the sequence byte is always 0x00.
        $this->send(self::COMMAND, chr(0x00).$command);

        return $this->readCommandResponse();
    }

    /**
     * Disconnect from the server.
     */
    public function disconnect(): void
    {
        if (is_resource($this->socket)) {
            fclose($this->socket);
        }

        $this->socket = null;
        $this->loggedIn = false;
    }

    /**
     * Authenticate using the configured password.
     *
     * @throws \RuntimeException
     */
    private function login(): void
    {
        $this->send(self::LOGIN, $this->password);

        $response = $this->read();

        // The login response payload is a single byte: 0x01 success, 0x00 failure.
        if ($response === null || $response['payload'] === '' || ord($response['payload'][0]) !== 0x01) {
            throw new RuntimeException('BattlEye RCON authentication failed (wrong password or port).');
        }

        $this->loggedIn = true;
    }

    /**
     * Read a command response, reassembling multi-packet responses.
     */
    private function readCommandResponse(): string
    {
        $packets = [];
        $expected = 1;

        do {
            $response = $this->read();

            if ($response === null) {
                break;
            }

            // Acknowledge server messages so the connection stays healthy.
            if ($response['type'] === self::SERVER_MESSAGE) {
                $seq = $response['payload'] !== '' ? $response['payload'][0] : chr(0);
                $this->send(self::SERVER_MESSAGE, $seq);

                continue;
            }

            if ($response['type'] !== self::COMMAND) {
                continue;
            }

            // Strip the leading sequence byte.
            $payload = substr($response['payload'], 1);

            // Multi-packet header: 0x00, total packet count, current packet index.
            if (strlen($payload) >= 3 && $payload[0] === chr(0x00)) {
                $expected = ord($payload[1]);
                $packets[ord($payload[2])] = substr($payload, 3);
            } else {
                $packets[0] = $payload;
                $expected = 1;
            }
        } while (count($packets) < $expected);

        ksort($packets);

        return implode('', $packets);
    }

    /**
     * Write a BattlEye packet to the socket.
     *
     * @throws \RuntimeException
     */
    private function send(int $type, string $payload): void
    {
        // Each packet is checksummed over the 0xFF header, the type byte and the payload.
        $body = chr(0xFF).chr($type).$payload;
        $checksum = pack('V', crc32($body));

        if (@fwrite($this->socket, 'BE'.$checksum.$body) === false) {
            throw new RuntimeException('Unable to write to the BattlEye RCON socket.');
        }
    }

    /**
     * Read a single packet (one UDP datagram) from the socket.
     *
     * @return array{type: int, payload: string}|null
     */
    private function read(): ?array
    {
        $data = @fread($this->socket, 8192);

        // Header is 'BE' (2) + CRC32 (4) + 0xFF (1) + type (1) = 8 bytes.
        if ($data === false || strlen($data) < 8) {
            return null;
        }

        return [
            'type' => ord($data[7]),
            'payload' => substr($data, 8),
        ];
    }
}
