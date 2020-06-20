<?php

namespace Azuriom\Games\ProtocolAdapters;
/* q3query.class.php - Quake 3 query class
 *
 * Copyright (C) 2009 Manuel Kress
 * Author(s): Manuel Kress (manuel.strider@web.de)
 *
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License as published by the Free Software
 * Foundation; either version 3 of the License, or (at your option) any later
 * version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE. See the GNU General Public License for more
 * details.
 *
 * You should have received a copy of the GNU General Public License along with
 * this program; if not, see <http://www.gnu.org/licenses/>.
 *
 */
class Quake3Protocol {
	private $address;
	private $port;
    private $rconpassword = false;
    private $fp;
    private $lastPing = false;
    public function __construct($address, $port, &$success = NULL, &$errno = NULL, &$errstr = NULL) {
    	$this->address = $address;
    	$this->port = $port;
        $this->fp = fsockopen("udp://$address", $port, $errno, $errstr, 5);
        if (!$this->fp) {
        	$success = false;
        }
        else {
        	$success = true;
        }
    }
    public function setRconassword($pw) {
        $this->rconpassword = $pw;
    }
    public function rcon($str) {
    	if (!$this->rconpassword) {
    		return false;
    	}
    	$this->send("rcon " . $this->rconpassword . " $str");
		return $this->getResponse();
    }
    private function send($str) {
        fwrite($this->fp, "\xFF\xFF\xFF\xFF$str\x00");
    }
    private function getResponse() {
    	stream_set_timeout($this->fp, 0, 7e5);
        $s = '';
	    $start = microtime(true);
        do {
        	$read = fread($this->fp, 9999);
			$s .= substr($read, strpos($read, "\n") + 1);
    		if (!isset($end)) {
    			$end = microtime(true);
    		}
			$info = stream_get_meta_data($this->fp);
		}
		while (!$info["timed_out"]);
		$this->lastPing = round(($end - $start) * 1000);

        return $s;
    }
    public function quit() {
    	if (is_resource($this->fp)) {
			fclose($this->fp);
			return true;
    	}
    	return false;
    }
    public function reconnect() {
    	$this->quit();
    	$this->__construct($this->address, $this->port);
    }
    public function getGameStatus() {
        $this->send("getstatus");
        $response = $this->getResponse();
        list($dvarslist, $playerlist) = explode("\n", $response, 2);
		$dvarslist = explode("\\", $dvarslist);
		$dvars = array();
		for ($i = 1; $i < count($dvarslist); $i += 2) {
			$dvars[$dvarslist[$i]] = $dvarslist[$i + 1];
		}
		$playerlist = explode("\n", $playerlist);
		array_pop($playerlist);
		$players = array();
		foreach ($playerlist as $value) {
			list($score, $ping, $name) = explode(" ", $value, 3);
			$players[] = array(
				"name" =>substr($name, 1, -1),
				"score" => $score,
				"ping" => $ping
			);
		}
		return array($dvars, $players);
    }
    public function getGameInfo() {
        $this->send("getinfo");
        $response = $this->getResponse();
        $dvarslist = explode("\\", $response);
		$dvars = array();
		for ($i = 1; $i < count($dvarslist); $i += 2) {
			$dvars[$dvarslist[$i]] = $dvarslist[$i + 1];
		}
		return $dvars;
    }
    public function getLastPing() {
        return $this->lastPing;
    }
}
?>
