<?php

Azuriom\Http\Controllers\Api;

use Azuriom\Models\Post;
use Azuriom\Http\Controllers\Controller;

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

        $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>";

        $xml = $xml . "<rss version=\"2.0\">";

        $xml = $xml . "<channel>";

        $xml = $xml . "<title>" . site_name() . "</title>";
        $xml = $xml . "<link>" . route('home') . "</link>";
        $xml = $xml . "<language>" . setting('locale') . "</language>";
        $xml = $xml . "<description>" . setting('description', '') . "</description>";
        $xml = $xml . "<webMaster>" . setting('mail.from.address') . "</webMaster>";

        $xml = $xml . "<image>";
        $xml = $xml . " <title>" . site_name() . "</title>";
        $xml = $xml . "<url>" . image_url(setting('logo')) . "</url>";
        $xml = $xml . "<link>" . route('home') . "</link>";
        $xml = $xml . "</image>";

        foreach ($posts as $post){
            $xml = $xml . "<item>";
            $xml = $xml . "<title>" . $post->title . "</title>";
            if($post->hasImage()){
                $xml = $xml . "<image>" . $post->imageUrl() . "</image>";
            }else{
                $xml = $xml . "<image></image>";
            }

            $xml = $xml . "<link>" . route('posts.show', $post) . "</link>";
            $xml = $xml . "<content>" . $post->content . "</content>";
            $xml = $xml . "<pubDate>" . $post->published_at . "</pubDate>";
            $xml = $xml . "<author>" . $post->author->name . "</author>";
            $xml = $xml . "<comments>" . count($post->comments) . "</comments>";
            $xml = $xml . "</item>";
        }

        $xml = $xml . "</channel>";
        $xml = $xml . "</rss>";


        return response($xml, 200)
            ->header('Content-Type', 'application/xml');
    }
}
