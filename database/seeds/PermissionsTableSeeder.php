<?php

use Azuriom\Models\Permission;
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
        $permissions = [
            'posts.comments.add',
            'posts.comments.delete.all',
            'admin.access',
            'admin.logs',
            'admin.images',
            'admin.navbar',
            'admin.pages',
            'admin.posts',
            'admin.settings',
            'admin.themes',
            'admin.plugins',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }
    }
}
