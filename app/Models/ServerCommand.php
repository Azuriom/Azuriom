<?php

namespace Azuriom\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $server_id
 * @property int|null $user_id
 * @property bool $need_online
 * @property string $command
 * @property \Azuriom\Models\Server $server
 * @property \Azuriom\Models\User|null $user
 */
class ServerCommand extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'need_online', 'command',
    ];

    /**
     * Get the server where this command should be dispatched.
     */
    public function server()
    {
        return $this->belongsTo(Server::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
