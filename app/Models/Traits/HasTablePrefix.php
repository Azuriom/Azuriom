<?php

namespace Azuriom\Models\Traits;

/**
 * Add a prefix to the table name.
 */
trait HasTablePrefix
{
    /**
     * Get the table associated with the model.
     *
     * @return string
     */
    public function getTable()
    {
        if ($this->table === null) {
            $this->setTable($this->prefix.parent::getTable());
        }

        return $this->table;
    }
}
