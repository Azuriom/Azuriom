@extends('install.games.layout')

@section('game')
    <div class="mb-3">
        <label class="form-label" for="epicId">{{ trans('install.game.epic.id') }}</label>

        <input id="steamProfile" type="text" class="form-control @error('id') is-invalid @enderror" name="id" required value="{{ old('id') }}">

        @error('id')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror

        <small class="form-text text-body-secondary">@lang('install.game.epic.id_info')</small>
    </div>

    <div class="row gx-3">
        <div class="col-md-6 mb-3">
            <label class="form-label" for="clientId">{{ trans('install.game.epic.client_id') }}</label>

            <input id="clientId" type="text" class="form-control @error('client_id') is-invalid @enderror" name="client_id" required value="{{ old('client_id') }}">

            @error('client_id')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label" for="clientSecret">{{ trans('install.game.epic.client_secret') }}</label>

            <input id="clientSecret" type="text" class="form-control @error('client_secret') is-invalid @enderror" name="client_secret" required value="{{ old('client_secret') }}">

            @error('client_secret')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
    </div>

    <div class="alert alert-info">
        <p class="mb-0">@lang('install.game.epic.steps')</p>
        <ol>
            <li>@lang('install.game.epic.step_1')</li>
            <li>@lang('install.game.epic.step_2', ['redirect' => route('login.callback')])</li>
            <li>@lang('install.game.epic.step_3')</li>
        </ol>
    </div>
@endsection
