@extends('admin.layouts.admin')

@section('title', trans('admin.users.title'))

@section('content')
    <form class="row row-cols-lg-auto g-3 align-items-center" action="{{ route('admin.users.index') }}" method="GET">
        <div class="col-12 mb-3">
            <label class="visually-hidden" for="searchInput">
                {{ trans('messages.actions.search') }}
            </label>

            <div class="input-group">
                <input type="search" class="form-control" id="searchInput" name="search" value="{{ $search ?? '' }}" placeholder="{{ trans('messages.actions.search') }}">

                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-search"></i>
                </button>
            </div>
        </div>
    </form>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{ trans('auth.name') }}</th>
                        <th scope="col">{{ oauth_login() ? game()->trans('id') : trans('auth.email') }}</th>
                        <th scope="col">{{ trans('messages.fields.role') }}</th>
                        <th scope="col">{{ trans('admin.users.registered') }}</th>
                        <th scope="col">{{ trans('messages.fields.action') }}</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($users as $user)
                        <tr>
                            <th scope="row">
                                {{ $user->id }}

                                @if($user->isDeleted())
                                    <i class="bi bi-person-x text-dark" title="{{ trans('admin.users.deleted') }}" data-bs-toggle="tooltip"></i>
                                @elseif($user->isAdmin())
                                    <i class="bi bi-trophy text-warning" title="{{ trans('admin.users.admin') }}" data-bs-toggle="tooltip"></i>
                                @endif
                                @if($user->isBanned())
                                    <i class="bi bi-slash-circle text-danger" title="{{ trans('admin.users.banned') }}" data-bs-toggle="tooltip"></i>
                                @endif
                            </th>
                            <td @if($user->isDeleted()) class="text-decoration-line-through" @endif>
                                {{ $user->name }}
                            </td>
                            <td @if($user->isDeleted()) class="text-decoration-line-through" @endif>
                                {{ oauth_login() ? ($user->game_id ?? trans('messages.unknown')) : $user->email }}
                            </td>
                            <td>
                                <span class="badge" style="{{ $user->role->getBadgeStyle() }}">
                                    {{ $user->role->name }}
                                </span>
                            </td>
                            <td>
                                {{ format_date($user->created_at) }}
                            </td>
                            <td>
                                <a href="{{ route('admin.users.edit', $user) }}" class="mx-1" title="{{ trans('messages.actions.edit') }}" data-bs-toggle="tooltip"><i class="bi bi-pencil-square"></i></a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>

            {{ $users->withQueryString()->links() }}

            @if(! oauth_login())
                <a class="btn btn-primary" href="{{ route('admin.users.create') }}">
                    <i class="bi bi-plus-lg"></i> {{ trans('messages.actions.add') }}
                </a>
            @endif

            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#notificationModal">
                <i class="bi bi-megaphone"></i> {{ trans('admin.users.notify') }}
            </button>
        </div>
    </div>

    <div class="modal fade" id="notificationModal" tabindex="-1" role="dialog" aria-labelledby="notificationLabel" aria-modal="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="notificationLabel">
                        {{ trans('admin.users.notify') }}
                    </h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h3>{{ trans('admin.users.notify_info') }}</h3>

                    <form method="POST" action="{{ route('admin.users.notify') }}">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label" for="contentInput">{{ trans('messages.fields.content') }}</label>
                            <input type="text" class="form-control @error('content') is-invalid @enderror" id="contentInput" name="content" required maxlength="100">

                            @error('content')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="levelSelect">{{ trans('messages.notifications.level') }}</label>
                            <select class="form-select @error('level') is-invalid @enderror" id="levelSelect" name="level" required>
                                @foreach($notificationLevels as $level)
                                    <option value="{{ $level }}">
                                        {{ trans('messages.notifications.'.$level) }}
                                    </option>
                                @endforeach
                            </select>

                            @error('level')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <button class="btn btn-warning" type="submit">
                            <i class="bi bi-megaphone"></i> {{ trans('messages.actions.send') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
