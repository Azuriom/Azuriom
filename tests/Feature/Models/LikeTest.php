<?php

namespace Tests\Feature\Models;

use Azuriom\Models\Post;
use Azuriom\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LikeTest extends TestCase
{
    use RefreshDatabase;

    public function testIsLiked(): void
    {
        $post = Post::factory()->create();

        $this->actingAs(User::factory()->create());

        $post->likes()->create();

        $this->assertTrue($post->isLiked());
    }

    public function testIsNotLiked(): void
    {
        $post = Post::factory()->create();

        $this->actingAs(User::factory()->create());

        $this->assertFalse($post->isLiked());
    }

    public function testIsLikedWithExplicitUser(): void
    {
        $post = Post::factory()->create();

        $user = User::factory()->create();

        /** @var \Azuriom\Models\Like */
        $like = $post->likes()->make();

        $like->author()->associate($user)->save();

        $this->assertTrue($post->isLiked($user));
    }

    public function testIsLikedWithLoadedRelations(): void
    {
        $post = Post::factory()->create();

        $this->actingAs(User::factory()->create());

        $post->likes()->create();

        $post->load('likes.author');

        $this->assertTrue($post->isLiked());
    }

    public function testIsNotLikedWithLoadedRelations(): void
    {
        $post = Post::factory()->create();

        $this->actingAs(User::factory()->create());

        $post->load('likes.author');

        $this->assertFalse($post->isLiked());
    }
}
