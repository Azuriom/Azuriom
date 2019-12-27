<?php

use Azuriom\Models\NavbarElement;
use Illuminate\Database\Seeder;

class NavbarElementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NavbarElement::firstOrCreate([
            'type' => 'home'
        ], [
            'name' => trans('seed.navbar.home'),
            'value' => '#',
        ]);
    }
}
