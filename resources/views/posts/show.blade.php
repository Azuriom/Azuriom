@extends('layouts.app')

@section('title', $post->title)
@section('description', $post->description)
@section('type', 'article')

@push('meta')
    <meta property="og:article:author:username" content="{{ $post->author->name }}">
    <meta property="og:article:published_time" content="{{ $post->published_at->toIso8601String() }}">
    <meta property="og:article:modified_time" content="{{ $post->updated_at->toIso8601String() }}">
@endpush

@push('scripts')
    <script src="{{ asset('assets/js/script.js') }}" defer></script>
@endpush

@section('content')
    <div class="container content post">
        @if(!$post->isPublished())
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                {{ trans('posts.not-published') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <h1 class="card-title">{{ $post->title }}</h1>

                @if($post->hasImage())
                    <img class="img-fluid rounded mx-auto mb-2" src="{{ $post->imageUrl() }}" alt="{{ $post->title }}">
                @endif

                <div class="card-text">
                    {!! $post->content !!}
                </div>

                <hr>

                <div class="d-flex justify-content-between align-items-center">
                    <button type="button" class="btn btn-primary @if($post->isLiked()) active @endif" @guest disabled @endguest data-like-url="{{ route('posts.like', $post) }}">
                        @lang('messages.likes', ['likes' => '<span class="likes-count">'.$post->likes->count().'</span>'])
                        <span class="d-none spinner-border spinner-border-sm like-spinner"></span>
                    </button>

                    <span>{{ trans('messages.posts.posted', ['date' => format_date($post->published_at), 'user' => $post->author->name]) }}</span>
                </div>
            </div>
        </div>

        @foreach($post->comments as $comment)
            <div class="card shadow-sm mb-3">
                <div class="card-header">
                    {{ trans('messages.comments.author', ['user' => $comment->author->name, 'date' => format_date($comment->created_at, true)]) }}
                </div>
                <div class="card-body media">
                    <img class="d-flex mr-3 rounded" src="{{ game()->getAvatarUrl(Auth::user(), 64) }}" alt="{{ Auth::user()->name }}" height="55">
                    <div class="media-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="content-body">
                                {{ $comment->content }}
                            </div>
                            @can('delete', $comment)
                                <a class="btn btn-danger" href="{{ route('posts.comments.destroy', [$post, $comment]) }}" data-confirm="delete">{{ trans('messages.actions.delete') }}</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        @can('create', \Azuriom\Models\Comment::class)
            <div class="card mt-4 shadow-sm">
                <div class="card-header">
                    <span class="h5">{{ trans('messages.comments.create') }}</span>
                </div>
                <div class="card-body">
                    <form action="{{ route('posts.comments.store', $post) }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="content">{{ trans('messages.comments.your-comment') }}</label>
                            <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="4" required></textarea>

                            @error('content')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">{{ trans('messages.actions.save') }}</button>
                    </form>
                </div>
            </div>
        @endcan

        @guest
            <div class="alert alert-info">
                {{ trans('messages.comments.guest') }}
            </div>
        @endguest
    </div>

    <!-- Delete confirm modal -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="confirmDeleteLabel">{{ trans('messages.comments.delete-title') }}</h2>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">{{ trans('messages.comments.delete-description') }}</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">{{ trans('messages.actions.cancel') }}</button>

                    <form id="confirmDeleteForm" method="POST">
                        @method('DELETE')
                        @csrf

                        <button class="btn btn-danger" type="submit">{{ trans('messages.actions.delete') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
