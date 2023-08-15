<?php

namespace Azuriom\Models\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use RuntimeException;

/**
 * Automatically generate a UUID for the model if it doesn't have one.
 */
trait HasUuidKey
{
    public static function bootHasUuidKey(): void
    {
        static::creating(function (Model $model) {
            if ($model->getKey() === null) {
                $model->setAttribute($model->getKeyName(), Str::uuid());
            }
        });
    }

    /**
     * Get the auto-incrementing key type.
     */
    public function getKeyType(): string
    {
        return 'string';
    }

    /**
     * Set the data type for the primary key.
     */
    public function setKeyType($type): never
    {
        throw new RuntimeException('Cannot change key type with UUID key.');
    }

    /**
     * Get the value indicating whether the IDs are incrementing.
     */
    public function getIncrementing(): bool
    {
        return false;
    }

    /**
     * Set whether IDs are incrementing.
     */
    public function setIncrementing($value): never
    {
        throw new RuntimeException('Cannot change incrementing with UUID key.');
    }
}
