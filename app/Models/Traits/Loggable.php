<?php

namespace Azuriom\Models\Traits;

use Azuriom\Models\ActionLog;
use Illuminate\Database\Eloquent\Model;

/**
 * Log actions of this model.
 */
trait Loggable
{
    protected static function bootLoggable()
    {
        $events = static::$logEvents ?? ['created', 'updated', 'deleted'];

        foreach ($events as $event) {
            static::$event(function (Model $model) use ($event) {
                $action = str_replace('_', '-', $model->getTable()).'.'.$event;

                ActionLog::log($action, $model, $model->getLogData($event));
            });
        }
    }

    protected function getLogData(string $event)
    {
        return [];
    }
}
