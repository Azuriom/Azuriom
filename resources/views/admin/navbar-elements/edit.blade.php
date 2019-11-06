@extends('admin.layouts.admin')

@section('title', 'Edit navbar element #'.$navbarElement->id)

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admin.navbar-elements.update', $navbarElement) }}" method="POST">
                @method('PUT')

                @include('admin.navbar-elements._form')

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('admin.navbar-elements.destroy', $navbarElement) }}" class="btn btn-danger" data-confirm="delete">Delete</a>
            </form>
        </div>
    </div>
@endsection
