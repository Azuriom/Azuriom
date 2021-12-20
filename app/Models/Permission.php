<?php

namespace Azuriom\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $permission
 * @property int $role_id
 * @property \Azuriom\Models\Role $role
 */
class Permission extends Model
{
    private static $permissions = [
        'comments.create' => 'admin.permissions.create-comments',
        'comments.delete.other' => 'admin.permissions.delete-other-comments',
        'maintenance.access' => 'admin.permissions.maintenance-access',
        'admin.access' => 'admin.permissions.admin-access',
        'admin.logs' => 'admin.permissions.admin-logs',
        'admin.images' => 'admin.permissions.admin-images',
        'admin.navbar' => 'admin.permissions.admin-navbar',
        'admin.pages' => 'admin.permissions.admin-pages',
        'admin.redirects' => 'admin.permissions.admin-redirects',
        'admin.posts' => 'admin.permissions.admin-posts',
        'admin.settings' => 'admin.permissions.admin-settings',
        'admin.users' => 'admin.permissions.admin-users',
        'admin.themes' => 'admin.permissions.admin-themes',
        'admin.plugins' => 'admin.permissions.admin-plugins',
    ];

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
        'permission',
    ];

    /**
     * Get the roles that has this permission.
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public static function permissionsWithName()
    {
        return self::$permissions;
    }

    public static function permissions()
    {
        return array_keys(self::$permissions);
    }

    public static function registerPermissions(array $permissions)
    {
        self::$permissions = array_merge(self::$permissions, $permissions);
    }
}
