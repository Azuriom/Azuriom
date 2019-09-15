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
            'name' => 'Home',
            'value' => '#',
            'type' => 'home'
        ]);
    }
}
