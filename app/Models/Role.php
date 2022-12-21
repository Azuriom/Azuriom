<?php

namespace Azuriom\Models;

use Azuriom\Casts\Color;
use Azuriom\Models\Traits\Loggable;
use Azuriom\Models\Traits\Searchable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $color
 * @property int $power
 * @property bool $is_admin
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Illuminate\Support\Collection|\Azuriom\Models\User[] $users
 * @property \Illuminate\Support\Collection|\Azuriom\Models\Permission[] $permissions
 *
 * @method static \Illuminate\Database\Eloquent\Builder admin()
 */
class Role extends Model
{
    use HasFactory;
    use Loggable;
    use Searchable;

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
        'color' => Color::class,
        'is_admin' => 'boolean',
    ];

    /**
     * The attributes that can be search for.
     *
     * @var array
     */
    protected $searchable = [
        'name',
    ];

    /**
     * Get the users in this group.
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }

    /**
     * Get navbar elements attached to this role.
     */
    public function navbarElements()
    {
        return $this->belongsToMany(NavbarElement::class);
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
        return $this->id === self::defaultRoleId();
    }

    /**
     * Get the default role.
     *
     * @return \Azuriom\Models\Role
     */
    public static function defaultRole()
    {
        return self::find(self::defaultRoleId());
    }

    /**
     * Get the default role id.
     *
     * @return int
     */
    public static function defaultRoleId()
    {
        return (int) setting('roles.default', 1);
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
