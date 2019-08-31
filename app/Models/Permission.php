<?php

namespace Azuriom\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
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
