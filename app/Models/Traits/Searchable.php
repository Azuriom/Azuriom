<?php

namespace Azuriom\Models\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

/**
 * Add a simple search method to a model.
 *
 * @method static \Illuminate\Database\Eloquent\Builder search(string $search, array|string|null $columns = null)
 */
trait Searchable
{
    /**
     * Scope a query to only include results that match the search.
     */
    public function scopeSearch(Builder $query, string $search, array|string|null $columns = null): void
    {
        $columns = $columns !== null ? Arr::wrap($columns) : $this->searchable;

        if ($columns === ['*']) {
            $columns = $this->searchable;
        }

        $query->where(fn ($query) => $this->runSearch($query, $search, $columns));
    }

    protected function runSearch(Builder $query, string $search, array $columns): void
    {
        $relations = [];

        foreach ($columns as $column) {
            if (! Str::contains($column, '.')) {
                $query->orWhereLike($column, "%{$search}%");

                continue;
            }

            // Split on the first dot only, so nested paths such as `user.resources.name`
            // are forwarded intact to the related model's own search scope
            [$relation, $relationColumn] = explode('.', $column, 2);

            $relations[$relation][] = $relationColumn;
        }

        foreach ($relations as $relation => $relColumns) {
            $query->orWhereRelation($relation, fn (Builder $q) => $q->search($search, $relColumns));
        }

        if (is_numeric($search) || $this->getKeyType() !== 'int') {
            $query->orWhere($this->getKeyName(), $search);
        }
    }
}
