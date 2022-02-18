@extends('layouts.base')

@section('title', trans('messages.home'))

@section('app')
    <div class="home-background d-flex align-items-center justify-content-center flex-column text-white mb-4" style="background: url('{{ setting('background') ? image_url(setting('background')) : 'https://via.placeholder.com/2000x500' }}') center / cover no-repeat">
        <h1 class="mb-4">{{ trans('messages.welcome', ['name' => site_name()]) }}</h1>

        @if($server && $server->isOnline())
            <h2 class="mb-4">{{ trans_choice('messages.server.online', $server->getOnlinePlayers()) }}</h2>

            <h3>{{ $server->fullAddress() }}</h3>
        @else
            <h2>{{ trans('messages.server.offline') }}</h2>
        @endif
    </div>

    <div class="container content">
        @if($message)
            <p class="text-center">{{ $message }}</p>
        @endif

        <div class="row">
            @foreach($posts as $post)
                <div class="col-md-6">
                    <div class="post-preview card mb-3 shadow-sm">
                        @if($post->hasImage())
                            <img src="{{ $post->imageUrl() }}" alt="{{ $post->title }}" class="card-img-top">
                        @endif
                        <div class="card-body">
                            <h3 class="card-title">
                                <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></h3>
                            <p class="card-text">{{ Str::limit(strip_tags($post->content), 250) }}</p>
                            <a class="btn btn-primary" href="{{ route('posts.show', $post) }}">{{ trans('messages.posts.read') }}</a>
                        </div>
                        <div class="card-footer text-muted">
                            {{ trans('messages.posts.posted', ['date' => format_date($post->published_at), 'user' => $post->author->name]) }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .home-background {
            height: 500px;
        }

        .discord-widget {
            border: none;
            width: 100%;
        }
    </style>
@endpush
