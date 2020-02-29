<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Azuriom\Models\Comment;
use Azuriom\Models\Post;
use Azuriom\Models\User;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'content' => $faker->paragraph,
        'author_id' => function () {
            return factory(User::class)->create()->id;
        },
        'post_id' => function () {
            return factory(Post::class)->create()->id;
        }
    ];
});
