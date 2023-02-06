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
 * @property string|null $join_url
 * @property array $data
 * @property bool $home_display
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
        'name', 'address', 'port', 'token', 'join_url', 'type', 'data', 'home_display',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'data' => 'array',
        'home_display' => 'bool',
    ];

    public static function booted()
    {
        static::deleted(function (self $server) {
            if (((int) setting('servers.default')) === $server->id) {
                Setting::updateSettings(['servers.default' => null]);
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
     * Currently, this should only be use for servers using AzLink.
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

    public function getPlayersPercents()
    {
        $max = $this->getMaxPlayers();

        if ($max <= 0) {
            return 100;
        }

        return min(($this->getOnlinePlayers() / $max) * 100, 100);
    }

    public function joinUrl()
    {
        return $this->join_url;
    }

    public function updateData(array $data = null, bool $full = false)
    {
        Cache::put('servers.'.$this->id, $data, now()->addMinutes(5));

        if ($data === null || ! $full) {
            return;
        }

        if ($this->stats()->where('created_at', '>=', now()->subMinutes(10))->exists()) {
            return;
        }

        $statsData = Arr::except($data, ['players', 'max_players', 'cpu', 'ram']);

        if (is_numeric($tps = Arr::get($statsData, 'tps'))) {
            $statsData['tps'] = round($tps, 2);
        }

        $this->stats()->create(array_merge([
            'data' => array_filter($statsData),
        ], Arr::only($data, ['players', 'cpu', 'ram'])));
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
        $base = $this->type === 'mc-azlink'
            ? '/azlink setup '.url('/')
            : 'azlink:setup '.str_replace([':', '/'], ['!', '|'], url('/'));

        return $base.' '.$this->token;
    }

    public function playersRecord(bool $force = false)
    {
        if ($force) {
            return $this->stats()->max('players');
        }

        return Cache::remember('servers.record.'.$this->id, now()->addHour(), function () {
            return $this->playersRecord(true);
        });
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
        return $query->whereNotIn('type', ['mc-azlink', 'steam-azlink']);
    }
}
