<?php

namespace Azuriom\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $action_log_id
 * @property string $attribute
 * @property string|null $old_value
 * @property string|null $new_value
 * @property \Azuriom\Models\ActionLog $log
 */
class ActionLogEntry extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'action_log_id', 'attribute', 'old_value', 'new_value',
    ];

    /**
     * Get the author of this action.
     */
    public function log()
    {
        return $this->belongsTo(ActionLog::class);
    }
}
