@php echo '<?xml version="1.0" encoding="utf-8"?>' @endphp
<feed xmlns="http://www.w3.org/2005/Atom">
    <id>{{ route('home') }}/</id>
    <title>{{ site_name() }}</title>
    <updated>{{ now()->toAtomString() }}</updated>
    <link href="{{ route('home') }}"/>

    @if($description = setting('description'))
        <subtitle>{{ $description }}</subtitle>
    @endif

    @if(favicon())
        <icon>{{ favicon() }}</icon>
    @endif

    @foreach($posts as $post)
        <entry>
            <id>{{ route('posts.show', $post) }}</id>
            <title>{{ $post->title }}</title>
            <content type="html">{{ $post->content }}</content>
            <summary>{{ $post->description }}</summary>
            <link href="{{ route('posts.show', $post) }}"/>
            <author>
                <name>{{ $post->author->name }}</name>
            </author>
            <updated>{{ $post->updated_at->toAtomString() }}</updated>
            <published>{{ $post->published_at->toAtomString() }}</published>
        </entry>
    @endforeach
</feed>
