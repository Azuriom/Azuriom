<?php

namespace Azuriom\Games\Minecraft\Servers\Protocol;

use RuntimeException;

/**
 * PHP Minecraft Pinger.
 *
 * This class is based on https://github.com/xPaw/PHP-Minecraft-Query, under MIT license.
 * Adapted to Azuriom to follow PSR 1 and prevent RuntimeExceptions thrown in the constructor.
 *
 * @author xPaw
 */
class MinecraftPing
{
    private $socket;

    private $address;

    private $port;

    public function __construct(string $address, int $port = 25565, bool $resolveSrv = true)
    {
        $this->address = $address;
        $this->port = $port;

        if ($resolveSrv) {
            $this->resolveSrv();
        }
    }

    /**
     * Ping the Minecraft server.
     *
     * @param  int  $timeout
     * @return array
     *
     * @throws \RuntimeException
     */
    public function ping(int $timeout = 3)
    {
        if (! $this->isConnected()) {
            $this->connect();
        }

        $startTime = microtime(true); // for read timeout purposes

        // See http://wiki.vg/Protocol (Status Ping)
        $data = "\x00"; // packet ID = 0 (varint)
        $data .= "\x04"; // Protocol version (varint)
        $data .= pack('c', strlen($this->address)).$this->address; // Server (varint len + UTF-8 addr)
        $data .= pack('n', $this->port); // Server port (unsigned short)
        $data .= "\x01"; // Next state: status (varint)

        $data = pack('c', strlen($data)).$data; // prepend length of packet ID + data

        fwrite($this->socket, $data); // handshake
        fwrite($this->socket, "\x01\x00"); // status ping

        $length = $this->readVarInt(); // packet length

        if ($length < 10) {
            throw new RuntimeException('Invalid length: '.$length);
        }

        $this->readVarInt(); // packet type

        $length = $this->readVarInt(); // string length

        $data = '';

        while (strlen($data) < $length) {
            if (microtime(true) - $startTime > $timeout) {
                throw new RuntimeException('Server read timed out');
            }

            $remainder = $length - strlen($data);
            $block = fread($this->socket, $remainder); // and finally the json string
            // abort if there is no progress
            if (! $block) {
                throw new RuntimeException('Server returned too few data');
            }

            $data .= $block;
        }

        if (empty($data)) {
            throw new RuntimeException('Server didn\'t return any data');
        }

        $response = json_decode($data, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new RuntimeException('Invalid JSON response: '.json_last_error_msg());
        }

        return $response;
    }

    /**
     * Connect to the server.
     *
     * @param  int  $timeout
     *
     * @throws \RuntimeException
     */
    public function connect(int $timeout = 3)
    {
        $connectTimeout = $timeout;
        $this->socket = fsockopen($this->address, $this->port, $errno, $errstr, $connectTimeout);

        if (! $this->socket) {
            $this->socket = null;

            throw new RuntimeException("Failed to connect or create a socket: {$errno} ({$errstr})");
        }

        stream_set_timeout($this->socket, $timeout);
    }

    public function isConnected()
    {
        return $this->socket !== null;
    }

    public function close()
    {
        if ($this->isConnected()) {
            fclose($this->socket);

            $this->socket = null;
        }
    }

    public function __destruct()
    {
        $this->close();
    }

    /**
     * Read a var int.
     *
     * @return int
     *
     * @throws \RuntimeException
     */
    protected function readVarInt()
    {
        $result = 0;
        $numRead = 0;

        do {
            $read = fread($this->socket, 1);

            if ($read === false) {
                return 0;
            }

            $read = ord($read);

            $value = $read & 0x7F;
            $result |= $value << 7 * $numRead;

            if (++$numRead > 5) {
                throw new RuntimeException('VarInt too big: '.$numRead);
            }
        } while (($read & 0x80) !== 0);

        return $result;
    }

    protected function resolveSrv()
    {
        if (ip2long($this->address) !== false) {
            return;
        }

        $record = @dns_get_record('_minecraft._tcp.'.$this->address, DNS_SRV);

        if (empty($record)) {
            return;
        }

        $this->address = $record[0]['target'] ?? $this->address;
        $this->port = $record[0]['port'] ?? $this->port;
    }
}
