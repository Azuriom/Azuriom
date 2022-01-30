@extends('layouts.app')

@section('title', trans('messages.profile.2fa.title'))

@section('content')
    <div class="container content profile-2fa">
        <div class="card mb-4">
            <div class="card-header">{{ trans('messages.profile.2fa.title') }}</div>

            <div class="card-body">
                <div class="alert alert-success">{{ trans('messages.profile.2fa.enabled') }}</div>

                @if($user->two_factor_recovery_codes !== null)
                    <p>
                        <a data-toggle="collapse" href="#codesCollapse" role="button" aria-expanded="false" aria-controls="codesCollapse">
                            {{ trans('messages.profile.2fa.codes') }}
                        </a>
                    </p>

                    <div class="collapse" id="codesCollapse">
                        <div class="card card-body mb-4">
                            <ul class="list-columns-2 mb-0">
                                @foreach($user->two_factor_recovery_codes as $code)
                                    <li>
                                        <samp>{{ $code }}</samp>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                <form action="{{ route('profile.2fa.disable') }}" method="POST">
                    @csrf

                    <a class="btn btn-secondary" href="{{ route('profile.index') }}">
                        {{ trans('messages.actions.back') }}
                    </a>

                    <button type="submit" class="btn btn-danger">
                        {{ trans('messages.profile.2fa.disable') }}
                    </button>
                </form>

            </div>
        </div>
    </div>
@endsection
