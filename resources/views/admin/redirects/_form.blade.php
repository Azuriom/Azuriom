@csrf

<div class="form-group">
    <label for="titleInput">{{ trans('messages.fields.title') }}</label>
    <input type="text" class="form-control @error('target') is-invalid @enderror" id="titleInput" name="target" value="{{ old('target', $redirect->target ?? '') }}" required>

    @error('target')
    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
    @enderror
</div>

<div class="form-group">
    <label for="slugInput">{{ trans('messages.fields.slug') }}</label>
    <div class="input-group">
        <div class="input-group-prepend">
            <div class="input-group-text">{{ url('/') }}/</div>
        </div>
        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slugInput" name="slug" value="{{ old('slug', $redirect->slug ?? '') }}" required>

        @error('slug')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>
</div>

<div class="form-group custom-control custom-switch">
    <input type="checkbox" class="custom-control-input" id="enableSwitch" name="is_enabled" @if($redirect->is_enabled ?? true) checked @endif>
    <label class="custom-control-label" for="enableSwitch">{{ trans('admin.redirects.enable') }}</label>
</div>

<div class="form-group custom-control custom-switch">
    <input type="checkbox" class="custom-control-input" id="moved_permanently" name="moved_permanently" @if($redirect->moved_permanently ?? true) checked @endif>
    <label class="custom-control-label" for="moved_permanently">{{ trans('admin.redirects.permanently') }}</label>
</div>
