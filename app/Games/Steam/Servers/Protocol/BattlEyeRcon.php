<?php

namespace Azuriom\Games\Steam\Servers\Protocol;

use LogicException;
use RuntimeException;
use Throwable;
use UnexpectedValueException;

/**
 * A BattlEye RCON (BERcon) client implementation in PHP.
 *
 * Used BattlEye-protected games (such as DayZ and Arma) which,
 * unlike Source-based games, expose their console over BattlEye's own
 * UDP protocol instead of Source RCON.
 *
 * @see https://www.battleye.com/downloads/BERConProtocol.txt
 */
class BattlEyeRcon
{
    private const LOGIN = 0x00;

    private const COMMAND = 0x01;

    private const SERVER_MESSAGE = 0x02;

    private const LOGIN_ATTEMPTS = 3;

    /**
     * The UDP socket resource.
     *
     * @var resource|null
     */
    private $socket = null;

    private int $sequence = 0;

    /**
     * Create a new BattlEye RCON client instance.
     */
    public function __construct(
        private readonly string $host,
        private readonly int $port,
        private readonly string $password,
        private readonly float $timeout = 3,
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
        $this->disconnect();

        $errno = 0;
        $error = '';

        $socket = @stream_socket_client(
            $this->endpoint(), $errno, $error, $this->timeout
        );

        if ($socket === false) {
            throw new RuntimeException("Unable to connect to the BattlEye RCON server: {$error} ({$errno}).");
        }

        $timeoutSec = (int) $this->timeout;
        $timeoutMicro = (int) (fmod($this->timeout, 1) * 1_000_000);

        if (! stream_set_blocking($socket, true) || ! stream_set_timeout($socket, $timeoutSec, $timeoutMicro)) {
            fclose($socket);

            throw new RuntimeException('Unable to configure the BattlEye RCON socket.');
        }

        $this->socket = $socket;
        $this->sequence = 0;

        try {
            $this->login();
        } catch (Throwable $t) {
            $this->disconnect();

            throw $t;
        }
    }

    /**
     * Send a command to the connected server and return its response.
     *
     * @throws \RuntimeException
     */
    public function command(string $command): string
    {
        if (! is_resource($this->socket)) {
            throw new RuntimeException('Not authenticated to the BattlEye RCON server.');
        }

        try {
            return $this->exchange($command);
        } catch (Throwable $t) {
            // A timed-out UDP command may have executed even when its response
            // was lost. Close the socket so a delayed packet cannot poison a
            // later command, but never retry a potentially mutating command.
            $this->disconnect();

            throw $t;
        }
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
        $this->sequence = 0;
    }

    private function exchange(string $command): string
    {
        $sequence = $this->sequence;
        $this->sequence = ($this->sequence + 1) & 0xFF;

        $this->send(self::COMMAND, chr($sequence).$command);

        return $this->readCommandResponse($sequence);
    }

    /**
     * Authenticate using the configured password.
     *
     * @throws \RuntimeException
     */
    private function login(): void
    {
        for ($attempt = 1; $attempt <= self::LOGIN_ATTEMPTS; $attempt++) {
            $this->send(self::LOGIN, $this->password);
            while (($response = $this->read()) !== null) {
                if ($response['type'] === self::SERVER_MESSAGE) {
                    // Acknowledge server messages so the connection stays healthy.
                    $this->acknowledgeServerMessage($response['payload']);

                    continue;
                }

                if ($response['type'] === self::COMMAND) {
                    // A delayed command response from an earlier session cannot
                    // authenticate this connection and is safe to discard.
                    continue;
                }

                if ($response['type'] !== self::LOGIN) {
                    throw new UnexpectedValueException(sprintf(
                        'Unknown BattlEye packet type 0x%02X during authentication.',
                        $response['type'],
                    ));
                }

                // The login response payload is a single byte: 0x01 success, 0x00 failure.
                if (strlen($response['payload']) !== 1) {
                    throw new UnexpectedValueException('Malformed BattlEye RCON login response.');
                }

                if (ord($response['payload'][0]) === 0x01) {
                    return;
                }

                throw new RuntimeException('BattlEye RCON authentication failed (wrong password or port).');
            }
        }

        throw new RuntimeException('BattlEye RCON authentication timed out after '.self::LOGIN_ATTEMPTS.' attempts.');
    }

