@extends('admin.layouts.admin')

@section('title', 'Create navbar element')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admin.navbar-elements.store') }}" method="POST">

                @include('admin.navbar-elements._form')

                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
@endsection
