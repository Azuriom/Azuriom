@extends('layouts.app')

@section('title', trans('messages.profile.delete.title'))

@section('content')
    <h1>{{ trans('messages.profile.delete.title') }}</h1>

    <div class="card">
        <div class="card-body">
            <p>{{ trans('messages.profile.delete.info') }}</p>

            @if($confirmDelete)
                <form method="POST">
                    @csrf

                    <a class="btn btn-secondary" href="{{ route('profile.index') }}">
                        <i class="bi bi-arrow-left"></i> {{ trans('messages.actions.cancel') }}
                    </a>

                    <button type="submit" class="btn btn-danger">
                        <i class="bi bi-exclamation-triangle"></i> {{ trans('messages.actions.delete') }}
                    </button>
                </form>
            @else
                <p>{{ trans('messages.profile.delete.email') }}</p>

                <form method="POST" action="{{ route('profile.delete.send') }}">
                    @csrf

                    <a class="btn btn-secondary" href="{{ route('profile.index') }}">
                        <i class="bi bi-arrow-left"></i> {{ trans('messages.actions.cancel') }}
                    </a>

                    <button type="submit" class="btn btn-danger">
                        <i class="bi bi-check-lg"></i> {{ trans('messages.actions.continue') }}
                    </button>
                </form>
            @endif
        </div>
    </div>
@endsection
