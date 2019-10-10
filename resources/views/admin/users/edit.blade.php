@extends('admin.layouts.admin')

@section('title', 'Edit user #'.$user->id)

@section('content')
    @if($user->is_deleted)
        <div class="alert alert-danger">
            This user is deleted, it can't be edited.
        </div>
    @elseif($user->is_banned)
        <div class="alert alert-warning shadow">
            <h5>This user is currently banned:</h5>
            <ul>
                <li>Banned by: {{ $user->ban->author->name }}</li>
                <li>Reason: {{ $user->ban->reason }}</li>
                <li>Date: {{ $user->ban->created_at }}</li>
            </ul>

            <form method="POST" action="{{ route('admin.users.bans.destroy', [$user, $user->ban]) }}">
                @method('DELETE')
                @csrf

                <button type="submit" class="btn btn-warning"><i class="fas fa-ban"></i> Unban</button>
            </form>
        </div>
    @endif

    <div class="row">
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Edit profile</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.users.update', $user) }}" method="POST">
                        @method('PATCH')
                        @csrf

                        <div class="form-group">
                            <label for="nameInput">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="nameInput" name="name" value="{{ old('name', $user->name) }}" required @if($user->is_deleted) disabled @endif>

                            @error('name')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="emailInput">E-Mail Address</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="emailInput" name="email" value="{{ old('email', $user->email) }}" required @if($user->is_deleted) disabled @endif>

                            @error('email')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="passwordInput">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="passwordInput" name="password" placeholder="**********" @if($user->is_deleted) disabled @endif>

                            @error('password')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="roleSelect">Role</label>
                            <select class="custom-select @error('role') is-invalid @enderror" id="roleSelect" name="role" @if($user->is_deleted) disabled @endif>
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}" @if($user->role_id === $role->id) selected @endif>{{ $role->name }}</option>
                                @endforeach
                            </select>

                            @error('role')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary" @if($user->is_deleted) disabled @endif>Update</button>
                        @unless($user->is_banned || $user->is_deleted)
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#banModal">Ban</button>
                        @endunless
                        @unless($user->is_deleted)
                            <a href="{{ route('admin.users.destroy', $user) }}" class="btn btn-danger @if($user->isAdmin()) disabled @endif" data-confirm="delete" @if($role->isPermanent()) disabled @endif>Delete</a>
                        @endunless
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">User information</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="registerInput">Register at</label>
                        <input type="text" class="form-control" id="registerInput" value="{{ $user->created_at }}" disabled>
                    </div>

                    <form action="{{ route('admin.users.verify', $user) }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="emailVerifiedInput">Email verified</label>

                            @if($user->hasVerifiedEmail())
                                <input type="text" class="form-control text-success" id="emailVerifiedInput" value="Yes" disabled>
                            @else
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control text-danger" id="emailVerifiedInput" value="No" disabled>

                                    @unless($user->is_deleted)
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-success" type="submit">Verify email</button>
                                        </div>
                                    @endunless
                                </div>
                            @endif
                        </div>
                    </form>

                    <form action="{{ route('admin.users.2fa', $user) }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="2faInput">Two Factor Auth verification</label>

                            @if(! $user->hasTwoFactorAuth())
                                <input type="text" class="form-control text-danger" id="2faInput" value="No" disabled>
                            @else
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control text-success" id="2faInput" value="Yes" disabled>

                                    <div class="input-group-append">
                                        <button class="btn btn-outline-danger" type="submit">Disable 2fa</button>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </form>

                    <div class="form-group">
                        <label for="addressInput">Address</label>
                        <input type="text" class="form-control" id="addressInput" value="{{ $user->last_ip ?? 'Unknown' }}" disabled>
                    </div>

                </div>
            </div>
        </div>
    </div>

    @unless($user->is_banned)
        <div class="modal fade show" id="banModal" tabindex="-1" role="dialog" aria-labelledby="banLabel" aria-modal="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="banLabel">Ban {{ $user->name }}</h2>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to ban this user ?</p>

                        <form method="POST" action="{{ route('admin.users.bans.store', $user) }}">
                            @csrf

                            <div class="form-group">
                                <label for="reasonInput">Reason</label>
                                <input type="text" class="form-control" id="reasonInput" name="reason" required>
                            </div>

                            <button class="btn btn-danger" type="submit">Ban</button>
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endunless
@endsection
