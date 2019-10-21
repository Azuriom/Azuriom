@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    <div class="container">
        <div class="card shadow-sm">
            <h5 class="card-header">
                Profile
            </h5>
            <div class="card-body">
                <h4 class="card-title">{{ $user->name }}</h4>
                <ul>
                    <li>Role: {{ $user->role->name }}</li>
                    <li>Register: {{ $user->created_at }}</li>
                    <li>Two-Factor authentication: {{ $user->hasTwoFactorAuth() ? 'Yes' : 'No' }}</li>
                </ul>

                @if($user->hasTwoFactorAuth())
                    <form action="{{ route('profile.2fa.disable') }}" method="POST">
                        @csrf

                        <button type="submit" class="btn btn-danger">Disable 2FA</button>
                    </form>
                @else
                    <a class="btn btn-success" href="{{ route('profile.2fa.index') }}">Enable 2FA</a>
                @endif
            </div>
        </div>

        @if(! $user->hasVerifiedEmail())
            @if (session('resent'))
                <div class="alert alert-success mt-2" role="alert">
                    A fresh verification link has been sent to your email address.
                </div>
            @endif

            <div class="card shadow-sm border-danger mt-3">
                <h5 class="card-header">
                    Email not verified
                </h5>
                <div class="card-body">
                    <p>Your email is not verified, please check your email for a verification link. If you did not receive the email you can resend it</p>
                    <a href="{{ route('verification.resend') }}" class="btn btn-warning">Resend email</a>
                </div>
            </div>
        @endif

        <div class="row">
            <div class="col-md-6">
                <div class="card shadow-sm mt-3">
                    <h5 class="card-header">
                        Update password
                    </h5>
                    <div class="card-body">
                        <form action="{{ route('profile.password') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="passwordConfirmPassInput">Current password</label>
                                <input type="password" class="form-control @error('password_confirm_pass') is-invalid @enderror" id="passwordConfirmPassInput" name="password_confirm_pass" required>

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
                <div class="card shadow-sm mt-3">
                    <h5 class="card-header">
                        Update email
                    </h5>
                    <div class="card-body">
                        <form action="{{ route('profile.email') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="emailInput">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="emailInput" name="email" value="{{ old('email', $user->email) }}" required>

                                @error('email')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="emailConfirmPassInput">Current password</label>
                                <input type="password" class="form-control @error('email_confirm_pass') is-invalid @enderror" id="emailConfirmPassInput" name="email_confirm_pass" required>

                                @error('email_confirm_pass')
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
