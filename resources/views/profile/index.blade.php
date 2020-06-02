@extends('layouts.app')

@section('title', trans('messages.profile.title'))

@section('content')
    <div class="container content">
        <div class="card mb-4 shadow-sm">
            <div class="card-header">{{ trans('messages.profile.title') }}</div>
            <div class="card-body">
                <h4 class="card-title">{{ $user->name }}</h4>
                <ul>
                    <li>{{ trans('messages.profile.info.role', ['role' => $user->role->name]) }}</li>
                    <li>{{ trans('messages.profile.info.register', ['date' => format_date($user->created_at, true)]) }}</li>
                    <li>{{ trans('messages.profile.info.money', ['money' => format_money($user->money)]) }}</li>
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
                <h4>  Socials</h4>
                @php
                    $connected_to = $user->identities->pluck('provider_name')->toArray();
                    $connected_to[] = 'default';
                    $auth_methods = array_diff($auth_methods, $connected_to);
                @endphp
                    @foreach ($auth_methods as $item)
                        @switch($item)
                            @case('facebook')
                                <a style="background-color: #3b5998;border-color: #3b5998;" class="btn btn-primary" href="{{ url('/login/facebook') }}"><i class="fab fa-facebook-square"></i> Sign-in with FaceBook</a>
                                @break
                            @case('twitter')
                                <a style="background-color: #00acee;border-color: #00acee;" class="btn btn-primary" href="{{ url('/login/twitter') }}"><i class="fab fa-twitter-square"></i> Sign-in with Twitter</a>
                                @break
                            @case('steam')
                                <a style="background-color: #34aa57;border-color: #34aa57;" class="btn btn-primary" href="{{ url('/login/steam') }}"><i class="fab fa-steam-square"></i> Sign-in with Steam</a>
                                @break
                            @case('discord')
                                <a style="background-color: #3b5998;border-color: #3b5998;" class="btn btn-primary" href="{{ url('/login/discord') }}"><i class="fab fa-discord"></i> Sign-in with Discord</a>
                                @break
                            @default
                        @endswitch
                    @endforeach

                    @if (count($connected_to) > 1)
                        <h4>Avatar choice <small>(can be overwritten by admins)</small></h4>
                        <form action="{{ route('profile.avatar_from_provider') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <select class="form-control" name="avatar_from_provider">
                                    @foreach ($connected_to as $item)
                                        <option value="{{$item}}" @if ($item === ($user->settings['avatar_from_provider'] ?? 'default') ) selected @endif >{{$item}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                {{ trans('messages.actions.update') }}
                            </button>
                        </form>
                    @endif
                    
                
            </div>
        </div>

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
        @if($user->isNewUser())
        <div class="card shadow-sm mb-4">
            <div class="card-header">{{ trans('messages.profile.change-password') }} & {{ trans('auth.name') }} <span class="bg-danger text-white">Please update ASAP</span></div>
            <div class="card-body">
                <form action="{{ route('profile.password-username-newuser') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="name">{{ trans('auth.name') }}</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required>
                        @error('name')
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
        @else
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

