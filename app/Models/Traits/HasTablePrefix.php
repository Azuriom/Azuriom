<?php

namespace Azuriom\Models\Traits;

/**
 * Add a prefix to the table name.
 *
 * @mixin \Illuminate\Database\Eloquent\Model
 *
 * @property string $prefix
 */
trait HasTablePrefix
{
    /**
     * Get the table associated with the model.
     */
    public function getTable(): string
    {
        if ($this->table === null) {
            $this->setTable($this->prefix.parent::getTable());
        }

        return $this->table;
    }
}
