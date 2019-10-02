<?php

namespace Azuriom\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 *
 * @property \Illuminate\Support\Collection|\Azuriom\Models\Role[] $roles
 */
class Permission extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Get the roles that has this permission.
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
