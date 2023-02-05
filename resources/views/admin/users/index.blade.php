@extends('admin.layouts.admin')

@section('title', trans('admin.users.title'))

@section('content')
    <form class="row g-3 align-items-center" action="{{ route('admin.users.index') }}" method="GET">
        <div class="col-md4 col-12 mb-3">
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

    @include('admin.users._notify', ['route' => route('admin.users.notify.all'), 'all' => true])
@endsection
