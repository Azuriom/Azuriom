<?php

namespace Azuriom\Models\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use RuntimeException;

/**
 * Automatically generate an UUID for the model if it's doesn't have one.
 */
trait HasUuidKey
{
    public static function bootHasUuidKey()
    {
        static::creating(function (Model $model) {
            if ($model->getKey() === null) {
                $model->setAttribute($model->getKeyName(), Str::uuid());
            }
        });
    }

    /**
     * Get the auto-incrementing key type.
     *
     * @return string
     */
    public function getKeyType()
    {
        return 'string';
    }

    /**
     * Set the data type for the primary key.
     *
     * @param  string  $type
     */
    public function setKeyType($type)
    {
        throw new RuntimeException('Cannot change key type with UUID key.');
    }

    /**
     * Get the value indicating whether the IDs are incrementing.
     *
     * @return bool
     */
    public function getIncrementing()
    {
        return false;
    }

    /**
     * Set whether IDs are incrementing.
     *
     * @param  bool  $value
     */
    public function setIncrementing($value)
    {
        throw new RuntimeException('Cannot change incrementing with UUID key.');
    }
}
