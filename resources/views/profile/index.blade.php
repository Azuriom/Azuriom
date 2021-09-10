@extends('layouts.app')

@section('title', trans('messages.profile.title'))

@section('content')
    <div class="container content profile">
        <div class="card mb-4 shadow-sm">
            <div class="card-header">{{ trans('messages.profile.title') }}</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-2 col-md-3 text-center">
                        <img src="{{ $user->getAvatar(150) }}" class="rounded mb-3 img-fluid" alt="{{ $user->name }}">

                        <h2 class="h4 mb-0">
                            <span class="badge" style="{{ $user->role->getBadgeStyle() }}; vertical-align: middle">{{ $user->role->name }}</span>
                        </h2>
                    </div>

                    <div class="col-lx-10 col-md-9">
                        @can('profile.change-own-username')
                            <form action="{{ route('profile.username') }}" method="POST" class="form-inline form-group">
                                @csrf
                                <input class="form-control mr-2 @error('name') is-invalid @enderror" name="name" type="text" value="{{ $user->name }}">
                                <input type="submit" class="btn btn-primary">
                                @error('name')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </form>
                        @else
                            <h1>{{ $user->name }}</h1>
                        @endcan

                        <ul>
                            <li>{{ trans('messages.profile.info.register', ['date' => format_date($user->created_at, true)]) }}</li>
                            <li>{{ trans('messages.profile.info.money', ['money' => format_money($user->money)]) }}</li>
                            @if($user->game_id)
                                <li>{{ game()->trans('id') }}: {{ $user->game_id }}</li>
                            @endif
                            <li>{{ trans('messages.profile.info.2fa', ['2fa' => trans_bool($user->hasTwoFactorAuth())]) }}</li>
                        </ul>

                        @if($user->hasTwoFactorAuth())
                            <form action="{{ route('profile.2fa.disable') }}" method="POST">
                                @csrf

                                <button type="submit" class="btn btn-danger">
                                    {{ trans('messages.profile.2fa.disable') }}
                                </button>
                            </form>
                        @else
                            <a class="btn btn-primary" href="{{ route('profile.2fa.index') }}">{{ trans('messages.profile.2fa.enable') }}</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        @if(! oauth_login())
            @if(! $user->hasVerifiedEmail())
                @if (session('resent'))
                    <div class="alert alert-success mb-4" role="alert">
                        {{ trans('auth.verify-sent') }}
                    </div>
                @endif

                <div class="alert alert-warning mb-4" role="alert">
                    <p>{{ trans('messages.profile.not-verified') }}</p>
                    <p>{{ trans('auth.verify-request') }}</p>

                    <form method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-primary">
                            {{ trans('auth.verify-resend') }}
                        </button>
                    </form>
                </div>
            @endif

            <div class="row">
                <div class="col-md-6">
                    <div class="card shadow-sm mb-4">
                        <div class="card-header">{{ trans('messages.profile.change-password') }}</div>
                        <div class="card-body">
                            <form action="{{ route('profile.password') }}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label for="passwordConfirmPassInput">{{ trans('auth.current-password') }}</label>
                                    <input type="password" class="form-control @error('password_confirm_pass') is-invalid @enderror" id="passwordConfirmPassInput" name="password_confirm_pass" required>

                                    @error('password_confirm_pass')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="passwordInput">{{ trans('auth.password') }}</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="passwordInput" name="password" required>

                                    @error('password')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="confirmPasswordInput">{{ trans('auth.confirm-password') }}</label>
                                    <input type="password" class="form-control" id="confirmPasswordInput" name="password_confirmation" required>
                                </div>

                                <button type="submit" class="btn btn-primary">
                                    {{ trans('messages.actions.update') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card shadow-sm mb-4">
                        <div class="card-header">{{ trans('messages.profile.change-email') }}</div>
                        <div class="card-body">
                            <form action="{{ route('profile.email') }}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label for="emailInput">{{ trans('auth.email') }}</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="emailInput" name="email" value="{{ old('email', $user->email) }}" required>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="emailConfirmPassInput">{{ trans('auth.current-password') }}</label>
                                    <input type="password" class="form-control @error('email_confirm_pass') is-invalid @enderror" id="emailConfirmPassInput" name="email_confirm_pass" required>

                                    @error('email_confirm_pass')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary">
                                    {{ trans('messages.actions.update') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                @if(setting('user_money_transfer'))
                    <div class="col-md-6">
                        <div class="card shadow-sm mb-4">
                            <div class="card-header">{{ trans('messages.profile.money-transfer.title') }}</div>
                            <div class="card-body">
                                <form action="{{ route('profile.transfer-money') }}" method="POST">
                                    @csrf

                                    <div class="form-group">
                                        <label for="nameInput">{{ trans('auth.name') }}</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="nameInput" name="name" value="{{ old('name') }}" required>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="moneyInput">{{ trans('messages.fields.money') }}</label>
                                        <input type="number" placeholder="0.00" min="0" step="0.01" class="form-control @error('money') is-invalid @enderror" id="moneyInput" name="money" value="{{ old('money') }}" required>

                                        @error('money')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-primary">
                                        {{ trans('messages.actions.send') }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        @endif
    </div>
@endsection

