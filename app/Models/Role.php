<?php

namespace Azuriom\Models;

use Azuriom\Traits\Loggable;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $color
 * @property bool $is_admin
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @property \Illuminate\Support\Collection|\Azuriom\Models\User[] $users
 * @property \Illuminate\Support\Collection|\Azuriom\Models\Permission[] $permissions
 */
class Role extends Model
{
    use Loggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'color', 'is_admin',
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
        return '#'.$this->color;
    }

    /**
     * Get the CSS inline style rules of this role.
     * The background color is the role color and the text
     * color is white or black depending on the role color
     *
     * @return string
     */
    public function getBadgeStyle()
    {
        $color = color_contrast($this->getHexColor());

        return "color: {$color}; background: {$this->getHexColor()}";
    }

    /**
     * Return true if this role is a permanent role.
     * The roles created by the application with the id 1 or 2
     * are permanents roles and can't be deleted.
     *
     * @return bool
     */
    public function isPermanent()
    {
        return $this->id === 1 || $this->id === 2;
    }

    /**
     * Return true if this role is the default role.
     * The role created by the application with the id 1
     * is always the default role that new users will get
     * when they will register
     *
     * @return bool
     */
    public function isDefault()
    {
        return $this->id === 1;
    }

    /**
     * Get the default role.
     *
     * @return Role
     */
    public static function defaultRole()
    {
        return Role::find(1);
    }
}
