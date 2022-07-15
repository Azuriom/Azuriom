<?php

namespace Azuriom\Games\Steam\Servers\Protocol;

use RuntimeException;

/**
 * A FiveM RCON client implementation in PHP.
 *
 * Based on https://github.com/vnoisy/Fivem-Webpanel/ under Apache-2.0 License.
 */
class FiveMRcon
{
    private $address;

    private $port;

    private $password;

    private $socket;

    public function __construct(string $address, int $port, string $password)
    {
        $this->address = $address;
        $this->port = $port;
        $this->password = $password;
    }

    public function connect(int $timeout = 5)
    {
        $this->socket = fsockopen("udp://{$this->address}", $this->port, $errno, $errstr, $timeout);

        if (! $this->socket) {
            $this->socket = null;

            throw new RuntimeException("Failed to connect or create a socket: {$errno} ({$errstr})");
        }

        stream_set_timeout($this->socket, $timeout, 0);
    }

    public function sendCommand(string $command)
    {
        return $this->send("rcon {$this->password} {$command}");
    }

    public function disconnect()
    {
        if ($this->socket) {
            fclose($this->socket);
        }
    }

    private function send(string $command)
    {
        fwrite($this->socket, "\xFF\xFF\xFF\xFF{$command}\x00");

        $str = '';

        do {
            $read = fread($this->socket, 9999);
            $str .= substr($read, strpos($read, "\n") + 1);

            $info = stream_get_meta_data($this->socket);
        } while (! $info['timed_out']);

        return $str;
    }
}
