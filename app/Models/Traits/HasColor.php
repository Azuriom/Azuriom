<?php

namespace Azuriom\Models\Traits;

trait HasColor
{
    protected function getColorAttribute($value)
    {
        return '#'.$value;
    }

    protected function setColorAttribute($value)
    {
        $this->attributes['color'] = (strlen($value) === 7) ? substr($value, 1) : $value;
    }
}
