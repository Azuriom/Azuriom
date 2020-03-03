<?php

namespace Azuriom\Models\Traits;

/**
 * @deprecated Use Color cast.
 */
// TODO 1.0: Remove this deprecated class
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
