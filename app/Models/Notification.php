<?php

namespace Azuriom\Models;

use Azuriom\Models\Traits\HasUuidKey;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
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
     * @var array<int, string>
     */
    protected $fillable = [
        'author_id', 'level', 'content', 'link', 'read_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'read_at' => 'datetime',
    ];

    /**
     * The icons by level.
     */
    protected array $icons = [
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
     */
    public function icon(): string
    {
        return $this->icons[$this->level] ?? 'bell';
    }

    /**
     * Mark the notification as read.
     */
    public function markAsRead(): void
    {
        if ($this->read_at === null) {
            $this->update(['read_at' => $this->freshTimestamp()]);
        }
    }

    /**
     * Mark the notification as unread.
     */
    public function markAsUnread(): void
    {
        if ($this->read_at !== null) {
            $this->update(['read_at' => null]);
        }
    }

    /**
     * Determine if a notification has been read.
     */
    public function read(): bool
    {
        return $this->read_at !== null;
    }

    /**
     * Determine if a notification has not been read.
     */
    public function unread(): bool
    {
        return $this->read_at === null;
    }

    /**
     * Scope a query to only include read notifications.
     */
    public function scopeRead(Builder $query): void
    {
        $query->whereNotNull('read_at');
    }

    /**
     * Scope a query to only include unread notifications.
     */
    public function scopeUnread(Builder $query): void
    {
        $query->whereNull('read_at');
    }

    /**
     * Create a new database notification collection instance.
     */
    public function newCollection(array $models = []): Collection
    {
        return new DatabaseNotificationCollection($models);
    }
}
