<?php

namespace Database\Seeders;

use Azuriom\Models\NavbarElement;
use Illuminate\Database\Seeder;

class NavbarElementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NavbarElement::firstOrCreate(['type' => 'home'], [
            'icon' => 'house-fill',
            'name' => trans('seed.navbar.home'),
            'value' => '#',
        ]);
    }
}
