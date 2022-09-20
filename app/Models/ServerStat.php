<?php

namespace Azuriom\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $server_id
 * @property int $players
 * @property int|null $ram
 * @property float|null $cpu
 * @property array|null $data
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
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
        'players', 'ram', 'cpu', 'data',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'players' => 'int',
        'ram' => 'int',
        'cpu' => 'float',
        'data' => 'array',
    ];

    public function server()
    {
        return $this->belongsTo(Server::class);
    }

    protected function ram(): Attribute
    {
        return Attribute::make(set: fn ($val) => is_numeric($val) ? (int) $val : null);
    }

    protected function cpu(): Attribute
    {
        return Attribute::make(set: fn ($val) => $val >= 0 ? $val : null);
    }
}
