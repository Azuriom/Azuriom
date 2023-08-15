<?php

namespace Database\Seeders;

use Azuriom\Models\Permission;
use Azuriom\Models\Role;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Permission::count() > 0) {
            return;
        }

        foreach (Role::all() as $role) {
            $role->syncPermissions(['comments.create'], false);
        }
    }
}
