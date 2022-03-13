@extends('admin.layouts.admin')

@section('title', trans('admin.users.create'))

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admin.users.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label" for="nameInput">{{ trans('auth.name') }}</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="nameInput" name="name" value="{{ old('name') }}" required>

                    @error('name')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="emailInput">{{ trans('auth.email') }}</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="emailInput" name="email" value="{{ old('email') }}" required>

                    @error('email')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="passwordInput">{{ trans('auth.password') }}</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="passwordInput" name="password" required>

                    @error('password')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="roleSelect">{{ trans('messages.fields.role') }}</label>
                    <select class="form-select @error('role_id') is-invalid @enderror" id="roleSelect" name="role">
                        @foreach($roles as $role)
                            <option @selected(old('role') == $role->id) value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>

                    @error('role_id')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> {{ trans('messages.actions.save') }}
                </button>
            </form>
        </div>
    </div>
@endsection
