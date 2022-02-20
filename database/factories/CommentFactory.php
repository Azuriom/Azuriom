<?php

namespace Database\Factories;

use Azuriom\Models\Comment;
use Azuriom\Models\Post;
use Azuriom\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Azuriom\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'content' => $this->faker->paragraph(),
            'author_id' => User::factory(),
            'post_id' => Post::factory(),
        ];
    }
}
