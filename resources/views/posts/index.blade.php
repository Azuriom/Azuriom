@extends('layouts.app')

@section('title', trans('messages.posts.posts'))

@section('content')
    <div class="container content">
        <div class="row">
            @foreach($posts as $post)
                <div class="col-md-6">
                    <div class="post-preview card my-2 shadow-sm">
                        @if($post->image !== null)
                            <img src="{{ $post->imageUrl() }}" class="bd-placeholder-img card-img-top" alt="{{ $post->title }}" height="300">
                        @endif
                        <div class="card-body">
                            <h3 class="card-title">
                                <a href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a></h3>
                            <p class="card-text">{{ Str::limit(strip_tags($post->content), 250, '...') }}</p>
                            <a class="btn btn-primary" href="{{ route('posts.show', $post->slug) }}">{{ trans('messages.posts.read') }}</a>
                        </div>
                        <div class="card-footer text-muted">
                            {{ trans('messages.posts.posted', [
                                'date' => $post->published_at,
                                'user' => $post->author->name
                            ]) }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
