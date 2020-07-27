<?php

namespace Azuriom\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $server_id
 * @property int $players
 * @property int|null $ram
 * @property float|null $cpu
 * @property float|null $tps
 * @property int|null $loaded_chunks
 * @property int|null $entities
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @property \Azuriom\Models\Server $server
 */
class ServerStat extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'players', 'ram', 'cpu', 'tps', 'loaded_chunks', 'entities',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'tps' => 'float',
        'cpu' => 'float',
    ];

    public function server()
    {
        return $this->belongsTo(Server::class);
    }
}
