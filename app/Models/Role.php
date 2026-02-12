<?php

namespace Azuriom\Models;

use Azuriom\Casts\Color;
use Azuriom\Models\Traits\Loggable;
use Azuriom\Models\Traits\Searchable;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * @property int $id
 * @property string $name
 * @property string|null $icon
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
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'icon', 'color', 'power', 'is_admin',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'color' => Color::class,
        'is_admin' => 'boolean',
    ];

    /**
     * The attributes that can be used for search.
     *
     * @var array<int, string>
     */
    protected array $searchable = [
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

    public function rawPermissions(): Collection
    {
        return $this->permissions->pluck('permission');
    }

    public function hasPermission($permission): bool
    {
        return $this->is_admin || $this->hasRawPermission($permission);
    }

    public function hasRawPermission(string $permission): bool
    {
        return $this->permissions->contains('permission', $permission);
    }

    public function syncPermissions(array $newPermissions, bool $remove = true): void
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
     */
    public function getBadgeStyle(): string
    {
        $color = color_contrast($this->color);

        return "color: {$color}; background: {$this->color};";
    }

    /**
     * Return true if this role is the default role.
     * The role created by the application with the id 1
     * is always the default role that new users will get
     * when they will register.
     */
    public function isDefault(): bool
    {
        return $this->id === self::defaultRoleId();
    }

    /**
     * Get the default role.
     */
    public static function defaultRole(): self
    {
        return self::find(self::defaultRoleId());
    }

    /**
     * Get the default role id.
     */
    public static function defaultRoleId(): int
    {
        return (int) setting('roles.default', 1);
    }

    /**
     * Scope a query to only include admin roles.
     */
    #[Scope]
    protected function admin(Builder $query): void
    {
        $query->where('is_admin', true);
    }
}
