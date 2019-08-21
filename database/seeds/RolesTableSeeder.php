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
        Role::firstOrCreate([
            'name' => 'Member',
            'color' => '212529'
        ]);

        Role::firstOrCreate([
            'name' => 'Admin',
            'color' => 'e10d11'
        ]);
    }
}
