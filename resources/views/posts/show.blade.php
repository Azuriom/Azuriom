@extends('layouts.app')

@section('title', $currentPost->title)

@section('content')
    <div class="container">
        <h1>{{ $currentPost->title }}</h1>
        <p class="lead">by {{ $currentPost->author->name }}</p>
        <p>Posted on {{ $currentPost->created_at }}</p>
        <hr>

        {{ $currentPost->content }}
    </div>
@endsection
