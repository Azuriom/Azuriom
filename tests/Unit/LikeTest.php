<?php

namespace Tests\Unit;

use Azuriom\Models\Post;
use Azuriom\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LikeTest extends TestCase
{
    use RefreshDatabase;

    public function testIsLiked()
    {
        $post = factory(Post::class)->create();

        $this->actingAs(factory(User::class)->create());

        $post->likes()->create();

        $this->assertTrue($post->isLiked());
    }

    public function testIsNotLiked()
    {
        $post = factory(Post::class)->create();

        $this->actingAs(factory(User::class)->create());

        $this->assertFalse($post->isLiked());
    }

    public function testIsLikedWithExplicitUser()
    {
        $post = factory(Post::class)->create();

        $user = factory(User::class)->create();

        /** @var \Azuriom\Models\Like */
        $like = $post->likes()->make();

        $like->author()->associate($user)->save();

        $this->assertTrue($post->isLiked($user));
    }

    public function testIsLikedWithLoadedRelations()
    {
        $post = factory(Post::class)->create();

        $this->actingAs(factory(User::class)->create());

        $post->likes()->create();

        $post->load('likes.author');

        $this->assertTrue($post->isLiked());
    }
}
