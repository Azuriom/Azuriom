<?php

namespace Azuriom\Models;

use Azuriom\Games\FallbackServerBridge;
use Azuriom\Models\Traits\Loggable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;

/**
 * @property int $id
 * @property string $name
 * @property string $address
 * @property int|null $port
 * @property string $type
 * @property string|null $token
 * @property array $data
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Azuriom\Models\ServerStat $stat
 * @property \Illuminate\Support\Collection|\Azuriom\Models\ServerStat[] $stats
 * @property \Illuminate\Support\Collection|\Azuriom\Models\ServerCommand[] $commands
 *
 * @method static \Illuminate\Database\Eloquent\Builder executable()
 * @method static \Illuminate\Database\Eloquent\Builder pingable()
 */
class Server extends Model
{
    use Loggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'address', 'port', 'token', 'type', 'data',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'data' => 'array',
    ];

    public static function booted()
    {
        static::deleted(function (self $server) {
            if (((int) setting('default-server')) === $server->id) {
                Setting::updateSettings(['default-server' => null]);
            }
        });
    }

    public function stat()
    {
        return $this->hasOne(ServerStat::class)
            ->latest()
            ->where('created_at', '>', now()->subSeconds(65));
    }

    public function stats()
    {
        return $this->hasMany(ServerStat::class);
    }

    /**
     * Get the commands waiting to be dispatch on this server.
     *
     * Currently this should only be use for servers using AzLink.
     */
    public function commands()
    {
        return $this->hasMany(ServerCommand::class);
    }

    public function fullAddress()
    {
        if ($this->port === null || $this->port === $this->bridge()->getDefaultPort()) {
            return $this->address;
        }

        return $this->address.':'.$this->port;
    }

    public function isOnline()
    {
        return $this->getData() !== null;
    }

    public function getOnlinePlayers()
    {
        return $this->getData('players');
    }

    public function getMaxPlayers()
    {
        return $this->getData('max_players');
    }

    public function updateData(array $data = null, bool $full = false)
    {
        Cache::put('servers.'.$this->id, $data, now()->addMinutes(5));

        if ($data !== null && $full && ! $this->stats()->where('created_at', '>=', now()->subMinutes(10))->exists()) {
            $stats = Arr::except($data, 'max_players');
            $statsData = ['data' => array_filter(Arr::except($stats, ['players', 'cpu', 'ram']))];

            $this->stats()->create(array_merge(Arr::only($stats, ['players', 'cpu', 'ram']), $statsData));
        }
    }

    public function getData(string $key = null)
    {
        $data = Cache::remember('servers.'.$this->id, now()->addMinute(), function () {
            return $this->bridge()->getServerData();
        });

        return $key === null ? $data : ($data[$key] ?? null);
    }

    /**
     * @return \Azuriom\Games\ServerBridge
     */
    public function bridge()
    {
        $games = game()->getSupportedServers();

        if (! array_key_exists($this->type, $games)) {
            return new FallbackServerBridge($this);
        }

        return app($games[$this->type], ['server' => $this]);
    }

    public function getLinkCommand()
    {
        return '/azlink setup '.url('/').' '.$this->token;
    }

    public static function types()
    {
        return array_keys(game()->getSupportedServers());
    }

    /**
     * Scope a query to only include servers which can execute commands.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeExecutable(Builder $query)
    {
        $servers = collect(game()->getSupportedServers())->filter(function (string $bridge) {
            return (new $bridge($this))->canExecuteCommand();
        });

        return $query->whereIn('type', $servers->keys());
    }

    /**
     * Scope a query to only include servers which can be pinged.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePingable(Builder $query)
    {
        return $query->where('type', '<>', 'mc-azlink');
    }
}
