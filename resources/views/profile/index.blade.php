@extends('layouts.app')

@section('title', trans('messages.profile.title'))
@section('content')
<div class="profile">
    <h1>{{ trans('messages.profile.title') }}</h1>
    <div class="row d-flex flex-column-reverse flex-md-row">
        <div class="col-md-7">
            <div class="card mb-4">
                <div class="card-body">
                    @if(! oauth_login() && $canChangeName)
                        <form action="{{ route('profile.name') }}" method="POST" class="editable-section" data-editable-card="2">
                            @csrf
                            <div class="mb-3">
                                <label for="nameInput" class="form-label">{{ trans('auth.name') }}</label>
                                <div class="input-group">
                                    <input type="text" id="nameInput" name="name"
                                           class="form-control @error('name') is-invalid @enderror"
                                           value="{{ old('name', $user->name) }}" disabled required>
                                    <button type="button" class="btn btn-primary btn-edit"><i class="bi bi-pen"></i></button>
                                </div>
                                @error('name')
                                    <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary btn-submit d-none"><i class="bi bi-check-lg"></i> {{ trans('messages.actions.update') }}</button>
                                <button type="button" class="btn btn-link btn-cancel d-none">{{ trans('messages.actions.cancel') }}</button>
                            </div>
                        </form>
                    @endif
                    
                    @if($canVerifyEmail)
                        @if(session('resent'))
                            <div class="alert alert-success">{{ trans('auth.verification.sent') }}</div>
                        @endif
                        <div class="alert alert-warning">
                            <p>{{ trans('messages.profile.email_verification') }}</p>
                            <p>{{ trans('auth.verification.request') }}</p>
                            <form method="POST" action="{{ route('verification.resend') }}">@csrf
                                <button class="btn btn-primary"><i class="bi bi-send"></i> {{ trans('auth.verification.resend') }}</button>
                            </form>
                        </div>
                    @endif

                    <form action="{{ route('profile.email') }}" method="POST" class="editable-section" data-editable-card="0">
                        @csrf
                        <div class="mb-3">
                            <label for="emailInput" class="form-label">{{ trans('auth.email') }}</label>
                            <div class="input-group">
                                <input type="email" id="emailInput" name="email"
                                       class="form-control @error('email') is-invalid @enderror"
                                       value="{{ old('email', $user->email) }}" disabled required>
                                <button type="button" class="btn btn-primary btn-edit"><i class="bi bi-pen"></i></button>
                            </div>
                            @error('email')
                                <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        @if(! oauth_login())
                            <div class="mb-3 confirm-field d-none">
                                <label for="emailConfirmPassInput" class="form-label">{{ trans('auth.current_password') }}</label>
                                <input type="password" show-password id="emailConfirmPassInput" name="email_confirm_pass"
                                       class="form-control @error('email_confirm_pass') is-invalid @enderror" required>
                                @error('email_confirm_pass')
                                    <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        @endif
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary btn-submit d-none"><i class="bi bi-check-lg"></i> {{ trans('messages.actions.update') }}</button>
                            <button type="button" class="btn btn-link btn-cancel d-none">{{ trans('messages.actions.cancel') }}</button>
                        </div>
                    </form>

                    @if(! oauth_login())
                        <form action="{{ route('profile.password') }}" method="POST" class="editable-section" data-editable-card="1">
                            @csrf
                            <div class="mb-3">
                                <label for="passwordConfirmPassInput" class="form-label">{{ trans('auth.current_password') }}</label>
                                <div class="input-group">
                                    <input type="password" show-password id="passwordConfirmPassInput"
                                           name="password_confirm_pass" class="form-control @error('password_confirm_pass') is-invalid @enderror"
                                           placeholder="******" disabled required>
                                    <button type="button" class="btn btn-primary btn-edit"><i class="bi bi-pen"></i></button>
                                </div>
                                @error('password_confirm_pass')
                                    <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="mb-3 confirm-field d-none">
                                <label for="passwordInput" class="form-label">{{ trans('auth.password') }}</label>
                                <input type="password" show-password id="passwordInput"
                                       name="password" placeholder="******"
                                       class="form-control @error('password') is-invalid @enderror" required>
                                @error('password')
                                    <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="mb-3 confirm-field d-none">
                                <label for="confirmPasswordInput" class="form-label">{{ trans('auth.confirm_password') }}</label>
                                <input type="password" show-password id="confirmPasswordInput"
                                       name="password_confirmation" placeholder="******" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary btn-submit d-none"><i class="bi bi-check-lg"></i> {{ trans('messages.actions.update') }}</button>
                                <button type="button" class="btn btn-link btn-cancel d-none">{{ trans('messages.actions.cancel') }}</button>
                            </div>
                        </form>
                    @endif
                    
                    <div class="mb-3">
                        @if(! oauth_login())

                            <p>{!! trans('messages.profile.info.2fa', ['2fa' => '<span class="'.($user->hasTwoFactorAuth()?'text-success':'text-danger').'">'.trans_bool($user->hasTwoFactorAuth()).'</span>']) !!}</p>

                            <a class="btn btn-primary mb-3" href="{{ route('profile.2fa.index') }}">
                                <i class="bi bi-shield-lock"></i> 
                                {{ $user->hasTwoFactorAuth() ? trans('messages.profile.2fa.manage') : trans('messages.profile.2fa.enable') }}
                            </a>
                        @endif

                        @if($enableDiscordLink)
                            <p>
                                {{ trans('messages.profile.discord.link') }}
                            </p>
                            @if($discordAccount)
                                <form action="{{ route('profile.discord.unlink') }}" method="POST">@csrf
                                    <button class="btn btn-danger"><i class="bi bi-discord"></i> {{ trans('messages.profile.discord.unlink') }}</button>
                                </form>
                            @else    
                                <a class="btn btn-primary" href="{{ route('profile.discord.link') }}">
                                    <i class="bi bi-discord"></i> {{ trans('messages.profile.discord.link') }}
                                </a>
                            @endif
                        @endif

                        @if(! oauth_login())
                            @if($canDelete)
                                <p>
                                    {{ trans('messages.profile.delete.btn') }}
                                </p>
                                <a class="btn btn-outline-danger" href="{{ route('profile.delete.index') }}">
                                    <i class="bi bi-x-lg"></i> {{ trans('messages.profile.delete.btn') }}
                                </a>
                            @endif
                        @endif
                    </div>

                </div>
            </div>

            @foreach($cards ?? [] as $card)
                <div class="card mb-4">
                    <div class="card-body">
                        <h2 class="card-title">{{ $card['name'] }}</h2>
                        @include($card['view'], $card['data'] ?? [])
                    </div>
                </div>
            @endforeach
        </div>

        <div class="col-md-5">
            <div class="card mb-4">
                <img src="{{ setting('background') ? image_url(setting('background')) : 'https://dummyimage.com/2000x500/000/aaa' }}" class="card-img-top" alt="website background">
            
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-3">
                            <form id="avatarForm" action="{{ route('profile.avatar') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <label for="avatarInput" style="cursor: pointer;">
                                    <img src="{{ $user->getAvatar(150) }}" style="margin-top:-50px;" class="rounded img-fluid mb-2" alt="{{ $user->name }}">
                                </label>
                                <input type="file" name="image" id="avatarInput" accept=".jpg,.jpeg,.png,.gif" class="d-none" onchange="document.getElementById('avatarForm').submit()">
                            </form>
            
                        </div>
            
                        <div class="col-9">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex flex-column justify-content-center">
                                    <h2 class="d-flex justify-content-between">{{ $user->name }}</h2>
                                    <h3 class="h5 mb-0">
                                        <span style="color:{{ $user->role->color }};">
                                            @if($user->role->icon)<i class="{{ $user->role->icon }}"></i>@endif {{ $user->role->name }}
                                        </span>
                                    </h3>
                                    
                                    <ul class="list-unstyled">
                                    
                                        @if($user->game_id)<li>{{ game()->trans('id') }}: {{ $user->game_id }}</li>@endif
                                        @if($discordAccount)<li>{{ trans('messages.profile.info.discord', ['user' => $discordAccount->name]) }}</li>@endif
                                    </ul>
                                </div>
                                <div class="d-flex flex-column align-items-end">
                                    <p>{{ trans('messages.profile.info.register', ['date' => $user->created_at->format('d/m/Y')]) }}
                                    </p>
                                    <div class="d-inline-flex align-items-center badge bg-primary text-white px-3 py-2">
                                        <i class="bi bi-wallet2 me-2"></i>
                                        <span>{{ format_money($user->money) }}</span>
                                    
                                        @if(setting('users.money_transfer'))
                                        <button type="button" class="btn btn-sm btn-light text-primary ms-3 d-flex align-items-center" 
                                            data-bs-toggle="modal" data-bs-target="#transferModal" style="padding: 0.25rem 0.5rem;">
                                            <i class="bi bi-send"></i>
                                        </button>
                                        @endif
                                    </div>
                                </div>
                            </div>
            
                            @if($hasAvatar)
                                <form action="{{ route('profile.avatar') }}" method="POST">@csrf @method('DELETE')
                                    <button class="btn btn-danger"><i class="bi bi-trash"></i> {{ trans('messages.profile.delete_avatar') }}</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @if(setting('users.money_transfer'))
            <div class="modal fade" id="transferModal" tabindex="-1" aria-labelledby="transferModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form class="modal-content" action="{{ route('profile.transfer-money') }}" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="transferModalLabel">{{ trans('messages.profile.money_transfer.title') }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="transferName" class="form-label">{{ game()->userPrimaryAttributeName() }}</label>
                                <input type="text" id="transferName" name="name" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="moneyInput" class="form-label">{{ trans('messages.fields.money') }}</label>
                                <input type="number" id="moneyInput" name="money" class="form-control" min="0" step="0.01" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary"><i class="bi bi-send"></i> {{ trans('messages.actions.send') }}</button>
                        </div>
                    </form>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function(){
  const allSections = document.querySelectorAll('.editable-section');

  allSections.forEach(section => {
    const btnEdit       = section.querySelector('.btn-edit');
    const btnCancel     = section.querySelector('.btn-cancel');
    const btnSubmit     = section.querySelector('.btn-submit');
    const inputs        = section.querySelectorAll('input');
    const confirmFields = section.querySelectorAll('.confirm-field');
    const inputGroup    = btnEdit.closest('.input-group');
    const mainInput     = inputGroup.querySelector('.form-control');

    function initView() {
      if (!inputGroup.contains(btnEdit)) {
        inputGroup.appendChild(btnEdit);
      }
      inputs.forEach(i => i.disabled = true);
      confirmFields.forEach(f => f.classList.add('d-none'));
      btnSubmit.classList.add('d-none');
      btnCancel.classList.add('d-none');
      btnEdit.classList.remove('d-none');
      mainInput.classList.remove('rounded-end');
    }

    function openView() {
      allSections.forEach(s => {
        const cancelBtn = s.querySelector('.btn-cancel');
        if (cancelBtn) cancelBtn.click();
      });

      if (inputGroup.contains(btnEdit)) {
        inputGroup.removeChild(btnEdit);
      }
      inputs.forEach(i => i.disabled = false);
      confirmFields.forEach(f => f.classList.remove('d-none'));
      btnSubmit.classList.remove('d-none');
      btnCancel.classList.remove('d-none');
      btnEdit.classList.add('d-none');
      mainInput.classList.add('rounded-end');
    }

    btnEdit.addEventListener('click', openView);
    btnCancel.addEventListener('click', initView);

    initView();

    if (section.querySelector('.is-invalid')) {
      openView();
    }
  });
});

</script>
@endpush
