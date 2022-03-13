@extends('admin.layouts.admin')

@section('title', trans('admin.navbar_elements.create'))

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admin.navbar-elements.store') }}" method="POST" v-scope="{ type: '' }">

                @include('admin.navbar-elements._form')

                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> {{ trans('messages.actions.save') }}
                </button>
            </form>
        </div>
    </div>
@endsection
