@extends('layouts.app')

@section('title', $page->title)
@section('description', $page->description)

@section('content')
    <div class="container content">
        <div class="card shadow-sm">
            <div class="card-body">
                <h1>{{ $page->title }}</h1>

                <div class="card-text user-html-content">
                    {!! $page->content !!}
                </div>
            </div>
        </div>
    </div>
@endsection
