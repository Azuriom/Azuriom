<?php

namespace Azuriom\Http\Controllers\Admin;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Http\Requests\PostRequest;
use Azuriom\Models\Post;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::with('author')->paginate(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.posts.create', [
            'pendingId' => old('pending_id', Str::uuid()),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $post = Post::create(Arr::except($request->validated(), 'image'));

        if ($request->hasFile('image')) {
            $post->storeImage($request->file('image'), true);
        }

        $post->persistPendingAttachments($request->input('pending_id'));

        if ($post->isPublished() && ($webhookUrl = setting('posts_webhook'))) {
            rescue(fn () => $post->createDiscordWebhook()->send($webhookUrl));
        }

        return to_route('admin.posts.index')
            ->with('success', trans('messages.status.success'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post)
    {
        if ($request->hasFile('image')) {
            $post->storeImage($request->file('image'));
        }

        $post->update(Arr::except($request->validated(), 'image'));

        return to_route('admin.posts.index')
            ->with('success', trans('messages.status.success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @throws \LogicException
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return to_route('admin.posts.index')
            ->with('success', trans('messages.status.success'));
    }
}
