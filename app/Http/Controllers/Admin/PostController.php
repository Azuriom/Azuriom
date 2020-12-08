<?php

namespace Azuriom\Http\Controllers\Admin;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Http\Requests\PostRequest;
use Azuriom\Models\Post;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::with('author')->paginate(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create', [
            'pendingId' => old('pending_id', Str::uuid()),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Azuriom\Http\Requests\PostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $post = new Post();

        $data = $request->validated();
        foreach ($data['translations'] as $index => $fields) {
            foreach ($fields as $key => $value) {
                if ($key !== 'locale') {
                    $post->setTranslation($key, $data['translations'][$index]['locale'], $value);
                }
            }
        }

        $post->published_at = $data['published_at'];
        $post->is_pinned = $data['is_pinned'];

        $post->save();

        if ($request->hasFile('image')) {
            $post->storeImage($request->file('image'), true);
        }

        $post->persistPendingAttachments($request->input('pending_id'));

        return redirect()->route('admin.posts.index')->with('success', trans('admin.posts.status.created'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Azuriom\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Azuriom\Http\Requests\PostRequest  $request
     * @param  \Azuriom\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        if ($request->hasFile('image')) {
            $post->storeImage($request->file('image'));
        }

        $data = $request->validated();
        foreach ($data['translations'] as $index => $fields) {
            foreach ($fields as $key => $value) {
                if ($key !== 'locale') {
                    $post->setTranslation($key, $data['translations'][$index]['locale'], $value);
                }
            }
        }

        $post->published_at = $data['published_at'];
        $post->is_pinned = $data['is_pinned'];

        $post->save();

        return redirect()->route('admin.posts.index')->with('success', trans('admin.posts.status.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Azuriom\Models\Post  $post
     * @return \Illuminate\Http\Response
     *
     * @throws \Exception
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', trans('admin.posts.status.deleted'));
    }
}
