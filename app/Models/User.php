<?php

namespace Azuriom\Models;

use Azuriom\Models\Traits\InteractsWithMoney;
use Azuriom\Models\Traits\Searchable;
use Azuriom\Notifications\ResetPassword as ResetPasswordNotification;
use Azuriom\Notifications\VerifyEmail as VerifyEmailNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Cache;

/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Carbon\Carbon|null $email_verified_at
 * @property string $password
 * @property int $role_id
 * @property float $money
 * @property string|null $game_id
 * @property string|null $access_token
 * @property string|null $last_login_ip
 * @property \Carbon\Carbon|null $last_login_at
 * @property string|null $google_2fa_secret
 * @property bool $is_deleted
 * @property string|null $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Illuminate\Support\Collection|\Azuriom\Models\Post[] $posts
 * @property \Illuminate\Support\Collection|\Azuriom\Models\Comment[] $comments
 * @property \Illuminate\Support\Collection|\Azuriom\Models\Like[] $likes
 * @property \Illuminate\Support\Collection|\Azuriom\Models\Ban[] $bans
 * @property \Illuminate\Support\Collection|\Azuriom\Models\Notification[] $notifications
 * @property \Illuminate\Support\Collection|\Azuriom\Models\Notification[] $readNotifications
 * @property \Illuminate\Support\Collection|\Azuriom\Models\Notification[] $unreadNotifications
 * @property \Azuriom\Models\Role $role
 * @property \Azuriom\Models\Ban|null $ban
 */
class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory;
    use InteractsWithMoney;
    use Notifiable;
    use Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'money', 'role_id', 'game_id', 'access_token', 'google_2fa_secret',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'access_token', 'last_login_ip', 'google_2fa_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'money' => 'float',
        'email_verified_at' => 'datetime',
        'last_login_at' => 'datetime',
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
     * The attributes that can be search for.
     *
     * @var array
     */
    protected $searchable = [
        'email', 'name', 'game_id',
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
     * Get the bans that the user receives.
     */
    public function bans()
    {
        return $this->hasMany(Ban::class)->withTrashed();
    }

    /**
     * Get the user's notifications.
     */
    public function notifications()
    {
        return $this->hasMany(Notification::class)->latest();
    }

    /**
     * Get the user's avatar url.
     * The size may not correspond depending on the provider.
     *
     * @param  int  $size
     * @return string
     */
    public function getAvatar(int $size = 64)
    {
        /* @noinspection PhpDeprecationInspection */
        return game()->getAvatarUrl($this, $size);
    }

    public function isBanned(bool $useCache = false)
    {
        if ($useCache) {
            return Cache::remember("users.{$this->id}.banned", now()->addHour(), function () {
                return $this->ban !== null;
            });
        }

        return $this->ban !== null;
    }

    public function isDeleted()
    {
        return $this->is_deleted;
    }

    public function flushBanCache()
    {
        Cache::forget("users.{$this->id}.banned");
    }

    /** @deprecated use isBanned() */
    public function getIsBannedAttribute()
    {
        return $this->isBanned();
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

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmailNotification());
    }
}
