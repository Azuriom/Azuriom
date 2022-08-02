@extends('layouts.base')

@section('title', trans('messages.home'))

@section('app')
    <div class="home-background d-flex align-items-center justify-content-center flex-column text-white mb-4" style="background: url('{{ setting('background') ? image_url(setting('background')) : 'https://via.placeholder.com/2000x500' }}') center / cover no-repeat; height: 500px">
        <h1>{{ trans('messages.welcome', ['name' => site_name()]) }}</h1>

        @if($server)
            @if($server->isOnline())
                <h2>{{ trans_choice('messages.server.online', $server->getOnlinePlayers()) }}</h2>
            @else
                <h2>{{ trans('messages.server.offline') }}</h2>
            @endif

            @if($server->joinUrl())
                <a href="{{ $server->joinUrl() }}" class="btn btn-secondary btn-lg">
                    {{ trans('messages.server.join') }}
                </a>
            @else
                <h3>{{ $server->fullAddress() }}</h3>
            @endif
        @endif
    </div>

    <div class="container content">
        @include('elements.session-alerts')

        @if($message)
            <div class="card mb-4">
                <div class="card-body">
                    {{ $message }}
                </div>
            </div>
        @endif

        @if(! $servers->isEmpty())
            <h2 class="text-center">
                {{ trans('messages.servers') }}
            </h2>

            <div class="row gy-3 justify-content-center mb-4">
                @foreach($servers as $server)
                    <div class="col-md-4">
                        <div class="card h-100">
                            <div class="card-body text-center">
                                <h3 class="card-title">
                                    {{ $server->name }}
                                </h3>

                                @if($server->isOnline())
                                    <div class="progress mb-1">
                                        <div class="progress-bar" role="progressbar" style="width: {{ $server->getPlayersPercents() }}%">
                                        </div>
                                    </div>

                                    <p class="mb-1">
                                        {{ trans_choice('messages.server.total', $server->getOnlinePlayers(), [
                                            'max' => $server->getMaxPlayers(),
                                        ]) }}
                                    </p>
                                @else
                                    <p>
                                        <span class="badge bg-danger text-white">
                                            {{ trans('messages.server.offline') }}
                                        </span>
                                    </p>
                                @endif

                                @if($server->joinUrl())
                                    <a href="{{ $server->joinUrl() }}" class="btn btn-primary">
                                        {{ trans('messages.server.join') }}
                                    </a>
                                @else
                                    <p class="card-text">{{ $server->fullAddress() }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        @if(! $posts->isEmpty())
            <h2 class="text-center">
                {{ trans('messages.news') }}
            </h2>

            <div class="row gy-3">
                @foreach($posts as $post)
                    <div class="col-md-6">
                        <div class="post-preview card">
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
        @endif
    </div>
@endsection
