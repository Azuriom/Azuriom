<?php

namespace Azuriom\Models;

use Azuriom\Game\Server\MinecraftPingBridge;
use Azuriom\Game\Server\MinecraftRconBridge;
use Azuriom\Models\Traits\Loggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

/**
 * @property int $id
 * @property string $name
 * @property string $ip
 * @property int $port
 * @property string $type
 * @property array $data
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @property \Illuminate\Support\Collection|\Azuriom\Models\ServerStat[] $stats
 */
class Server extends Model
{
    use Loggable;

    /**
     * The servers types
     *
     * @var array
     */
    private const TYPES = [
        'mc-ping' => MinecraftPingBridge::class,
        'mc-rcon' => MinecraftRconBridge::class,
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'ip', 'port', 'token', 'type', 'data',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'data' => 'array',
    ];

    public function stat()
    {
        return $this->hasOne(ServerStat::class)->latest()->where('created_at', '>', now()->subSeconds(65));
    }

    public function stats()
    {
        return $this->hasMany(ServerStat::class);
    }

    public function fullAddress()
    {
        return $this->ip.($this->port ?? '');
    }

    public static function types()
    {
        return array_keys(self::TYPES);
    }

    public function getPlayers()
    {
        return Cache::remember('servers.'.$this->id, now()->addMinute(), function () {
            return $this->bridge()->getServerData($this);
        });
    }

    public function getOnlinePlayers()
    {
        return $this->getPlayers()['players'] ?? -1;
    }

    public function getMaxPlayers()
    {
        return $this->getPlayers()['max'] ?? -1;
    }

    public function updateData(array $data)
    {
        Cache::put('servers.'.$this->id, $data, now()->addMinute());

        if (! $this->stats()->where('created_at', '>=', now()->subMinutes(15))->exists()) {
            $this->stats()->create($data);
        }
    }

    public function bridge()
    {
        return app(self::TYPES[$this->type]);
    }
}
