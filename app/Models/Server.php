<?php

namespace Azuriom\Models;

use Azuriom\Game\Server\MinecraftAzLinkBridge;
use Azuriom\Game\Server\MinecraftPingBridge;
use Azuriom\Game\Server\MinecraftRconBridge;
use Azuriom\Models\Traits\Loggable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

/**
 * @property int $id
 * @property string $name
 * @property string $ip
 * @property int $port
 * @property string $type
 * @property string $token
 * @property array $data
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @property \Illuminate\Support\Collection|\Azuriom\Models\ServerStat[] $stats
 *
 * @method static \Illuminate\Database\Eloquent\Builder executable()
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
        'mc-azlink' => MinecraftAzLinkBridge::class,
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
        return $this->ip.($this->port ? ':'.$this->port : '');
    }

    public static function types()
    {
        return array_keys(self::TYPES);
    }

    public function getPlayers()
    {
        return Cache::remember('servers.'.$this->id, now()->addMinute(), function () {
            return $this->bridge()->getServerData();
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

    public function updateData(array $data, int $time = 15)
    {
        Cache::put('servers.'.$this->id, $data, now()->addMinute());

        if ($time > 0 && ! $this->stats()->where('created_at', '>=', now()->subMinutes($time))->exists()) {
            $this->stats()->create($data);
        }
    }

    public function bridge()
    {
        return app(self::TYPES[$this->type], ['server' => $this]);
    }

    public function getLinkCommand()
    {
        return '/azlink setup '.url('/').' '.$this->token;
    }

    /**
     * Scope a query to only include enabled pages.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeExecutable(Builder $query)
    {
        return $query->whereIn('type', ['mc-rcon', 'mc-link']);
    }
}
