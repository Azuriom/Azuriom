@extends('admin.layouts.admin')

@section('title', trans('admin.roles.title-create'))

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admin.roles.store') }}" method="POST">

                @include('admin.roles._form')

                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> {{ trans('admin.actions.save') }}</button>
            </form>
        </div>
    </div>
@endsection
