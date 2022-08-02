@csrf

<div class="mb-3">
    <label class="form-label" for="titleInput">{{ trans('messages.fields.title') }}</label>
    <input type="text" class="form-control @error('title') is-invalid @enderror" id="titleInput" name="title" value="{{ old('title', $page->title ?? '') }}" required>

    @error('title')
    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label" for="descriptionInput">{{ trans('messages.fields.description') }}</label>
    <input type="text" class="form-control @error('description') is-invalid @enderror" id="descriptionInput" name="description" value="{{ old('description', $page->description ?? '') }}" required>

    @error('description')
    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label" for="slugInput">{{ trans('messages.fields.slug') }}</label>
    <div class="input-group @error('slug') has-validation @enderror">
        <span class="input-group-text">{{ url('/') }}/</span>
        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slugInput" name="slug" value="{{ old('slug', $page->slug ?? '') }}" required>

        @error('slug')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>
</div>

<div class="mb-3">
    <label class="form-label" for="textArea">{{ trans('messages.fields.content') }}</label>
    <textarea class="form-control html-editor @error('content') is-invalid @enderror" id="textArea" name="content" rows="5">{{ old('content', $page->content ?? '') }}</textarea>

    @error('content')
    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
    @enderror
</div>

<div class="mb-3 mb-2">
    <div class="form-check form-switch">
        <input type="checkbox" class="form-check-input" id="restrictedSwitch" name="restricted" data-bs-toggle="collapse" data-bs-target="#rolesGroup" @checked(isset($page) && $page->isRestricted())>
        <label class="form-check-label" for="restrictedSwitch">{{ trans('admin.pages.restrict') }}</label>
    </div>
</div>

<div id="rolesGroup" class="{{ (isset($page) && $page->isRestricted()) ? 'show' : 'collapse' }}">
    <div class="card card-body mb-2">
        <div class="row">
            @foreach($roles as $role)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="role{{ $role->id }}" name="roles[]" value="{{ $role->id }}" @checked(in_array($role->id, old('roles', isset($page) ? $page->roles->modelKeys() : []), true))>
                        <label class="form-check-label" for="role{{ $role->id }}">{{ $role->name }}</label>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<div class="mb-3 form-check form-switch">
    <input type="checkbox" class="form-check-input" id="enableSwitch" name="is_enabled" @checked($page->is_enabled ?? true)>
    <label class="form-check-label" for="enableSwitch">{{ trans('admin.pages.enable') }}</label>
</div>
