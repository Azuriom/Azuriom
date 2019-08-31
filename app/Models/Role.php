<?php

namespace Azuriom\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'color', 'is_admin'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_admin' => 'boolean',
    ];

    /**
     * Get the users in this group.
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }

    /**
     * The permission that this role have.
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function hasPermission($permission)
    {
        return $this->is_admin || $this->hasRawPermission($permission);
    }

    public function hasRawPermission($permission)
    {
        if (is_string($permission)) {
            $permission = Permission::where('name', $permission)->first();
        }

        return $permission && $this->permissions->contains($permission);
    }

    public function getHexColor()
    {
        return "#{$this->color}";
    }

    public function getBadgeStyle()
    {
        $color = color_contrast($this->getHexColor());

        return "color: {$color}; background: {$this->getHexColor()}";
    }

    public function isPermanent()
    {
        return $this->id == 1 || $this->id == 2;
    }

    public function isDefault()
    {
        return $this->id == 1;
    }

    /**
     * Get the default role
     *
     * @return Role
     */
    public static function defaultRole()
    {
        return Role::find(1);
    }
}
