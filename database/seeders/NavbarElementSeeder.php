<?php

namespace Database\Seeders;

use Azuriom\Models\NavbarElement;
use Illuminate\Database\Seeder;

class NavbarElementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        NavbarElement::firstOrCreate(['type' => 'home'], [
            'name' => trans('seed.navbar.home'),
            'icon' => 'bi bi-house',
            'value' => '#',
        ]);
    }
}
