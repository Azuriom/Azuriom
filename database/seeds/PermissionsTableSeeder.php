<?php

use Azuriom\Models\Role;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $defaultPermissions = [
            'comments.create',
        ];

        foreach (Role::all() as $role) {
            $role->syncPermissions($defaultPermissions, false);
        }
    }
}
