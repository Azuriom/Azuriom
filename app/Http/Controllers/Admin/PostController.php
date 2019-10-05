<?php

namespace Azuriom\Http\Controllers\Admin;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Http\Requests\PostRequest;
use Azuriom\Models\Image;
use Azuriom\Models\Post;
use Illuminate\Support\Collection;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('author')->paginate(25);

        return view('admin.posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $images = Image::all();

        return view('admin.posts.create', [
            'images' => $images,
            'imagesUrl' => $this->getImagesUrl($images)
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
        request_checkbox($request, 'is_pinned');

        $post = new Post($request->all());
        $post->author_id = $request->user()->id;
        $post->save();

        return redirect()->route('admin.posts.index')->with('success', 'Post created');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Azuriom\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $post->loadMissing('image');
        $images = Image::all();

        return view('admin.posts.edit', [
            'currentPost' => $post,
            'images' => $images,
            'imagesUrl' => $this->getImagesUrl($images)
        ]);
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
        request_checkbox($request, 'is_pinned');

        $post->update($request->all());

        return redirect()->route('admin.posts.index')->with('success', 'Post updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Azuriom\Models\Post  $post
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', 'Post deleted');
    }

    private function getImagesUrl(Collection $images)
    {
        return $images->mapWithKeys(function ($image) {
            return [$image->id => $image->url()];
        })->toArray();
    }
}
