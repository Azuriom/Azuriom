<?php

namespace Azuriom\Models\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

/**
 * Associate a user when creating a model.
 */
trait HasUser
{
    protected static function bootHasUser()
    {
        static::creating(function (Model $model) {
            $key = $model->userKey ?? 'user_id';

            if ($model->getAttribute($key) === null) {
                $model->setAttribute($key, Auth::id());
            }
        });
    }
}
