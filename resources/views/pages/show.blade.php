@extends('layouts.app')

@section('title', $page->title)
@section('description', $page->description)

@section('content')
    <h1>{{ $page->title }}</h1>

    <div class="card">
        <div class="card-body">
            {!! $page->content !!}
        </div>
    </div>
@endsection
