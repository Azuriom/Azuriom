@extends('install.games.layout')

@section('game')
    <div class="mb-3">
        <label class="form-label" for="name">{{ trans('game.fivem.name') }}</label>

        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required value="{{ old('name') }}">

        @error('name')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>
@endsection
