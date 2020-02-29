<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Azuriom\Models\Post;
use Azuriom\Models\User;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->sentence,
        'description' => $faker->sentence,
        'slug' => $faker->slug,
        'content' => $faker->paragraph,
        'published_at' => now(),
        'author_id' => function () {
            return factory(User::class)->create()->id;
        },
    ];
});
