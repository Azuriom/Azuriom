<?php

namespace Azuriom\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

/**
 * @property int $id
 * @property int $user_id
 * @property string $action
 * @property int|null $target_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @property \Azuriom\Models\User $user
 * @property \Illuminate\Database\Eloquent\Model|null $target
 */
class ActionLog extends Model
{
    private static $actions = [
        'settings.updated' => [
            'icon' => 'sync',
            'color' => 'warning',
            'message' => 'admin.logs.settings.updated',
        ],
        'theme.changed' => [
            'icon' => 'sync',
            'color' => 'warning',
            'message' => 'admin.logs.themes.changed',
        ],
        'updates.installed' => [
            'icon' => 'sync',
            'color' => 'warning',
            'message' => 'admin.logs.updates.installed',
        ],
        'plugins.enabled' => [
            'icon' => 'plus',
            'color' => 'success',
            'message' => 'admin.logs.plugins.enabled',
        ],
        'plugins.disabled' => [
            'icon' => 'minus',
            'color' => 'danger',
            'message' => 'admin.logs.plugins.disabled',
        ],
        'themes.changed' => [
            'icon' => 'plus',
            'color' => 'success',
            'message' => 'admin.logs.themes.changed',
        ],
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'type', 'target_id', 'action',
    ];

    public static function boot()
    {
        parent::boot();

        self::registerLogModels([
            Post::class,
            Page::class,
            Role::class,
            Server::class,
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
            'icon' => 'question',
            'color' => 'muted',
            'message' => '?',
        ];
    }

    /**
     * Create a new log entry.
     *
     * @param  string  $action
     * @param $target \Illuminate\Database\Eloquent\Model|string
     */
    public static function log(string $action, Model $target = null)
    {
        if (Auth::guest()) {
            return;
        }

        $log = new self([
            'user_id' => Auth::id(),
            'action' => $action,
        ]);

        if ($target !== null) {
            $log->fill(['target_id' => $target->getKey()]);
        }

        $log->save();
    }

    public static function registerLogModels(array $models, string $transNamespacePrefix)
    {
        foreach ($models as $item) {
            self::registerLogModel($item, $transNamespacePrefix);
        }
    }

    public static function registerLogModel(string $class, string $transNamespacePrefix)
    {
        $table = str_replace('_', '-', (new $class())->getTable());

        self::$actions[$table.'.created'] = [
            'icon' => 'plus',
            'color' => 'success',
            'message' => "{$transNamespacePrefix}.{$table}.created",
            'model' => $class,
        ];

        self::$actions[$table.'.updated'] = [
            'icon' => 'sync',
            'color' => 'warning',
            'message' => "{$transNamespacePrefix}.{$table}.updated",
            'model' => $class,
        ];

        self::$actions[$table.'.deleted'] = [
            'icon' => 'minus',
            'color' => 'danger',
            'message' => "{$transNamespacePrefix}.{$table}.deleted",
            'model' => $class,
        ];
    }

    public static function registerLogs($key, $value = null)
    {
        $keys = is_array($key) ? $key : [$key => $value];

        foreach ($keys as $key => $value) {
            self::$actions[$key] = $value;
        }
    }
}
