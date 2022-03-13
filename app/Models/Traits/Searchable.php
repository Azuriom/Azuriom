<?php

namespace Azuriom\Models\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;

/**
 * Add a simple search method to a model.
 *
 * @method static \Illuminate\Database\Eloquent\Builder search(string $search, array|string|null $columns = null)
 */
trait Searchable
{
    /**
     * Scope a query to only include results that match the search.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  string  $search
     * @param  string[]|string|null  $columns
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearch(Builder $query, string $search, $columns = null)
    {
        if ($columns !== null) {
            $columns = Arr::wrap($columns);
        }

        return $query->where(function (Builder $query) use ($search, $columns) {
            foreach ($columns ?? $this->searchable as $column) {
                $query->orWhere($column, 'like', "%{$search}%");
            }

            if (is_numeric($search) || $this->getKeyType() !== 'int') {
                $query->orWhere($this->getKeyName(), $search);
            }
        });
    }
}
