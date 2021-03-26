<?php

namespace Database\Factories;

use Azuriom\Models\Like;
use Azuriom\Models\Post;
use Azuriom\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class LikeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Like::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'post_id' => Post::factory(),
            'author_id' => User::factory(),
        ];
    }
}
