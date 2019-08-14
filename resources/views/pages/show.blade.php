@extends('layouts.app')

@section('title', $page->title)

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1>{{ $page->title }}</h1>
                <hr>

                {!! $page->content !!}
            </div>
        </div>
    </div>
@endsection
