<?php

namespace Azuriom\Traits;

use Azuriom\Models\ActionLog;
use Illuminate\Database\Eloquent\Model;

trait Loggable
{
    protected static function bootLoggable()
    {
        $events = static::$logEvents ?? ['created', 'updated', 'deleted'];

        foreach ($events as $event) {
            static::$event(function (Model $model) use ($event) {
                ActionLog::log($event, $model);
            });
        }
    }
}
