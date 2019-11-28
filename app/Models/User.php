<?php

namespace Azuriom\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Carbon\Carbon|null $email_verified_at
 * @property string $password
 * @property int $role_id
 * @property string|null $google_2fa_secret
 * @property string $remember_token
 * @property bool $is_banned
 * @property bool $is_deleted
 * @property string|null $last_login_ip
 * @property \Carbon\Carbon|null $last_login_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @property \Illuminate\Support\Collection|\Azuriom\Models\Post[] $posts
 * @property \Illuminate\Support\Collection|\Azuriom\Models\Comment[] $comments
 * @property \Illuminate\Support\Collection|\Azuriom\Models\Like[] $likes
 * @property \Illuminate\Support\Collection|\Azuriom\Models\Ban[] $bans
 * @property \Azuriom\Models\Role $role
 * @property \Azuriom\Models\Ban $ban
 */
class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'google_2fa_secret', 'is_banned',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'google_2fa_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_login_at' => 'datetime',
        'is_banned' => 'boolean',
        'is_deleted' => 'boolean',
    ];

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = [
        'role',
    ];

    /**
     * Get the posts of this user.
     */
    public function posts()
    {
        return $this->hasMany(Post::class, 'author_id');
    }

    /**
     * Get the comments of this user.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class, 'author_id');
    }

    /**
     * Get the likes of this user.
     */
    public function likes()
    {
        return $this->hasMany(Like::class, 'author_id');
    }

    /**
     * Get the role of this user.
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Get the the ban of this user if he is currently banned.
     */
    public function ban()
    {
        return $this->hasOne(Ban::class);
    }

    /**
     * Get the bans that the user receives
     */
    public function bans()
    {
        return $this->hasMany(Ban::class)->withTrashed();
    }

    public function refreshActiveBan()
    {
        $isBanned = $this->ban !== null;

        if ($this->is_banned !== $isBanned) {
            $this->update(['is_banned' => $isBanned]);
        }

        return $this;
    }

    public function hasPermission($permission)
    {
        return $this->role->hasPermission($permission);
    }

    public function hasTwoFactorAuth()
    {
        return $this->google_2fa_secret !== null;
    }

    public function hasAdminAccess()
    {
        return $this->can('admin.access');
    }

    public function isAdmin()
    {
        return $this->role->is_admin;
    }
}
