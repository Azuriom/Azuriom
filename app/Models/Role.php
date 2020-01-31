<?php

namespace Azuriom\Models;

use Azuriom\Models\Traits\Loggable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $color
 * @property int $power
 * @property bool $is_admin
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @property \Illuminate\Support\Collection|\Azuriom\Models\User[] $users
 * @property \Illuminate\Support\Collection|\Azuriom\Models\Permission[] $permissions
 *
 * @method static \Illuminate\Database\Eloquent\Builder admin()
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
        'name', 'color', 'power', 'is_admin',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_admin' => 'boolean',
    ];

    protected function getColorAttribute($value)
    {
        return '#'.$value;
    }

    protected function setColorAttribute($value)
    {
        $this->attributes['color'] = (strlen($value) === 7) ? substr($value, 1) : $value;
    }

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
        return $this->hasMany(Permission::class);
    }

    public function rawPermissions()
    {
        return $this->permissions->pluck('permission');
    }

    public function hasPermission($permission)
    {
        return $this->is_admin || $this->hasRawPermission($permission);
    }

    public function hasRawPermission(string $permission)
    {
        return $this->permissions->contains('permission', $permission);
    }

    public function syncPermissions(array $newPermissions, bool $remove = true)
    {
        $permissions = $this->rawPermissions();

        // Create the new permissions
        foreach (array_diff($newPermissions, $permissions->all()) as $permission) {
            $this->permissions()->create(['permission' => $permission]);
        }

        if ($remove) {
            // Delete the removed permissions
            $removedPermissions = $permissions->diff($newPermissions);
            $this->permissions()->whereIn('permission', $removedPermissions)->delete();
        }
    }

    /**
     * Get the CSS inline style rules of this role.
     * The background color is the role color and the text
     * color is white or black depending on the role color.
     *
     * @return string
     */
    public function getBadgeStyle()
    {
        $color = color_contrast($this->color);

        return "color: {$color}; background: {$this->color};";
    }

    /**
     * Return true if this role is the default role.
     * The role created by the application with the id 1
     * is always the default role that new users will get
     * when they will register.
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
        return self::find(1);
    }

    /**
     * Scope a query to only include admin roles.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAdmin(Builder $query)
    {
        return $query->where('is_admin', true);
    }
}
