@extends('admin.layouts.admin')

@section('title', trans('admin.navbar_elements.edit', ['element' => $navbarElement->id]))

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admin.navbar-elements.update', $navbarElement) }}" method="POST" v-scope="{ type: '{{ $navbarElement->type }}' }">
                @method('PUT')

                @include('admin.navbar-elements._form')

                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> {{ trans('messages.actions.save') }}
                </button>
                <a href="{{ route('admin.navbar-elements.destroy', $navbarElement) }}" class="btn btn-danger" data-confirm="delete">
                    <i class="bi bi-trash"></i> {{ trans('messages.actions.delete') }}
                </a>
            </form>
        </div>
    </div>
@endsection
