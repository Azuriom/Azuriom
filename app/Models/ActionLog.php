<?php

namespace Azuriom\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

/**
 * @property int $id
 * @property int $user_id
 * @property string $type
 * @property int|null $target_id
 * @property string $action
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @property \Azuriom\Models\User $user
 * @property \Illuminate\Database\Eloquent\Model|null $target
 */
class ActionLog extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'type', 'target_id', 'action',
    ];

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = [
        'user',
    ];

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
        return $this->target_id !== null ? ('\Azuriom\\Models\\'.$this->type) : null;
    }

    protected function setTargetTypeAttribute($value)
    {
        $this->type = substr($value, strrpos($value, '\\') + 1);
    }

    public function formatAction()
    {
        return ucfirst(strtolower($this->action));
    }

    public function getActionFormat()
    {
        switch ($this->action) {
            case 'created':
                return [
                    'color' => 'success',
                    'icon' => 'plus'
                ];
            case 'updated':
                return [
                    'color' => 'warning',
                    'icon' => 'redo'
                ];
            case 'deleted':
                return [
                    'color' => 'danger',
                    'icon' => 'minus'
                ];
            default:
                return [
                    'color' => 'primary',
                    'icon' => 'question'
                ];
        }
    }

    /**
     * Create a new log entry.
     *
     * @param  string  $action
     * @param $target \Illuminate\Database\Eloquent\Model|string
     */
    public static function log(string $action, $target)
    {
        if (Auth::guest()) {
            return;
        }

        $log = new self([
            'user_id' => Auth::id(),
            'action' => $action
        ]);

        if (is_string($target)) {
            $log->type = $target;
        } else {
            $log->target()->associate($target);
        }

        $log->save();
    }

    public static function logCreate($target)
    {
        self::log('created', $target);
    }

    public static function logUpdate($target)
    {
        self::log('updated', $target);
    }

    public static function logDelete($target)
    {
        self::log('deleted', $target);
    }
}
