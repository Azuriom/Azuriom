@extends('layouts.app')

@section('title', $currentPost->title)

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

        {!! $currentPost->content !!}
    </div>
@endsection
