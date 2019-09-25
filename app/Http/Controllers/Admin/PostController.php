<?php

namespace Azuriom\Http\Controllers\Admin;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Models\ActionLog;
use Azuriom\Models\Image;
use Azuriom\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rule;

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->rules());

        request_checkbox($request, 'is_pinned');

        $post = new Post($request->all());
        $post->author_id = $request->user()->id;
        $post->save();

        ActionLog::logCreate($post);

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
     * @param  \Illuminate\Http\Request  $request
     * @param  \Azuriom\Models\Post  $post
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Post $post)
    {
        $this->validate($request, $this->rules($post));

        request_checkbox($request, 'is_pinned');

        $post->update($request->all());

        ActionLog::logEdit($post);

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

        ActionLog::logDelete($post);

        return redirect()->route('admin.posts.index')->with('success', 'Post deleted');
    }

    private function rules($post = null)
    {
        return [
            'title' => ['required', 'string', 'max:150'],
            'description' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:100', 'alpha_dash', Rule::unique('posts')->ignore($post, 'slug')],
            'image_id' => ['nullable', 'exists:images,id'],
            'content' => ['required', 'string'],
            'published_at' => ['required', 'date']
        ];
    }

    private function getImagesUrl(Collection $images)
    {
        return $images->mapWithKeys(function ($image) {
            return [$image->id => $image->url()];
        })->toArray();
    }
}
