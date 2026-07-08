<?php

namespace Tests\Feature;

use Azuriom\Models\Comment;
use Azuriom\Models\Post;
use Azuriom\Models\Role;
use Azuriom\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostInteractionVisibilityTest extends TestCase
{
    use RefreshDatabase;

    public function test_future_post_cannot_be_liked_by_id(): void
    {
        $post = Post::factory()->create([
            'published_at' => now()->addDay(),
        ]);
        $user = $this->userAllowedToComment();

        $response = $this->actingAs($user)->post("/news/{$post->id}/like");

        $response->assertNotFound();
        $this->assertDatabaseCount('likes', 0);
        $this->assertDatabaseCount('comments', 0);
    }

    public function test_future_post_cannot_be_unliked_by_id(): void
    {
        $post = Post::factory()->create([
            'published_at' => now()->addDay(),
        ]);
        $user = $this->userAllowedToComment();

        $response = $this->actingAs($user)->delete("/news/{$post->id}/like");

        $response->assertNotFound();
        $this->assertDatabaseCount('likes', 0);
        $this->assertDatabaseCount('comments', 0);
    }

    public function test_future_post_cannot_be_commented_on_by_id(): void
    {
        $post = Post::factory()->create([
            'published_at' => now()->addDay(),
        ]);
        $user = $this->userAllowedToComment();

        $response = $this->actingAs($user)->post("/posts/{$post->id}/comments", [
            'content' => 'This unpublished post should not accept comments.',
        ]);

        $response->assertNotFound();
        $this->assertDatabaseCount('likes', 0);
        $this->assertDatabaseCount('comments', 0);
    }

    public function test_future_post_invalid_comment_payload_is_hidden_before_validation(): void
    {
        $post = Post::factory()->create([
            'published_at' => now()->addDay(),
        ]);
        $user = $this->userAllowedToComment();

        $response = $this->actingAs($user)->post("/posts/{$post->id}/comments", [
            'content' => '',
        ]);

        $response->assertNotFound();
        $this->assertDatabaseCount('comments', 0);
    }

    public function test_future_post_comment_cannot_be_deleted_by_id(): void
    {
        $post = Post::factory()->create([
            'published_at' => now()->addDay(),
        ]);
        $user = $this->userAllowedToComment();
        $comment = Comment::factory()->create([
            'post_id' => $post->id,
            'author_id' => $user->id,
            'content' => 'This unpublished post comment should remain.',
        ]);

        $response = $this->actingAs($user)->delete("/posts/{$post->id}/comments/{$comment->id}");

        $response->assertNotFound();
        $this->assertDatabaseHas('comments', [
            'id' => $comment->id,
            'post_id' => $post->id,
            'author_id' => $user->id,
            'content' => 'This unpublished post comment should remain.',
        ]);
    }

    public function test_future_post_delete_route_cannot_target_comment_from_visible_post(): void
    {
        $futurePost = Post::factory()->create([
            'published_at' => now()->addDay(),
        ]);
        $publishedPost = Post::factory()->create([
            'published_at' => now()->subDay(),
        ]);
        $user = $this->userAllowedToComment();
        $comment = Comment::factory()->create([
            'post_id' => $publishedPost->id,
            'author_id' => $user->id,
            'content' => 'This visible post comment should remain scoped to its post.',
        ]);

        $response = $this->actingAs($user)->delete("/posts/{$futurePost->id}/comments/{$comment->id}");

        $response->assertNotFound();
        $this->assertDatabaseHas('comments', [
            'id' => $comment->id,
            'post_id' => $publishedPost->id,
            'author_id' => $user->id,
            'content' => 'This visible post comment should remain scoped to its post.',
        ]);
    }

    public function test_future_post_comment_cannot_be_deleted_by_non_owner_without_delete_other_permission(): void
    {
        $post = Post::factory()->create([
            'published_at' => now()->addDay(),
        ]);
        $commentAuthor = User::factory()->create();
        $user = $this->userAllowedToComment();
        $comment = Comment::factory()->create([
            'post_id' => $post->id,
            'author_id' => $commentAuthor->id,
            'content' => 'This unpublished post comment by another user should remain.',
        ]);

        $response = $this->actingAs($user)->delete("/posts/{$post->id}/comments/{$comment->id}");

        $response->assertNotFound();
        $this->assertDatabaseHas('comments', [
            'id' => $comment->id,
            'post_id' => $post->id,
            'author_id' => $commentAuthor->id,
            'content' => 'This unpublished post comment by another user should remain.',
        ]);
    }

    public function test_published_post_can_still_be_liked_and_commented_on(): void
    {
        $post = Post::factory()->create([
            'published_at' => now()->subDay(),
        ]);
        $user = $this->userAllowedToComment();

        $likeResponse = $this->actingAs($user)->post("/news/{$post->id}/like");

        $likeResponse->assertRedirect();
        $this->assertDatabaseHas('likes', [
            'post_id' => $post->id,
            'author_id' => $user->id,
        ]);

        $commentResponse = $this->post("/posts/{$post->id}/comments", [
            'content' => 'This published post accepts comments.',
        ]);

        $commentResponse->assertRedirect();
        $this->assertDatabaseHas('comments', [
            'post_id' => $post->id,
            'author_id' => $user->id,
            'content' => 'This published post accepts comments.',
        ]);
    }

    public function test_published_post_comment_can_be_deleted_by_author(): void
    {
        $post = Post::factory()->create([
            'published_at' => now()->subDay(),
        ]);
        $user = $this->userAllowedToComment();
        $comment = Comment::factory()->create([
            'post_id' => $post->id,
            'author_id' => $user->id,
            'content' => 'This published post comment can be deleted by its author.',
        ]);

        $response = $this->actingAs($user)->delete("/posts/{$post->id}/comments/{$comment->id}");

        $response->assertRedirect();
        $this->assertDatabaseMissing('comments', [
            'id' => $comment->id,
        ]);
    }

    private function userAllowedToComment(): User
    {
        $role = Role::factory()->create([
            'color' => 'ffffff',
        ]);
        $role->syncPermissions(['comments.create']);

        return User::factory()->for($role)->create();
    }
}
