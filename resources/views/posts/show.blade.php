@extends('layouts.app')

@section('title', $currentPost->title)

@section('scripts')
    @parent
    <script src="{{ asset('assets/js/script.js') }}" defer></script>
@endsection

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
        <p>Posted on {{ $currentPost->created_at }}</p>
        <hr>

        <div class="content-body">
            {!! $currentPost->content !!}
        </div>

        <hr>

        <div class="card my-4">
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

        @foreach($currentPost->comments as $comment)
            <div class="media mb-4">
                <img class="d-flex mr-3 rounded-circle" src="https://placehold.it/50x50" alt="">
                <div class="media-body">
                    <h5 class="mt-0">{{ $comment->author->name }}</h5>
                    <div class="content-body">
                        {{ $comment->content }}
                    </div>
                    @auth
                        @if($comment->isAuthor(Auth::user()))
                            <a class="btn btn-sm btn-danger mt-1" href="{{ route('posts.comments.destroy', [$currentPost, $comment]) }}" data-confirm="delete">Delete</a>
                        @endif
                    @endauth
                </div>
            </div>
        @endforeach
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
