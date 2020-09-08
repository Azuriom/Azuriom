<?php

namespace Database\Seeders;

use Azuriom\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $defaultSettings = [
            'copyright' => trans('seed.settings.copyright', ['year' => now()->year]),
            'money' => trans('seed.settings.money'),
        ];

        foreach ($defaultSettings as $setting => $value) {
            Setting::firstOrCreate(['name' => $setting], ['value' => $value]);
        }
    }
}
