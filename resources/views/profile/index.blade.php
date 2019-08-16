@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Update password</h4>

                        <form action="{{ route('profile.password') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="currentPasswordInput">Current password</label>
                                <input type="password" class="form-control @error('password_confirm_pass') is-invalid @enderror" id="currentPasswordInput" name="password_confirm_pass" required>

                                @error('password_confirm_pass')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="passwordInput">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="passwordInput" name="password" required>

                                @error('password')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="confirmPasswordInput">Confirm password</label>
                                <input type="password" class="form-control" id="confirmPasswordInput" name="password_confirmation" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Update password</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Update email</h4>

                        <form action="{{ route('profile.email') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="currentPasswordInput">Current password</label>
                                <input type="password" class="form-control @error('email_confirm_pass') is-invalid @enderror" id="currentPasswordInput" name="email_confirm_pass" required>

                                @error('email_confirm_pass')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="emailInput">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="emailInput" name="email" value="{{ old('email', $user->email) }}" required>

                                @error('email')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Update email</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
