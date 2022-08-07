@extends('layouts.app')

@section('title', $post->title)
@section('description', $post->description)
@section('type', 'article')

@push('meta')
<meta property="og:article:author:username" content="{{ $post->author->name }}">
<meta property="og:article:published_time" content="{{ $post->published_at->toIso8601String() }}">
<meta property="og:article:modified_time" content="{{ $post->updated_at->toIso8601String() }}">
@endpush

@section('content')
    @if(!$post->isPublished())
        <div class="alert alert-info" role="alert">
            <i class="bi bi-info-circle"></i> {{ trans('messages.posts.unpublished') }}
        </div>
    @endif

    <h1>{{ $post->title }}</h1>

    @if($post->hasImage())
        <img class="img-fluid rounded mb-3" src="{{ $post->imageUrl() }}" alt="{{ $post->title }}">
    @endif

    <div class="card mb-4">
        <div class="card-body">
            <div class="card-text">
                {!! $post->content !!}
            </div>

            <hr>

            <div class="d-md-flex justify-content-between align-items-center">
                <button type="button" class="btn btn-primary @if($post->isLiked()) active @endif mb-3" @guest disabled @endguest data-like-url="{{ route('posts.like', $post) }}">
                    <i class="bi bi-heart"></i>
                    @lang('messages.likes', ['count' => '<span class="likes-count">'.$post->likes->count().'</span>'])
                    <span class="d-none spinner-border spinner-border-sm load-spinner" role="status"></span>
                </button>

                <p class="d-md-inline-block">
                    {{ trans('messages.posts.posted', ['date' => format_date($post->published_at), 'user' => $post->author->name]) }}
                </p>
            </div>
        </div>
    </div>

    <section id="comments">
        @foreach($post->comments as $comment)
            <div class="card mb-3">
                <div class="card-body d-flex">
                    <div class="flex-shrink-0">
                        <img class="me-3 rounded" src="{{ $comment->author->getAvatar() }}" alt="{{ $comment->author->name }}" width="64">
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="content-body">
                                {{ $comment->parseContent() }}

                                <p class="card-text text-muted">
                                    @lang('messages.comments.author', ['user' => e($comment->author->name), 'date' => format_date($comment->created_at, true)])
                                </p>
                            </div>

                            @can('delete', $comment)
                                <a class="btn btn-danger" href="{{ route('posts.comments.destroy', [$post, $comment]) }}" data-confirm="delete" title="{{ trans('messages.actions.delete') }}">
                                    <i class="bi bi-trash"></i>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </section>

    @can('create', \Azuriom\Models\Comment::class)
        <div class="card mt-4">
            <div class="card-body">
                <h3 class="card-title">
                    {{ trans('messages.comments.create') }}
                </h3>

                <form action="{{ route('posts.comments.store', $post) }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label" for="content">{{ trans('messages.comments.content') }}</label>
                        <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="4" required></textarea>

                        @error('content')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-chat"></i> {{ trans('messages.actions.comment') }}
                    </button>
                </form>
            </div>
        </div>
    @endcan

    @guest
        <div class="alert alert-info" role="alert">
            {{ trans('messages.comments.guest') }}
        </div>
    @endguest
</div>

<!-- Delete confirm modal -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="confirmDeleteLabel">{{ trans('messages.comments.delete') }}</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">{{ trans('messages.comments.delete_confirm') }}</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">{{ trans('messages.actions.cancel') }}</button>

                <form id="confirmDeleteForm" method="POST">
                    @method('DELETE')
                    @csrf

                    <button class="btn btn-danger" type="submit">{{ trans('messages.actions.delete') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
