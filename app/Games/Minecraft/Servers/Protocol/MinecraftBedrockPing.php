<?php

namespace Azuriom\Games\Minecraft\Servers\Protocol;

use RuntimeException;

/**
 * PHP Minecraft Bedrock pinger.
 *
 * This class is based on https://github.com/xPaw/PHP-Minecraft-Query, under MIT license.
 *
 * @author xPaw
 */
class MinecraftBedrockPing
{
    protected $socket;

    protected $address;

    protected $port;

    public function __construct(string $address, int $port = 19132)
    {
        $this->address = $address;
        $this->port = $port;
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
        $this->socket = fsockopen('udp://'.$this->address, $this->port, $errno, $errstr, $timeout);

        if (! $this->socket) {
            $this->socket = null;

            throw new RuntimeException("Failed to connect or create a socket: {$errno} ({$errstr})");
        }

        stream_set_timeout($this->socket, $timeout);
    }

    /**
     * Ping the Minecraft server.
     *
     * @return array
     *
     * @throws \RuntimeException
     */
    public function ping()
    {
        if (! $this->isConnected()) {
            $this->connect();
        }

        // hardcoded magic https://github.com/facebookarchive/RakNet/blob/1a169895a900c9fc4841c556e16514182b75faf8/Source/RakPeer.cpp#L135
        $offlineMessageId = pack('c*', 0x00, 0xFF, 0xFF, 0x00, 0xFE, 0xFE, 0xFE, 0xFE, 0xFD, 0xFD, 0xFD, 0xFD, 0x12, 0x34, 0x56, 0x78);

        $command = pack('cQ', 0x01, time()); // DefaultMessageIDTypes::ID_UNCONNECTED_PING + 64bit current time
        $command .= $offlineMessageId;
        $command .= pack('Q', 2); // 64bit guid
        $length = strlen($command);

        if (fwrite($this->socket, $command, $length) !== $length) {
            throw new RuntimeException('Failed to write on socket.');
        }

        $data = fread($this->socket, 4096);

        if ($data === false) {
            throw new RuntimeException('Failed to read from socket.');
        }

        if ($data[0] !== "\x1C") { // DefaultMessageIDTypes::ID_UNCONNECTED_PONG
            throw new RuntimeException('First byte is not ID_UNCONNECTED_PONG.');
        }

        if (substr($data, 17, 16) !== $offlineMessageId) {
            throw new RuntimeException('Magic bytes do not match.');
        }

        $data = substr($data, 35);

        $data = explode(';', $data);

        return [
            'GameName' => $data[0],
            'HostName' => $data[1],
            'Protocol' => $data[2],
            'Version' => $data[3],
            'Players' => $data[4],
            'MaxPlayers' => $data[5],
        ];
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
}
