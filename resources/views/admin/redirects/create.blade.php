@extends('admin.layouts.admin')

@section('title', trans('admin.redirects.title-create'))

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admin.redirects.store') }}" method="POST">
                <input type="hidden" name="pending_id" value="{{ $pendingId }}">

                @include('admin.redirects._form')

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> {{ trans('messages.actions.save') }}
                </button>
            </form>
        </div>
    </div>
@endsection
