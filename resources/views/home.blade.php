@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="home-background mb-4" style="background: url(https://via.placeholder.com/2000x500) no-repeat center">

    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                @foreach($posts as $post)
                    <div class="post-preview card mb-3 shadow-sm">
                        <img src="https://via.placeholder.com/750x300" class="bd-placeholder-img card-img-top">
                        <div class="card-body">
                            <h3 class="card-title">
                                <a href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a></h3>
                            <p class="card-text">{{ Str::limit(strip_tags($post->content), 250, '...') }}</p>
                            <a class="btn btn-primary" href="{{ route('posts.show', $post->slug) }}">Read more</a>
                        </div>
                        <div class="card-footer text-muted">
                            {{ trans('messages.posts.posted', [
                                'date' => $post->published_at,
                                'user' => $post->author->name
                            ]) }}
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="col-md-4">
                <iframe src="https://discordapp.com/widget?id=613443499031003177&theme=dark" height="500" class="discord-widget mb-3" allowtransparency="true"></iframe>

                <a class="twitter-timeline" data-theme="dark" data-height="500" href="https://twitter.com/LaravelPHP">Tweets by Laravel</a>
                <script async src="https://platform.twitter.com/widgets.js"></script>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .home-background {
            background-size: cover;
            height: 500px;
        }

        .discord-widget {
            border: none;
            width: 100%;
        }
    </style>
@endpush
