@extends('layouts.app')

@section('title', 'News')

@section('content')
    <div class="container">
        <h1>News</h1>

        @foreach($posts as $post)
            <div class="card mb-4">
                <div class="card-body">
                    @if($post->image !== null)
                        <div class="text-center">
                            <img class="rounded" src="{{ $post->image->url() }}" alt="{{ $post->image->name }}" height="300">
                        </div>
                    @endif
                    <h2 class="card-title">{{ $post->title }}</h2>
                    <p class="card-text">{!! $post->content !!}</p>
                    <a href="{{ route('posts.show', $post->slug) }}" class="btn btn-primary">Lire la suite</a>
                </div>
                <div class="card-footer text-muted">Posted on {{ $post->published_at }} by {{ $post->author->name }} @if($post->is_pinned) - Pinned @endif</div>
            </div>
        @endforeach
    </div>
@endsection
