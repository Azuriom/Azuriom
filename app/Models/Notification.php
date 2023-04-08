<?php

namespace Azuriom\Models;

use Azuriom\Models\Traits\HasUuidKey;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\DatabaseNotificationCollection;

/**
 * @property string $id
 * @property int $user_id
 * @property int|null $author_id
 * @property string $level
 * @property string $content
 * @property string|null $link
 * @property \Carbon\Carbon|null $read_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Azuriom\Models\User $user
 * @property \Azuriom\Models\User|null $author
 */
class Notification extends Model
{
    use HasUuidKey;

    public const LEVELS = ['info', 'success', 'warning', 'danger'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'author_id', 'level', 'content', 'link', 'read_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'read_at' => 'datetime',
    ];

    /**
     * The icons by level.
     *
     * @var array
     */
    protected $icons = [
        'info' => 'bell',
        'warning' => 'exclamation-octagon',
        'danger' => 'exclamation-triangle',
        'success' => 'check-lg',
    ];

    /**
     * Get the user that the notification belongs to.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the author of the notification.
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    /**
     * Get the icon corresponding to the notification level.
     *
     * @return string
     */
    public function icon()
    {
        return $this->icons[$this->level] ?? 'bell';
    }

    /**
     * Mark the notification as read.
     *
     * @return void
     */
    public function markAsRead()
    {
        if ($this->read_at === null) {
            $this->update(['read_at' => $this->freshTimestamp()]);
        }
    }

    /**
     * Mark the notification as unread.
     *
     * @return void
     */
    public function markAsUnread()
    {
        if ($this->read_at !== null) {
            $this->update(['read_at' => null]);
        }
    }

    /**
     * Determine if a notification has been read.
     *
     * @return bool
     */
    public function read()
    {
        return $this->read_at !== null;
    }

    /**
     * Determine if a notification has not been read.
     *
     * @return bool
     */
    public function unread()
    {
        return $this->read_at === null;
    }

    /**
     * Scope a query to only include read notifications.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeRead(Builder $query)
    {
        return $query->whereNotNull('read_at');
    }

    /**
     * Scope a query to only include unread notifications.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUnread(Builder $query)
    {
        return $query->whereNull('read_at');
    }

    /**
     * Create a new database notification collection instance.
     *
     * @param  array  $models
     * @return \Illuminate\Notifications\DatabaseNotificationCollection
     */
    public function newCollection(array $models = [])
    {
        return new DatabaseNotificationCollection($models);
    }
}
