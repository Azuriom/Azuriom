@extends('layouts.app')

@section('title', trans('messages.profile.2fa.title'))

@section('content')
    <h1>{{ trans('messages.profile.2fa.title') }}</h1>

    <div class="card mb-4">
        <div class="card-body">
            <p class="text-success">{{ trans('messages.profile.2fa.enabled') }}</p>

            @if($user->two_factor_recovery_codes !== null)
                <p>
                    <a data-bs-toggle="collapse" href="#codesCollapse" role="button" aria-expanded="false" aria-controls="codesCollapse">
                        {{ trans('messages.profile.2fa.codes') }}
                    </a>
                </p>

                <div class="collapse" id="codesCollapse">
                    <div class="card mb-4">
                        <div class="card-body">
                            <ul class="list-columns-2">
                                @foreach($user->two_factor_recovery_codes ?? [] as $code)
                                    <li>
                                        <samp>{{ $code }}</samp>
                                    </li>
                                @endforeach
                            </ul>

                            <a href="{{ route('profile.2fa.codes') }}" class="btn btn-primary" download="{{ $codesBackupName }}">
                                <i class="bi bi-download"></i> {{ trans('messages.actions.download') }}
                            </a>
                        </div>
                    </div>
                </div>
            @endif

            <form action="{{ route('profile.2fa.disable') }}" method="POST">
                @csrf

                <a class="btn btn-secondary" href="{{ route('profile.index') }}">
                    <i class="bi bi-arrow-left"></i> {{ trans('messages.actions.back') }}
                </a>

                <button type="submit" class="btn btn-danger">
                    <i class="bi bi-shield-slash"></i> {{ trans('messages.profile.2fa.disable') }}
                </button>
            </form>

        </div>
    </div>
@endsection
