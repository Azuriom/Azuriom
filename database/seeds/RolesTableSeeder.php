<?php

use Azuriom\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Role::count() > 0) {
            return;
        }

        Role::create([
            'name' => trans('seed.roles.member'),
            'color' => 'a5a5a5',
        ]);

        Role::create([
            'name' => trans('seed.roles.admin'),
            'color' => 'e10d11',
            'is_admin' => true,
            'power' => 10,
        ]);
    }
}
