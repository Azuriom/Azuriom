@extends('layouts.app')

@section('title', trans('messages.profile.title'))

@section('content')
    <h1>{{ trans('messages.profile.title') }}</h1>

    <div class="card mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-xl-2 col-md-3 text-center">
                    <img src="{{ $user->getAvatar(150) }}" class="rounded mb-3 img-fluid" alt="{{ $user->name }}">

                    <h3 class="h5 mb-0">
                        <span class="badge" style="{{ $user->role->getBadgeStyle() }}; vertical-align: middle">
                            @if($user->role->icon) <i class="{{ $user->role->icon }}"></i> @endif
                            {{ $user->role->name }}
                        </span>
                    </h3>
                </div>

                <div class="col-xl-6 col-md-6">
                    <h2>{{ $user->name }}</h2>

                    <ul>
                        <li>{{ trans('messages.profile.info.register', ['date' => format_date($user->created_at, true)]) }}</li>
                        <li>{{ trans('messages.profile.info.money', ['money' => format_money($user->money)]) }}</li>
                        @if($user->game_id)
                            <li>{{ game()->trans('id') }}: {{ $user->game_id }}</li>
                        @endif
                        @if(! oauth_login())
                            <li>{{ trans('messages.profile.info.2fa', ['2fa' => trans_bool($user->hasTwoFactorAuth())]) }}</li>
                        @endif
                        @if($discordAccount !== null)
                            <li>{{ trans('messages.profile.info.discord', ['user' => $discordAccount->name]) }}</li>
                        @endif
                    </ul>

                    @if(! oauth_login())
                        @if($user->hasTwoFactorAuth())
                            <a class="btn btn-primary" href="{{ route('profile.2fa.index') }}">
                                <i class="bi bi-shield-lock"></i> {{ trans('messages.profile.2fa.manage') }}
                            </a>
                        @else
                            <a class="btn btn-primary" href="{{ route('profile.2fa.index') }}">
                                <i class="bi bi-shield-lock"></i> {{ trans('messages.profile.2fa.enable') }}
                            </a>
                        @endif

                        @if($canDelete)
                            <a class="btn btn-danger" href="{{ route('profile.delete.index') }}">
                                <i class="bi bi-x-lg"></i> {{ trans('messages.profile.delete.btn') }}
                            </a>
                        @endif
                    @endif

                    @if($enableDiscordLink)
                        @if($discordAccount !== null)
                            <form action="{{ route('profile.discord.unlink') }}" method="POST" class="d-inline-block">
                                @csrf

                                <button type="submit" class="btn btn-danger">
                                    <i class="bi bi-discord"></i>
                                    {{ trans('messages.profile.discord.unlink') }}
                                </button>
                            </form>
                        @else
                            <a href="{{ route('profile.discord.link') }}" class="btn btn-primary">
                                <i class="bi bi-discord"></i>
                                {{ trans('messages.profile.discord.link') }}
                            </a>
                        @endif
                    @endif
                </div>
                <div class="col-xl-4 col-lg-3 col-12 mt-md-3">
                    <form action="{{ route('profile.locale') }}" method="POST">
                        @csrf
                        <select class="form-select" name="locale" required>
                            @foreach($locales as $localeCode => $localeName)
                                <option value="{{ $localeCode }}" @selected($user->locale ? $localeCode == $user->locale : $localeCode == app()->getLocale())>
                                    {{ $localeName }}
                                </option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-danger my-2">
                            <i class="bi bi-translate"></i>
                            {{ trans('messages.profile.locale.btn') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @if($canVerifyEmail)
        @if(session('resent'))
            <div class="alert alert-success mb-4" role="alert">
                {{ trans('auth.verification.sent') }}
            </div>
        @endif

        <div class="alert alert-warning mb-4" role="alert">
            <p>{{ trans('messages.profile.email_verification') }}</p>
            <p>{{ trans('auth.verification.request') }}</p>

            <form method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-send"></i> {{ trans('auth.verification.resend') }}
                </button>
            </form>
        </div>
    @endif

    <div class="row gy-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">
                        {{ trans('messages.profile.change_email') }}
                    </h2>

                    <form action="{{ route('profile.email') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label" for="emailInput">{{ trans('auth.email') }}</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="emailInput" name="email" value="{{ old('email', $user->email ?? '') }}" required>

                            @error('email')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        @if(! oauth_login())
                            <div class="mb-3">
                                <label class="form-label" for="emailConfirmPassInput">{{ trans('auth.current_password') }}</label>
                                <input type="password" class="form-control @error('email_confirm_pass') is-invalid @enderror" id="emailConfirmPassInput" name="email_confirm_pass" required>

                                @error('email_confirm_pass')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        @endif

                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-lg"></i> {{ trans('messages.actions.update') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>

        @if(! oauth_login())
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">
                            {{ trans('messages.profile.change_password') }}
                        </h2>

                        <form action="{{ route('profile.password') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label" for="passwordConfirmPassInput">{{ trans('auth.current_password') }}</label>
                                <input type="password" class="form-control @error('password_confirm_pass') is-invalid @enderror" id="passwordConfirmPassInput" name="password_confirm_pass" required>

                                @error('password_confirm_pass')
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
                                <label class="form-label" for="confirmPasswordInput">{{ trans('auth.confirm_password') }}</label>
                                <input type="password" class="form-control" id="confirmPasswordInput" name="password_confirmation" required>
                            </div>

                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-check-lg"></i> {{ trans('messages.actions.update') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            @if($canChangeName)
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h2 class="card-title">
                                {{ trans('messages.profile.change_name') }}
                            </h2>

                            <form action="{{ route('profile.name') }}" method="POST">
                                @csrf

                                <div class="mb-3">
                                    <label class="form-label" for="nameInput">{{ trans('auth.name') }}</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="nameInput" name="name" value="{{ old('name', $user->name ?? '') }}" required>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-check-lg"></i> {{ trans('messages.actions.update') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endif
        @endif

        @if($canUploadAvatar)
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">
                            {{ trans('messages.profile.change_avatar') }}
                        </h2>

                        <form action="{{ route('profile.avatar') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label" for="imageInput">{{ trans('messages.fields.image') }}</label>
                                <div class="input-group @error('image') has-validation @enderror">
                                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="imageInput" name="image" accept=".jpg,.jpeg,.jpe,.png,.gif" required>

                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-check-lg"></i> {{ trans('messages.actions.save') }}
                                    </button>

                                    @error('image')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                <small id="imageInfo" class="form-text">{{ trans('messages.profile.avatar', ['size' => '64x64']) }}</small>
                            </div>
                        </form>

                        @if($hasAvatar)
                            <form action="{{ route('profile.avatar') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">
                                    <i class="bi bi-trash"></i> {{ trans('messages.profile.delete_avatar') }}
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        @endif

        @if(setting('users.money_transfer'))
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">
                            {{ trans('messages.profile.money_transfer.title') }}
                        </h2>

                        <form action="{{ route('profile.transfer-money') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label" for="nameInput">{{ game()->userPrimaryAttributeName() }}</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="nameInput" name="name" value="{{ old('name') }}" required>

                                @error('name')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="moneyInput">{{ trans('messages.fields.money') }}</label>
                                <input type="number" placeholder="0.00" min="0" step="0.01" class="form-control @error('money') is-invalid @enderror" id="moneyInput" name="money" value="{{ old('money') }}" required>

                                @error('money')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-send"></i> {{ trans('messages.actions.send') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endif

        @foreach($cards ?? [] as $card)
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">
                            {{ $card['name'] }}
                        </h2>

                        @include($card['view'])
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
