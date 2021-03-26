@php echo '<?xml version="1.0" encoding="utf-8"?>' @endphp
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:content="http://purl.org/rss/1.0/modules/content/" xmlns:slash="http://purl.org/rss/1.0/modules/slash/">
    <channel>
        <title>{{ site_name() }}</title>
        <link>{{ route('home') }}</link>
        <language>{{ app()->getLocale() }}</language>
        <description>{{ setting('description', '') }}</description>

        <image>
            <title>{{ site_name() }}</title>
            <url>{{ site_logo() }}</url>
            <link>{{ route('home') }}</link>
        </image>

        <atom:link href="{{ route('feeds.rss') }}" rel="self" type="application/rss+xml"/>

        @foreach($posts as $post)
            <item>
                <title>{{ $post->title }}</title>
                <link>{{ route('posts.show', $post) }}</link>
                <guid>{{ route('posts.show', $post) }}</guid>
                <description>{{ $post->description }}</description>
                <pubDate>{{ $post->published_at->toRssString() }}</pubDate>

                @if($post->hasImage())
                    <enclosure url="{{ $post->imageUrl() }}" length="{{ $post->getImageSize() }}" type="image/*"/>
                @endif

                <content:encoded>{{ $post->content }}</content:encoded>
                <dc:creator>{{ $post->author->name }}</dc:creator>
                <slash:comments>{{ $post->comments->count() }}</slash:comments>
            </item>
        @endforeach
    </channel>
</rss>
