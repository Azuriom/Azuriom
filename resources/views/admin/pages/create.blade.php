@extends('admin.layouts.admin')

@section('title', 'Create page')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admin.pages.store') }}" method="POST">

                @include('admin.pages._form')

                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
@endsection
