@extends('layouts.app')

@section('title', $currentPost->title)
@section('description', $currentPost->description)
@section('type', 'article')

@push('meta')
    <meta property="og:article:author:username" content="{{ $currentPost->author->name }}">
    <meta property="og:article:published_time" content="{{ $currentPost->published_at->toIso8601String() }}">
    <meta property="og:article:modified_time" content="{{ $currentPost->updated_at->toIso8601String() }}">
@endpush

@push('scripts')
    <script src="{{ asset('assets/js/script.js') }}" defer></script>
@endpush

@section('content')
    <div class="container content post">
        @if(!$currentPost->isPublished())
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                This post is not published yet !
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <h1 class="card-title">{{ $currentPost->title }}</h1>

                @if($currentPost->image !== null)
                    <div class="text-center">
                        <img class="rounded" src="{{ $currentPost->imageUrl() }}" alt="{{ $currentPost->title }}" height="300">
                    </div>
                @endif

                <div class="card-text">
                    {!! $currentPost->content !!}
                </div>

                <hr>

                <div class="d-flex justify-content-between align-items-center">
                    @auth
                        <form action="{{ route('posts.likes.' . (!$currentPost->hasLiked() ? 'add' : 'remove'), $currentPost) }}" method="POST">
                            @csrf
                            <button class="btn btn-primary @if($currentPost->hasLiked()) active @endif" type="submit">
                                Likes: {{ $currentPost->likes->count() }}
                            </button>
                        </form>
                    @else
                        <button class="btn btn-primary" disabled>
                            Likes: {{ $currentPost->likes->count() }}
                        </button>
                    @endauth

                    <span>Posted by {{ $currentPost->author->name }} on {{ $currentPost->published_at }}</span>
                </div>
            </div>
        </div>

        @foreach($currentPost->comments as $comment)
            <div class="card shadow-sm mb-3">
                <div class="card-header">
                    {{ $comment->author->name }}<span class="text-muted"> on {{ $comment->created_at }}</span>
                </div>
                <div class="card-body media">
                    <img class="d-flex mr-3 rounded-circle" src="https://placehold.it/50x50" alt="">
                    <div class="media-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="content-body">
                                {{ $comment->content }}
                            </div>
                            @can('delete', $comment)
                                <a class="btn btn-danger" href="{{ route('posts.comments.destroy', [$currentPost, $comment]) }}" data-confirm="delete">Delete</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        @can('create', \Azuriom\Models\Comment::class)
            <div class="card mt-4 shadow-sm">
                <div class="card-header">
                    <span class="h5">Leave a comment</span>
                </div>
                <div class="card-body">
                    <form action="{{ route('posts.comments.store', $currentPost) }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="content">Your comment</label>
                            <textarea class="form-control" id="content" name="content" rows="4"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        @endcan
    </div>

    <!-- Delete confirm modal -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="confirmDeleteLabel">Delete ?</h2>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Are you sure you want to delete this ?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary d-inline-block" type="button" data-dismiss="modal">Cancel</button>
                    <form id="confirmDeleteForm" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-primary" type="submit">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
