@extends('admin.layouts.admin')

@section('title', 'Create role')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admin.roles.store') }}" method="POST">

                @include('admin.roles._form')

                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
@endsection
