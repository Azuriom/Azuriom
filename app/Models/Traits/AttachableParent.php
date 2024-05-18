<?php

namespace Azuriom\Models\Traits;

use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

/**
 * Parent class for models that can have attachments.
 * Used to automatically delete attachments from the associated children.
 */
trait AttachableParent
{
    public static function bootAttachableParent(): void
    {
        $pendingDelete = [];

        static::deleting(function (Model $model) use (&$pendingDelete) {
            $children = $model->getAttribute(static::$attachableRelation ?? null);

            if ($children !== null) {
                // The relation can be either a collection or a single model
                $pendingDelete[$model->getKey()] = collect($children->load([
                    'attachments' => fn (Builder $query) => $query->withTrashed(),
                ]));
            }
        });

        static::deleted(function (Model $model) use (&$pendingDelete) {
            $children = Arr::get($pendingDelete, $model->getKey(), []);

            foreach ($children as $child) {
                if ($child->fresh() !== null) {
                    continue; // Ensure the model is actually deleted
                }

                foreach ($child->attachments as $attachment) {
                    $attachment->setRelation('attachable', $child)->forceDelete();
                }
            }
        });
    }
}
