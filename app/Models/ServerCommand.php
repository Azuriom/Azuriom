<?php

namespace Azuriom\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $server_id
 * @property string $player_name
 * @property bool $need_online
 * @property string $command
 * @property \Azuriom\Models\Server $server
 */
class ServerCommand extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'player_name', 'need_online', 'command',
    ];

    /**
     * Get the server where this command should be dispatched.
     */
    public function server()
    {
        return $this->belongsTo(Server::class);
    }
}
