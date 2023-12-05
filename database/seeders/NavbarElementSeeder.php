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
        if (NavbarElement::exists()) {
            return;
        }

        NavbarElement::create([
            'name' => trans('seed.navbar.home'),
            'type' => 'home',
            'icon' => 'bi bi-house',
            'value' => '#',
        ]);
    }
}