    /**
     * Read a command response, reassembling multi-packet responses.
     */
    private function readCommandResponse(int $sequence): string
    {
        $fragmentCount = null;
        $fragments = [];

        while (($response = $this->read()) !== null) {
            if ($response['type'] === self::SERVER_MESSAGE) {
                $this->acknowledgeServerMessage($response['payload']);
                continue;
            }

            if ($response['type'] === self::LOGIN) {
                $this->handleLateLoginResponse($response['payload']);
                continue;
            }

            if ($response['type'] !== self::COMMAND) {
                throw new UnexpectedValueException(sprintf(
                    'Unknown BattlEye packet type 0x%02X.',
                    $response['type'],
                ));
            }

            if ($response['payload'] === '') {
                throw new UnexpectedValueException('Malformed BattlEye RCON command response.');
            }

            if (ord($response['payload'][0]) !== $sequence) {
                continue;
            }

            $result = $this->accumulateFragment(substr($response['payload'], 1), $fragmentCount, $fragments);

            if ($result !== null) {
                return $result;
            }
        }

        if ($fragmentCount !== null) {
            throw new RuntimeException(sprintf(
                'Timed out after receiving %d of %d BattlEye RCON response fragments.',
                count($fragments),
                $fragmentCount,
            ));
        }

        throw new RuntimeException('Timed out waiting for a BattlEye RCON command response.');
    }

    /**
     * Process one command payload, accumulating multi-packet fragments.
     * Returns the complete response when all fragments are received, or null to keep reading.
     */
    private function accumulateFragment(string $payload, ?int &$fragmentCount, array &$fragments): ?string
    {
        if ($payload === '' || $payload[0] !== chr(0x00)) {
            return $payload;
        }

        if (strlen($payload) < 3) {
            throw new UnexpectedValueException('Malformed BattlEye RCON fragment header.');
        }

        $packetCount = ord($payload[1]);
        $packetIndex = ord($payload[2]);

        if ($packetCount === 0 || $packetIndex >= $packetCount) {
            throw new UnexpectedValueException('Invalid BattlEye RCON fragment count or index.');
        }

        if ($fragmentCount !== null && $fragmentCount !== $packetCount) {
            throw new UnexpectedValueException('BattlEye RCON fragment count changed during the response.');
        }

        $fragmentCount = $packetCount;
        $fragment = substr($payload, 3);

        if (isset($fragments[$packetIndex]) && $fragments[$packetIndex] !== $fragment) {
            throw new UnexpectedValueException('BattlEye RCON sent conflicting duplicate fragments.');
        }

        $fragments[$packetIndex] = $fragment;

        if (count($fragments) === $fragmentCount) {
            ksort($fragments, SORT_NUMERIC);

            return implode('', $fragments);
        }

        return null;
    }

    private function handleLateLoginResponse(string $payload): void
    {
        if (strlen($payload) !== 1) {
            throw new UnexpectedValueException('Malformed BattlEye RCON login response.');
        }

        $status = ord($payload[0]);

        if ($status === 0x00) {
            throw new RuntimeException('BattlEye RCON login is no longer valid.');
        }

        if ($status !== 0x01) {
            throw new UnexpectedValueException('Malformed BattlEye RCON login response.');
        }
    }

    private function acknowledgeServerMessage(string $payload): void
    {
        if ($payload === '') {
            throw new UnexpectedValueException('Malformed BattlEye RCON server-message packet.');
        }

        $this->send(self::SERVER_MESSAGE, $payload[0]);
    }

    /**
     * Write a BattlEye packet to the socket.
     *
     * @throws \RuntimeException
     */
    private function send(int $type, string $payload): void
    {
        if (! is_resource($this->socket)) {
            throw new LogicException('BattlEye RCON is not connected.');
        }

        // Each packet is checksummed over the 0xFF header, the type byte and the payload.
        $body = chr(0xFF).chr($type).$payload;
        $datagram = 'BE'.strrev(hash('crc32b', $body, true)).$body;
        $written = @fwrite($this->socket, $datagram);

        if ($written === false || $written !== strlen($datagram)) {
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
        if (! is_resource($this->socket)) {
            throw new LogicException('BattlEye RCON is not connected.');
        }

        $data = @fread($this->socket, 65_535);

        if ($data === false || $data === '') {
            $metadata = stream_get_meta_data($this->socket);

            if (($metadata['timed_out'] ?? false) === true) {
                return null;
            }

            if ($data === false) {
                throw new RuntimeException('Unable to read from the BattlEye RCON socket.');
            }

            throw new RuntimeException('BattlEye RCON socket returned an empty datagram.');
        }

        // Header is 'BE' (2) + CRC32 (4) + 0xFF (1) + type (1) = 8 bytes.
        if (strlen($data) < 8) {
            throw new UnexpectedValueException('BattlEye RCON datagram is too short.');
        }

        if (! str_starts_with($data, 'BE') || $data[6] !== chr(0xFF)) {
            throw new UnexpectedValueException('Invalid BattlEye RCON packet header.');
        }

        $body = substr($data, 6);
        $checksum = strrev(hash('crc32b', $body, true));

        if (! hash_equals($checksum, substr($data, 2, 4))) {
            throw new UnexpectedValueException('BattlEye RCON packet CRC mismatch.');
        }

        return [
            'type' => ord($body[1]),
            'payload' => substr($body, 2),
        ];
    }

    private function endpoint(): string
    {
        $host = $this->host;

        if (str_contains($host, ':') && ! str_starts_with($host, '[')) {
            $host = "[{$host}]";
        }

        return "udp://{$host}:{$this->port}";
    }
}
