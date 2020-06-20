<?php

namespace Azuriom\Models;

use Azuriom\Games\Minecraft\Servers\AzLink as MinecraftAzLink;
use Azuriom\Games\Minecraft\Servers\Ping as MinecraftPing;
use Azuriom\Games\Minecraft\Servers\Rcon as MinecraftRcon;
use Azuriom\Games\Protocols\Source\Query as SourceQuery;
use Azuriom\Games\Protocols\Source\Rcon as SourceRcon;
use Azuriom\Games\Protocols\Quake3\Rcon as Quake3Rcon;
use Azuriom\Games\Protocols\Quake3\FiveM as FiveMRcon;
use Azuriom\Models\Traits\Loggable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
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
 *
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
     * The servers link types.
     *
     * @var array
     */
    private const TYPES = [
        'mc-ping' => MinecraftPing::class,
        'mc-rcon' => MinecraftRcon::class,
        'mc-azlink' => MinecraftAzLink::class,
        'source-query' => SourceQuery::class,
        'source-rcon' => SourceRcon::class,
        'quake3-rcon' => Quake3Rcon::class,
        'fivem-rcon' => FiveMRcon::class,
    ];

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

    public function stat()
    {
        return $this->hasOne(ServerStat::class)->latest()->where('created_at', '>', now()->subSeconds(65));
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
        if ($this->port === $this->bridge()->getDefaultPort()) {
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

    public function updateData($data, bool $full = false)
    {
        Cache::put('servers.'.$this->id, $data, now()->addMinutes(5));

        if (is_array($data) && $full && ! $this->stats()->where('created_at', '>=', now()->subMinutes(10))->exists()) {
            $this->stats()->create($data);
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
        return app(self::TYPES[$this->type], ['server' => $this]);
    }

    public function getLinkCommand()
    {
        return '/azlink setup '.url('/').' '.$this->token;
    }

    public static function types()
    {
        return array_keys(self::TYPES);
    }

    /**
     * Scope a query to only include servers which can execute commands.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeExecutable(Builder $query)
    {
        return $query->whereIn('type', ['mc-rcon', 'mc-azlink', 'source-rcon','quake3-rcon','fivem-rcon']);
    }

    /**
     * Scope a query to only include servers which can be pinged.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePingable(Builder $query)
    {
        return $query->where('type', '!=', 'mc-azlink');
    }
}
