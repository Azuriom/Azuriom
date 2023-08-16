<?php

namespace Azuriom\Models;

use Azuriom\Models\Traits\Searchable;
use Azuriom\Support\Discord\LinkedRoles;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string discord_user_id
 * @property int $user_id
 * @property string $access_token
 * @property string $refresh_token
 * @property \Carbon\Carbon $expires_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Azuriom\Models\User $user
 */
class DiscordAccount extends Model
{
    use Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'discord_user_id', 'user_id', 'access_token', 'refresh_token',
        'expires_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'expires_at' => 'datetime',
    ];

    /**
     * The attributes that can be used for search.
     *
     * @var array<int, string>
     */
    protected array $searchable = [
        'discord_user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function refreshAccessToken(): string
    {
        if ($this->expires_at->isFuture()) {
            return $this->access_token;
        }

        LinkedRoles::refreshAccessToken($this);

        return $this->access_token;
    }
}
