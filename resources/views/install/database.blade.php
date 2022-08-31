@extends('install.layout')

@section('content')
    <form method="POST" action="{{ route('install.database') }}">
        <h2>{{ trans('install.database.title') }}</h2>

        <div class="mb-3">
            <label class="form-label" for="type">{{ trans('install.database.type') }}</label>
            <select class="form-select" id="type" name="type" data-toggle-select="database">
                @foreach($databaseDrivers as $dbId => $dbName)
                    <option value="{{ $dbId }}" @selected($dbId === old('type'))>{{ $dbName }}</option>
                @endforeach
            </select>
        </div>

        <div id="databaseForm" data-database="mysql pgsql sqlsrv">
            <div class="row g-3">
                <div class="mb-3 col-md-9">
                    <label class="form-label" for="host">{{ trans('install.database.host') }}</label>
                    <input name="host" type="text" class="form-control @error('host') is-invalid @enderror" id="host" placeholder="127.0.0.1" value="{{ old('host', '') }}">

                    @error('host')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="mb-3 col-md-3">
                    <label class="form-label" for="port">{{ trans('install.database.port') }}</label>
                    <input name="port" type="number" class="form-control @error('port') is-invalid @enderror" id="port" placeholder="3306" value="{{ old('port', '') }}">

                    @error('port')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label" for="database">{{ trans('install.database.database') }}</label>
                <input name="database" type="text" class="form-control @error('database') is-invalid @enderror" id="database" placeholder="azuriom" value="{{ old('database', '') }}">

                @error('database')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="user">{{ trans('install.database.user') }}</label>
                <input name="user" type="text" class="form-control @error('user') is-invalid @enderror" id="user" placeholder="root" value="{{ old('user', '') }}">

                @error('user')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="password">{{ trans('install.database.password') }}</label>
                <input name="password" type="password" class="form-control" id="password" placeholder="123456">
            </div>
        </div>

        <p class="text-danger" data-database="sqlite sqlsrv">
            <i class="bi bi-exclamation-triangle"></i> {{ trans('install.database.warn') }}
        </p>

        <div class="text-center">
            <button type="submit" class="btn btn-primary rounded-pill">
                {{ trans('messages.actions.continue') }} <i class="bi bi-arrow-right"></i>
            </button>
        </div>
    </form>
@endsection
