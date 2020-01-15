<?php

namespace Azuriom\Models\Traits;

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
            $this->setTable($this->prefix . parent::getTable());
        }

        return $this->table;
    }
}
