<?php

use Azuriom\Models\Role;
use Azuriom\Models\Setting;
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

        $defaultRole = Role::create([
            'name' => trans('seed.roles.member'),
            'color' => 'a5a5a5',
        ]);

        if ($defaultRole->id !== 1) {
            Setting::updateSettings('role.default', $defaultRole->id);
        }

        Role::create([
            'name' => trans('seed.roles.admin'),
            'color' => 'e10d11',
            'is_admin' => true,
            'power' => 10,
        ]);
    }
}
