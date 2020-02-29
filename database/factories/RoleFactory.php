<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Azuriom\Models\Role;
use Faker\Generator as Faker;

$factory->define(Role::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'color' => $faker->hexColor,
    ];
});

$factory->state(Role::class, 'admin', [
    'is_admin' => true,
]);
