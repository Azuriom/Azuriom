@extends('layouts.app')

@section('title', 'News')

@section('content')
    <div class="container">
        <h1>News</h1>

        <div class="row">
            @foreach($posts as $post)
                <div class="col-md-6">
                    <div class="post-preview card my-2 shadow-sm">
                        {{--                      @if($post->image !== null)
                                <div class="text-center">
                                    <img class="rounded" src="{{ $post->image->url() }}" alt="{{ $post->image->name }}" height="300">
                                </div>
                            @endif --}}
                        <img src="https://via.placeholder.com/750x300" class="bd-placeholder-img card-img-top">
                        <div class="card-body">
                            <h3 class="card-title">
                                <a href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a></h3>
                            <p class="card-text">{{ Str::limit(strip_tags($post->content), 250, '...') }}</p>
                            <a class="btn btn-primary" href="{{ route('posts.show', $post->slug) }}">Read more</a>
                        </div>
                        <div class="card-footer text-muted">
                            Posted on {{ $post->published_at }} by {{ $post->author->name }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
