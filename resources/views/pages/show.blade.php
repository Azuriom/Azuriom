@extends('layouts.app')

@section('title', $page->title)
@section('description', $page->description)

@section('content')
    <div class="container content">
        <div class="card shadow-sm">
            <div class="card-body">
                <h1>{{ $page->title }}</h1>

                {!! $page->content !!}
            </div>
        </div>
    </div>
@endsection
