<?php

namespace Azuriom\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;

class Color implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @param  array<string, mixed>  $attributes
     */
    public function get(Model $model, string $key, mixed $value, array $attributes): string
    {
        return '#'.$value;
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  array<string, mixed>  $attributes
     */
    public function set(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        $color = ltrim($value, '#');

        // Convert short hex colors
        if (strlen($color) === 3) {
            return $color[0].$color[0].$color[1].$color[1].$color[2].$color[2];
        }

        return $color;
    }
}
