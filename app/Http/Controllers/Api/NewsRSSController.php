<?php

Azuriom\Http\Controllers\Api;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Models\Post;

class NewsRSSController extends Controller
{
    /**
     * Show the plugin API default page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::published()
            ->with('author')
            ->latest('published_at')
            ->take(6)
            ->get();

        $xml = '<?xml version="1.0" encoding="utf-8"?>';

        $xml .= '<rss version="2.0">';

        $xml .= '<channel>';

        $xml .= '<title>'.site_name().'</title>';
        $xml .= '<link>'.route('home').'</link>';
        $xml .= '<language>'.setting('locale').'</language>';
        $xml .= '<description>'.setting('description', '').'</description>';
        $xml .= '<webMaster>'.setting('mail.from.address').'</webMaster>';

        $xml .= '<image>';
        $xml .= ' <title>'.site_name().'</title>';
        $xml .= .'<url>'.image_url(setting('logo')).'</url>';
        $xml .= '<link>'.route('home').'</link>';
        $xml .= '</image>';

        foreach ($posts as $post) {
            $xml .= '<item>';
            $xml .= '<title>{$post->title}</title>';
            if ($post->hasImage()) {
                $xml .= '<image>{$post->imageUrl()}</image>';
            } else {
                $xml .= '<image></image>';
            }

            $xml .= '<link>'.route('posts.show', $post).'</link>';
            $xml .= '<content>{$post->content}</content>';
            $xml .= '<pubDate>{$post->published_at}</pubDate>';
            $xml .= '<author>{$post->author->name}</author>';
            $xml .= '<comments>'.count($post->comments).'</comments>';
            $xml .= '</item>';
        }

        $xml .= '</channel>';
        $xml .= '</rss>';

        return response($xml, 200)
            ->header('Content-Type', 'application/xml');
    }
}
