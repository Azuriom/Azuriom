@extends('admin.layouts.admin')

@section('title', trans('admin.users.edit', ['user' => $user->name]))

@section('content')
    @if($user->isDeleted())
        <div class="alert alert-warning" role="alert">
            <i class="bi bi-exclamation-triangle"></i> {{ trans('admin.users.alert-deleted') }}
        </div>
    @elseif($user->isBanned())
        <div class="alert alert-warning shadow" role="alert">
            <h5><i class="bi bi-exclamation-triangle"></i> {{ trans('admin.users.alert-banned.title') }}</h5>
            <ul>
                <li>{{ trans('admin.users.alert-banned.banned-by', ['author' => $user->ban->author->name]) }}</li>
                <li>{{ trans('admin.users.alert-banned.reason', ['reason' => $user->ban->reason]) }}</li>
                <li>{{ trans('admin.users.alert-banned.date', ['date' => format_date_compact($user->ban->created_at)]) }}</li>
            </ul>

            <form method="POST" action="{{ route('admin.users.bans.destroy', [$user, $user->ban]) }}">
                @method('DELETE')
                @csrf

                <button type="submit" class="btn btn-warning">
                    <i class="bi bi-slash-circle"></i> {{ trans('admin.users.unban') }}
                </button>
            </form>
        </div>
    @endif

    <div class="row">
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">{{ trans('admin.users.edit_profile') }}</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.users.update', $user) }}" method="POST">
                        @method('PATCH')
                        @csrf

                        <div class="row">
                            <div class="col-md-9">
                                <div class="mb-3">
                                    <label class="form-label" for="nameInput">{{ trans('auth.name') }}</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="nameInput" name="name" value="{{ old('name', $user->name) }}" required @disabled($user->isDeleted())>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="emailInput">{{ trans('auth.email') }}</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="emailInput" name="email" value="{{ old('email', $user->email ?? '') }}" @if(! oauth_login()) required @endif @disabled($user->isDeleted())>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3 text-center">
                                <img src="{{ $user->getAvatar(256) }}" alt="{{ $user->name }}" class="rounded img-fluid mb-3" height="150">
                            </div>
                        </div>

                        @if(! oauth_login())
                            <div class="mb-3">
                                <label class="form-label" for="passwordInput">{{ trans('auth.password') }}</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="passwordInput" name="password" placeholder="**********" @disabled($user->isDeleted())>

                                @error('password')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        @endif

                        <div class="mb-3">
                            <label class="form-label" for="roleSelect">{{ trans('messages.fields.role') }}</label>
                            <select class="form-select @error('role_id') is-invalid @enderror" id="roleSelect" name="role" @disabled($user->isDeleted())>
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}" @selected($user->role->is($role))>{{ $role->name }}</option>
                                @endforeach
                            </select>

                            @error('role_id')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="moneyInput">{{ trans('messages.fields.money') }}</label>
                            <div class="input-group @error('money') has-validation @enderror">
                                <input type="number" min="0" max="999999999999" step="0.01" class="form-control @error('money') is-invalid @enderror" id="moneyInput" name="money" value="{{ old('money', $user->money) }}" required @disabled($user->isDeleted())>
                                <span class="input-group-text">{{ money_name() }}</span>

                                @error('money')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary" @disabled($user->isDeleted())>
                            <i class="bi bi-save"></i> {{ trans('messages.actions.save') }}
                        </button>

                        @if(! $user->isDeleted())
                            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#notificationModal">
                                <i class="bi bi-megaphone"></i> {{ trans('admin.users.notify') }}
                            </button>
                        @endif

                        @if (! $user->isDeleted() && ! $user->isAdmin() && ! $user->is(Auth::user()))
                            @if(! $user->isBanned())
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#banModal">
                                    <i class="bi bi-slash-circle"></i> {{ trans('admin.users.ban') }}
                                </button>
                            @endif

                            <a href="{{ route('admin.users.destroy', $user) }}" class="btn btn-danger" data-confirm="delete">
                                <i class="bi bi-trash"></i> {{ trans('admin.users.delete') }}
                            </a>
                        @endif
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">{{ trans('admin.users.info') }}</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label" for="registerInput">{{ trans('admin.users.registered') }}</label>
                        <input type="text" class="form-control" id="registerInput" value="{{ format_date_compact($user->created_at) }}" disabled>
                    </div>

                    @if($user->last_login_at)
                        <div class="mb-3">
                            <label class="form-label" for="lastLoginInput">{{ trans('admin.users.last_login') }}</label>
                            <input type="text" class="form-control" id="lastLoginInput" value="{{ format_date_compact($user->last_login_at) }}" disabled>
                        </div>
                    @endif

                    @if($user->email !== null)
                        <form action="{{ route('admin.users.verify', $user) }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label" for="emailVerifiedInput">{{ trans('admin.users.email.verified') }}</label>

                                @if($user->hasVerifiedEmail())
                                    <input type="text" class="form-control text-success" id="emailVerifiedInput"
                                           value="{{ trans('admin.users.email.date', ['date' => format_date_compact($user->email_verified_at)]) }}" disabled>
                                @else
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control text-danger" id="emailVerifiedInput" value="{{ trans('messages.no') }}" disabled>

                                        @if(! $user->isDeleted())
                                            <button class="btn btn-outline-success" type="submit">
                                                {{ trans('admin.users.email.verify') }}
                                            </button>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </form>
                    @endif

                    @if(! oauth_login())
                        <form action="{{ route('admin.users.2fa', $user) }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label" for="2faInput">{{ trans('admin.users.2fa.title') }}</label>

                                @if(! $user->hasTwoFactorAuth())
                                    <input type="text" class="form-control text-danger" id="2faInput" value="{{ trans('messages.no') }}" disabled>
                                @else
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control text-success" id="2faInput" value="{{ trans('messages.yes') }}" disabled>

                                        <button class="btn btn-outline-danger" type="submit">
                                            {{ trans('admin.users.2fa.disable') }}
                                        </button>
                                    </div>
                                @endif
                            </div>
                        </form>
                    @endif

                    <div class="mb-3">
                        <label class="form-label" for="addressInput">{{ trans('admin.users.ip') }}</label>
                        <input type="text" class="form-control" id="addressInput" value="{{ $user->last_login_ip ?? trans('messages.unknown') }}" disabled>
                    </div>

                    @if($user->game_id)
                        <div class="mb-3">
                            <label class="form-label" for="idInput">{{ game()->trans('id') }}</label>
                            <input type="text" class="form-control" id="idInput" value="{{ $user->game_id }}" disabled>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        @foreach($cards ?? [] as $card)
            <div class="col-md-6">
                <div class="card shadow-sm mb-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">{{ $card['name'] }}</h5>
                    </div>
                    <div class="card-body">
                        @include($card['view'])
                    </div>
                </div>
            </div>
        @endforeach

    </div>

    @if(! $user->isBanned())
        <div class="modal fade" id="banModal" tabindex="-1" role="dialog" aria-labelledby="banLabel" aria-modal="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="banLabel">{{ trans('admin.users.ban-title', ['user' => $user->name]) }}</h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>{{ trans('admin.users.ban-description') }}</p>

                        <form method="POST" action="{{ route('admin.users.bans.store', $user) }}">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label" for="reasonInput">{{ trans('admin.bans.reason') }}</label>
                                <input type="text" class="form-control @error('reason') is-invalid @enderror" id="reasonInput" name="reason" required>

                                @error('reason')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">
                                {{ trans('messages.actions.cancel') }}
                            </button>

                            <button class="btn btn-danger" type="submit">
                                <i class="bi bi-slash-circle"></i> {{ trans('admin.users.ban') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if(! $logs->isEmpty())
        <div class="card shadow mb-4">
            <div class="card-header">
                <h5 class="card-title mb-0">{{ trans('admin.logs.title') }}</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">{{ trans('messages.fields.action') }}</th>
                            <th scope="col">{{ trans('messages.fields.date') }}</th>
                            <th scope="col">{{ trans('messages.fields.action') }}</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($logs as $log)
                            <tr>
                                <th scope="row">{{ $log->id }}</th>
                                <td>
                                    <i class="text-{{ $log->getActionFormat()['color'] }} bi bi-{{ $log->getActionFormat()['icon'] }}"></i>
                                    {{ $log->getActionMessage() }}
                                </td>
                                <td>{{ format_date_compact($log->created_at) }}</td>
                                <td>
                                    <a href="{{ route('admin.logs.show', $log) }}" class="mx-1" title="{{ trans('messages.actions.show') }}" data-bs-toggle="tooltip"><i class="bi bi-eye"></i></a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>

                {{ $logs->links() }}
            </div>
        </div>
    @endif

    @include('admin.users._notify', ['route' => route('admin.users.notify', ['user' => $user])])
@endsection
