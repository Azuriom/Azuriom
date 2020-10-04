<?php

namespace Azuriom\Http\Controllers\Api;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Models\Post;

class FeedController extends Controller
{
    /**
     * Show the RSS feed for the posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function rss()
    {
        return response()->view('feed.rss', ['posts' => $this->getRecentPosts()])
            ->header('Content-Type', 'application/xml');
    }

    /**
     * Show the Atom feed for the posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function atom()
    {
        return response()->view('feed.atom', ['posts' => $this->getRecentPosts()])
            ->header('Content-Type', 'application/xml');
    }

    protected function getRecentPosts()
    {
        return Post::published()
            ->with(['author', 'comments'])
            ->latest('published_at')
            ->take(10)
            ->get();
    }
}
