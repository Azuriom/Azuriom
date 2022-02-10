@extends('admin.layouts.admin')

@section('title', trans('admin.users.title-edit', ['user' => $user->name]))

@section('content')
    @if($user->isDeleted())
        <div class="alert alert-warning" role="alert">
            <i class="fas fa-exclamation-triangle"></i> {{ trans('admin.users.alert-deleted') }}
        </div>
    @elseif($user->isBanned())
        <div class="alert alert-warning shadow" role="alert">
            <h5><i class="fas fa-exclamation-circle"></i> {{ trans('admin.users.alert-banned.title') }}</h5>
            <ul>
                <li>{{ trans('admin.users.alert-banned.banned-by', ['author' => $user->ban->author->name]) }}</li>
                <li>{{ trans('admin.users.alert-banned.reason', ['reason' => $user->ban->reason]) }}</li>
                <li>{{ trans('admin.users.alert-banned.date', ['date' => format_date_compact($user->ban->created_at)]) }}</li>
            </ul>

            <form method="POST" action="{{ route('admin.users.bans.destroy', [$user, $user->ban]) }}">
                @method('DELETE')
                @csrf

                <button type="submit" class="btn btn-warning">
                    <i class="fas fa-ban"></i> {{ trans('admin.users.actions.unban') }}
                </button>
            </form>
        </div>
    @endif

    <div class="row">
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">{{ trans('admin.users.edit-profile') }}</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.users.update', $user) }}" method="POST">
                        @method('PATCH')
                        @csrf

                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label for="nameInput">{{ trans('auth.name') }}</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="nameInput" name="name" value="{{ old('name', $user->name) }}" required @if($user->isDeleted()) disabled @endif>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                <div class="form-group @if(oauth_login()) d-none @endif">
                                    <label for="emailInput">{{ trans('auth.email') }}</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="emailInput" name="email" value="{{ old('email', $user->email) }}" required @if($user->isDeleted()) disabled @endif>

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
                            <div class="form-group">
                                <label for="passwordInput">{{ trans('auth.password') }}</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="passwordInput" name="password" placeholder="**********" @if($user->isDeleted()) disabled @endif>

                                @error('password')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        @endif

                        <div class="form-group">
                            <label for="roleSelect">{{ trans('messages.fields.role') }}</label>
                            <select class="custom-select @error('role_id') is-invalid @enderror" id="roleSelect" name="role" @if($user->isDeleted()) disabled @endif>
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}" @if($user->role->is($role)) selected @endif>{{ $role->name }}</option>
                                @endforeach
                            </select>

                            @error('role_id')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="moneyInput">{{ trans('messages.fields.money') }}</label>
                            <div class="input-group">
                                <input type="number" min="0" max="999999999999" step="0.01" class="form-control @error('money') is-invalid @enderror" id="moneyInput" name="money" value="{{ old('money', $user->money) }}" required @if($user->isDeleted()) disabled @endif>

                                <div class="input-group-append">
                                    <span class="input-group-text">{{ money_name() }}</span>
                                </div>

                                @error('money')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary" @if($user->isDeleted()) disabled @endif>
                            <i class="fas fa-save"></i> {{ trans('messages.actions.save') }}
                        </button>

                        @if (! $user->isDeleted() && ! $user->is(Auth::user()))
                            @if(! $user->isBanned())
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#banModal" @if($user->isAdmin()) disabled @endif>
                                    <i class="fas fa-ban"></i> {{ trans('admin.users.actions.ban') }}
                                </button>
                            @endif

                            <a href="{{ route('admin.users.destroy', $user) }}" class="btn btn-danger @if($user->isAdmin()) disabled @endif" @if(!$user->isAdmin()) data-confirm="delete" @endif>
                                <i class="fas fa-trash"></i> {{ trans('admin.users.actions.delete') }}
                            </a>
                        @endif
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">{{ trans('admin.users.user-info') }}</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="registerInput">{{ trans('admin.users.fields.register-date') }}</label>
                        <input type="text" class="form-control" id="registerInput" value="{{ format_date_compact($user->created_at) }}" disabled>
                    </div>

                    @if($user->last_login_at)
                        <div class="form-group">
                            <label for="lastLoginInput">{{ trans('admin.users.fields.last-login') }}</label>
                            <input type="text" class="form-control" id="lastLoginInput" value="{{ format_date_compact($user->last_login_at) }}" disabled>
                        </div>
                    @endif

                    @if(! oauth_login())
                        <form action="{{ route('admin.users.verify', $user) }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="emailVerifiedInput">{{ trans('admin.users.fields.email-verified') }}</label>

                                @if($user->hasVerifiedEmail())
                                    <input type="text" class="form-control text-success" id="emailVerifiedInput" value="{{ trans('messages.yes') }}" disabled>
                                @else
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control text-danger" id="emailVerifiedInput" value="{{ trans('messages.no') }}" disabled>

                                        @if(! $user->isDeleted())
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-success" type="submit">{{ trans('admin.users.actions.verify-email') }}</button>
                                            </div>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </form>
                    @endif

                    <form action="{{ route('admin.users.2fa', $user) }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="2faInput">{{ trans('admin.users.fields.2fa') }}</label>

                            @if(! $user->hasTwoFactorAuth())
                                <input type="text" class="form-control text-danger" id="2faInput" value="{{ trans('messages.no') }}" disabled>
                            @else
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control text-success" id="2faInput" value="{{ trans('messages.yes') }}" disabled>

                                    <div class="input-group-append">
                                        <button class="btn btn-outline-danger" type="submit">{{ trans('admin.users.actions.disable-2fa') }}</button>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </form>

                    <div class="form-group">
                        <label for="addressInput">{{ trans('admin.users.fields.ip') }}</label>
                        <input type="text" class="form-control" id="addressInput" value="{{ $user->last_login_ip ?? trans('messages.unknown') }}" disabled>
                    </div>

                    @if($user->game_id)
                        <div class="form-group">
                            <label for="idInput">{{ game()->trans('id') }}</label>
                            <input type="text" class="form-control" id="idInput" value="{{ $user->game_id }}" disabled>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @if(! $user->isBanned())
        <div class="modal fade show" id="banModal" tabindex="-1" role="dialog" aria-labelledby="banLabel" aria-modal="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="banLabel">{{ trans('admin.users.ban-title', ['user' => $user->name]) }}</h2>
                        <button class="close" type="button" data-dismiss="modal" aria-label="{{ trans('messages.actions.close') }}">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>{{ trans('admin.users.ban-description') }}</p>

                        <form method="POST" action="{{ route('admin.users.bans.store', $user) }}">
                            @csrf

                            <div class="form-group">
                                <label for="reasonInput">{{ trans('admin.bans.fields.reason') }}</label>
                                <input type="text" class="form-control @error('reason') is-invalid @enderror" id="reasonInput" name="reason" required>

                                @error('reason')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <button class="btn btn-secondary" type="button" data-dismiss="modal">{{ trans('messages.actions.cancel') }}</button>

                            <button class="btn btn-danger" type="submit">
                                <i class="fas fa-ban"></i> {{ trans('admin.users.actions.ban') }}
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
                <h6 class="m-0 font-weight-bold text-primary">{{ trans('admin.logs.title') }}</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">{{ trans('messages.fields.action') }}</th>
                            <th scope="col">{{ trans('messages.fields.date') }}</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($logs as $log)
                            <tr>
                                <th scope="row">{{ $log->id }}</th>
                                <td>
                                    <i class="text-{{ $log->getActionFormat()['color'] }} fas fa-{{ $log->getActionFormat()['icon'] }}"></i>
                                    {{ $log->getActionMessage() }}
                                </td>
                                <td>{{ format_date_compact($log->created_at) }}</td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>

                {{ $logs->links() }}
            </div>
        </div>
    @endif
@endsection
