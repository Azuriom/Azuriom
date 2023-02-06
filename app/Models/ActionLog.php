<?php

namespace Azuriom\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

/**
 * @property int $id
 * @property int $user_id
 * @property string $action
 * @property int|null $target_id
 * @property array $data
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Azuriom\Models\User $user
 * @property \Illuminate\Database\Eloquent\Model|null $target
 * @property \Azuriom\Models\ActionLogEntry[] $entries
 *
 * @method static \Illuminate\Database\Eloquent\Builder onlyGlobal()
 */
class ActionLog extends Model
{
    private static array $actions = [
        'users.login' => [
            'global' => false,
            'icon' => 'box-arrow-in-right',
            'color' => 'info',
            'message' => 'admin.logs.users.login',
        ],
        'users.2fa.enabled' => [
            'global' => false,
            'icon' => 'shield-check',
            'color' => 'success',
            'message' => 'admin.logs.users.2fa.enabled',
        ],
        'users.2fa.disabled' => [
            'global' => false,
            'icon' => 'shield-exclamation',
            'color' => 'warning',
            'message' => 'admin.logs.users.2fa.disabled',
        ],
        'users.transfer' => [
            'icon' => 'arrow-left-right',
            'color' => 'info',
            'message' => 'admin.logs.users.transfer',
        ],
        'settings.updated' => [
            'icon' => 'arrow-repeat',
            'color' => 'warning',
            'message' => 'admin.logs.settings.updated',
        ],
        'updates.installed' => [
            'icon' => 'arrow-repeat',
            'color' => 'warning',
            'message' => 'admin.logs.updates.installed',
        ],
        'plugins.enabled' => [
            'icon' => 'plus-lg',
            'color' => 'success',
            'message' => 'admin.logs.plugins.enabled',
        ],
        'plugins.disabled' => [
            'icon' => 'dash-lg',
            'color' => 'danger',
            'message' => 'admin.logs.plugins.disabled',
        ],
        'themes.changed' => [
            'icon' => 'arrow-repeat',
            'color' => 'warning',
            'message' => 'admin.logs.themes.changed',
        ],
        'themes.configured' => [
            'icon' => 'sliders',
            'color' => 'warning',
            'message' => 'admin.logs.themes.configured',
        ],
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'type', 'target_id', 'action', 'data',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'data' => 'array',
    ];

    protected static function booted()
    {
        self::registerLogModels([
            Ban::class,
            Post::class,
            Page::class,
            Role::class,
            Server::class,
            Image::class,
            Redirect::class,
            User::class,
        ], 'admin.logs');
    }

    /**
     * Get the author of this action.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the target of this action.
     */
    public function target()
    {
        return $this->morphTo('target');
    }

    public function entries()
    {
        return $this->hasMany(ActionLogEntry::class);
    }

    protected function getTargetTypeAttribute()
    {
        if ($this->target_id === null) {
            return null;
        }

        return $this->getActionFormat()['model'] ?? null;
    }

    public function getActionFormat()
    {
        return self::$actions[$this->action] ?? [
            'icon' => 'question-lg',
            'color' => 'muted',
            'message' => $this->action,
        ];
    }

    public function getActionMessage()
    {
        $data = ['id' => $this->target_id] + ($this->data ?? []);

        return trans($this->getActionFormat()['message'], $data);
    }

    /**
     * Create a new log entry.
     *
     * @param  string  $action
     * @param  \Illuminate\Database\Eloquent\Model|null  $target
     * @param  array  $data
     * @return \Azuriom\Models\ActionLog|null
     */
    public static function log(string $action, Model $target = null, array $data = [])
    {
        if (Auth::guest()) {
            return null;
        }

        return self::create([
            'user_id' => Auth::id(),
            'action' => $action,
            'target_id' => $target?->getKey(),
            'data' => $data ?: null,
        ]);
    }

    public static function registerLogModels(array $models, string $transNamespacePrefix)
    {
        foreach ($models as $item) {
            self::registerLogModel($item, $transNamespacePrefix);
        }
    }

    public static function registerLogModel(string $class, string $transPrefix)
    {
        $table = str_replace('_', '-', (new $class())->getTable());

        self::$actions[$table.'.created'] = [
            'icon' => 'plus-lg',
            'color' => 'success',
            'message' => "{$transPrefix}.{$table}.created",
            'model' => $class,
        ];

        self::$actions[$table.'.updated'] = [
            'icon' => 'arrow-repeat',
            'color' => 'warning',
            'message' => "{$transPrefix}.{$table}.updated",
            'model' => $class,
        ];

        self::$actions[$table.'.deleted'] = [
            'icon' => 'dash-lg',
            'color' => 'danger',
            'message' => "{$transPrefix}.{$table}.deleted",
            'model' => $class,
        ];
    }

    public static function registerLogs($key, $value = null)
    {
        $keys = is_array($key) ? $key : [$key => $value];

        foreach ($keys as $actionKey => $actionValue) {
            self::$actions[$actionKey] = $actionValue;
        }
    }

    public function createEntries(array $old, array $new)
    {
        foreach ($old as $attribute => $oldValue) {
            $newValue = Arr::get($new, $attribute);

            if ($oldValue !== $newValue) {
                $this->entries()->create([
                    'attribute' => $attribute,
                    'old_value' => $oldValue,
                    'new_value' => $newValue,
                ]);
            }
        }
    }

    /**
     * Scope a query to only include global logs.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOnlyGlobal(Builder $query)
    {
        $nonGlobals = collect(static::$actions)
            ->where('global', '===', false)
            ->keys()
            ->all();

        return $query->whereNotIn('action', $nonGlobals);
    }
}
