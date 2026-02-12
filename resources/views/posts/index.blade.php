@extends('layouts.app')

@section('title', trans('messages.posts.posts'))

@section('content')
    <h1>{{ trans('messages.posts.posts') }}</h1>

    <div class="col-md-3">
        <form class="mb-3" action="{{ route('posts.index') }}" method="GET" role="search">
            <label class="visually-hidden" for="searchInput">
                {{ trans('messages.actions.search') }}
            </label>

            <div class="input-group">
                <input type="search" class="form-control" id="searchInput" name="q" value="{{ $search ?? '' }}" placeholder="{{ trans('messages.actions.search') }}">

                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-search"></i>
                </button>
            </div>
        </form>
    </div>

    <div class="row gy-3">
        @foreach($posts as $post)
            <div class="col-md-6">
                <div class="post-preview card">
                    @if($post->hasImage())
                        <img src="{{ $post->imageUrl() }}" class="card-img-top" alt="{{ $post->title }}">
                    @endif
                    <div class="card-body">
                        <h3 class="card-title">
                            <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
                        </h3>
                        <p class="card-text">{{ Str::limit(strip_tags($post->content), 250) }}</p>
                        <a class="btn btn-primary" href="{{ route('posts.show', $post) }}">{{ trans('messages.posts.read') }}</a>
                    </div>
                    <div class="card-footer text-body-secondary">
                        {{ trans('messages.posts.posted', ['date' => format_date($post->published_at), 'user' => $post->author->name]) }}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
