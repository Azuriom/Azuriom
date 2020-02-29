<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Azuriom\Models\Like;
use Azuriom\Models\Post;
use Azuriom\Models\User;
use Faker\Generator as Faker;

$factory->define(Like::class, function (Faker $faker) {
    return [
        'post_id' => function () {
            return factory(Post::class)->create()->id;
        },
        'author_id' => function () {
            return factory(User::class)->create()->id;
        },
    ];
});
