<?php

namespace Azuriom\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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

    public function getTargetTypeAttribute()
    {
        return $this->target_id !== null ? ('\Azuriom\\Models\\'.$this->type) : null;
    }

    public function setTargetTypeAttribute($value)
    {
        $this->type = Arr::last(explode('\\', $value));
    }

    protected function newMorphTo(Builder $query, Model $parent, $foreignKey, $ownerKey, $type, $relation)
    {
        return new MorphTo($query, $parent, $foreignKey, $ownerKey, $type, $relation);
    }

    public static function logCreate($target)
    {
        self::log('CREATE', $target);
    }

    public static function logEdit($target)
    {
        self::log('EDIT', $target);
    }

    public static function logDelete($target)
    {
        self::log('DELETE', $target);
    }

    public function formatAction()
    {
        return Str::studly(Str::lower($this->action));
    }

    public function getActionFormat()
    {
        switch ($this->action) {
            case 'CREATE':
                return [
                    'color' => 'success',
                    'icon' => 'plus'
                ];
            case 'EDIT':
                return [
                    'color' => 'warning',
                    'icon' => 'redo'
                ];
            case 'DELETE':
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
}
