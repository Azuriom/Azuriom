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
                <h3>{{ trans('admin.users.notify_'.(($all ?? false) ? 'all' : 'info')) }}</h3>

                <form method="POST" action="{{ $route }}">
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
