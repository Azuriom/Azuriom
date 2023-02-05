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

    /**
     * By default, get the attributes that have been changed since the last sync.
     *
     * @param  string  $event
     * @return array
     */
    protected function getLogData(string $event): array
    {
        $changedValues = $this->getDirty();
        $originalData = [];

        foreach (array_keys($changedValues) as $propertyName) {
            $originalData[$propertyName] = $this->getOriginal($propertyName);
        }

        return [
            'old' => $originalData,
            'new' => $changedValues,
        ];
    }
}
