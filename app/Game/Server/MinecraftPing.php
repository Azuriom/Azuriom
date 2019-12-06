<?php

namespace Azuriom\Game\Server;

use Exception;
use MinecraftPinger\MinecraftPingException;

/**
 * PHP Minecraft Pinger
 *
 * This class is based on https://github.com/xPaw/PHP-Minecraft-Query, under MIT license.
 * Adapted to Azuriom to follow PSR 12 and prevent exceptions thrown in the constructor.
 *
 * @author xPaw
 */
class MinecraftPing
{
    private $socket;

    private $address;
    private $port;

    public function __construct(string $address, int $port = 25565, $resolveSrv = true)
    {
        $this->address = $address;
        $this->port = $port;

        if ($resolveSrv) {
            $this->resolveSRV();
        }
    }

    /**
     * Ping the Minecraft server.
     *
     * @param  int  $timeout
     * @return mixed
     * @throws Exception
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
            throw new Exception('Invalid length');
        }

        fgetc($this->socket); // packet type

        $length = $this->readVarInt(); // string length

        $data = '';

        while (strlen($data) < $length) {
            if (microtime(true) - $startTime > $timeout) {
                throw new Exception('Server read timed out');
            }

            $remainder = $length - strlen($data);
            $block = fread($this->socket, $remainder); // and finally the json string
            // abort if there is no progress
            if (! $block) {
                throw new Exception('Server returned too few data');
            }

            $data .= $block;
        }

        if (empty($data)) {
            throw new Exception('Server didn\'t return any data');
        }

        $response = json_decode($data);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new Exception(json_last_error_msg());
        }

        return $response;
    }

    private function readVarInt()
    {
        $i = 0;
        $j = 0;

        while (true) {
            $k = @fgetc($this->socket);

            if ($k === false) {
                return 0;
            }

            $k = ord($k);

            $i |= ($k & 0x7F) << $j++ * 7;

            if ($j > 5) {
                throw new MinecraftPingException('VarInt too big');
            }

            if (($k & 0x80) != 128) {
                break;
            }
        }

        return $i;
    }

    /**
     * Connect to the server.
     *
     * @param  int  $timeout
     * @throws Exception
     */
    public function connect(int $timeout = 3)
    {
        $connectTimeout = $timeout;
        $this->socket = @fsockopen($this->address, $this->port, $errno, $errstr, $connectTimeout);

        if (! $this->socket) {
            $this->socket = null;

            throw new Exception("Failed to connect or create a socket: $errno ($errstr)");
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

    protected function resolveSRV()
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