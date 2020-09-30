<?php

namespace Azuriom\Http\Controllers\Api;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Models\Post;

class RSSController extends Controller
{
    /**
     * Show the RSS feed for the posts.
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

        $xml .= '<rss version="2.0" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:content="http://purl.org/rss/1.0/modules/content/" xmlns:slash="http://purl.org/rss/1.0/modules/slash/">';

        $xml .= '<channel>';

        $xml .= '<title>'.site_name().'</title>';
        $xml .= '<link>'.route('home').'</link>';
        $xml .= '<language>'.app()->getLocale().'</language>';
        $xml .= '<description>'.setting('description', '').'</description>';

        if ($logo = site_logo()) {
            $xml .= '<image>';
            $xml .= '<title>'.site_name().'</title>';
            $xml .= '<url>'.$logo.'</url>';
            $xml .= '<link>'.route('home').'</link>';
            $xml .= '</image>';
        }

        foreach ($posts as $post) {
            $xml .= '<item>';
            $xml .= '<title>'.$post->title.'</title>';

            if ($post->hasImage()) {
                $xml .= '<content:encoded>'.e("<img src=\"{$post->imageUrl()}\" alt=\"{$post->title}\"><br>{$post->content}").'</content:encoded>';
            } else {
                $xml .= '<content:encoded>'.e($post->content).'</content:encoded>';
            }

            $xml .= '<link>'.route('posts.show', $post).'</link>';
            $xml .= '<pubDate>'.$post->published_at->toRssString().'</pubDate>';
            $xml .= '<dc:creator>'.$post->author->name.'</dc:creator>';
            $xml .= '<slash:comments>'.$post->comments()->count().'</slash:comments>';
            $xml .= '</item>';
        }

        $xml .= '</channel>';
        $xml .= '</rss>';

        return response($xml)->header('Content-Type', 'application/xml');
    }
}
