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
    <div class="container">
        @if(!$currentPost->isPublished())
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                This news is not published yet !
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <h1>{{ $currentPost->title }}</h1>
        <p class="lead">by {{ $currentPost->author->name }}</p>
        <p>Posted on {{ $currentPost->published_at }}</p>
        <hr>

        @if($currentPost->image_id !== null)
            <div class="text-center">
                <img class="rounded" src="{{ $currentPost->image->url() }}" alt="{{ $currentPost->image->name }}" height="300">
            </div>
        @endif

        <div class="content-body">
            {!! $currentPost->content !!}
        </div>

        <hr>

        <form class="mb-4" @auth action="{{ route('posts.likes.' . (!$currentPost->hasLiked(Auth::user()) ? 'add' : 'remove'), $currentPost) }}" method="POST" @endauth>
            @csrf
            <button class="btn btn-primary @guest disabled @elseif($currentPost->hasLiked(Auth::user())) active @endguest" @guest disabled @endguest type="submit">
                Likes: {{ $currentPost->likes->count() }}
            </button>
        </form>

        @foreach($currentPost->comments as $comment)
            <div class="media mb-4">
                <img class="d-flex mr-3 rounded-circle" src="https://placehold.it/50x50" alt="">
                <div class="media-body">
                    <h5 class="mt-0">{{ $comment->author->name }}</h5>
                    <div class="content-body">
                        {{ $comment->content }}
                    </div>
                    @can('delete', $comment)
                        <a class="btn btn-sm btn-danger mt-1" href="{{ route('posts.comments.destroy', [$currentPost, $comment]) }}" data-confirm="delete">Delete</a>
                    @endif
                </div>
            </div>
        @endforeach

        @can('create', \Azuriom\Models\Comment::class)
            <div class="card mt-4">
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
