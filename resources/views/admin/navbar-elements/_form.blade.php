@csrf

<div class="row g-3">
    <div class="mb-3 col-md-4">
        <label class="form-label" for="nameInput">{{ trans('messages.fields.name') }}</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="nameInput" name="name" value="{{ old('name', $navbarElement->raw_name ?? '') }}" required>

        @error('name')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>

    <div class="mb-3 col-md-4">
        <label class="form-label" for="iconInput">{{ trans('messages.fields.icon') }}</label>

        <div class="input-group @error('icon') has-validation @enderror">
            <span class="input-group-text"><i class="{{ $navbarElement->icon ?? 'bi bi-house' }}"></i></span>

            <input type="text" class="form-control @error('icon') is-invalid @enderror" id="iconInput" name="icon" value="{{ old('icon', $navbarElement->icon ?? '') }}" placeholder="bi bi-house" aria-labelledby="iconLabel">

            @error('icon')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <small id="iconLabel" class="form-text">@lang('messages.icons')</small>
    </div>

    <div class="mb-3 col-md-4">
        <label class="form-label" for="typeSelect">{{ trans('messages.fields.type') }}</label>
        <select class="form-select @error('type') is-invalid @enderror" id="typeSelect" name="type" required v-model="type">
            @foreach($types as $type)
                <option value="{{ $type }}" @selected($type === old('type', $navbarElement->type ?? ''))>{{ trans('admin.navbar_elements.fields.'.$type) }}</option>
            @endforeach
        </select>

        @error('type')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>
</div>

<div v-show="type === 'page'" class="mb-3">
    <label class="form-label" for="pageSelect">{{ trans('admin.navbar_elements.fields.page') }}</label>
    <select class="form-select @error('page') is-invalid @enderror" id="pageSelect" name="page">
        @foreach($pages as $page)
            <option value="{{ $page->id }}" @selected(isset($navbarElement) && ($navbarElement->getTypeValue('page') === $page->slug))>{{ $page->title }}</option>
        @endforeach
    </select>

    @error('page')
    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
    @enderror
</div>

<div v-show="type === 'post'" class="mb-3">
    <label class="form-label" for="postSelect">{{ trans('admin.navbar_elements.fields.post') }}</label>
    <select class="form-select @error('post') is-invalid @enderror" id="postSelect" name="post">
        @foreach($posts as $post)
            <option value="{{ $post->id }}" @selected(isset($navbarElement) && ($navbarElement->getTypeValue('post') === $post->slug))>{{ $post->title }}</option>
        @endforeach
    </select>

    @error('post')
    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
    @enderror
</div>

<div v-show="type === 'link'" class="mb-3">
    <label class="form-label" for="linkInput">{{ trans('messages.fields.link') }}</label>
    <input type="text" class="form-control @error('link') is-invalid @enderror" id="linkInput" name="link" value="{{ old('link', (isset($navbarElement) ? $navbarElement->getTypeValue('link') : '')) }}">

    @error('link')
    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
    @enderror
</div>

<div v-show="type === 'plugin'" class="mb-3">
    <label class="form-label" for="pluginSelect">{{ trans('messages.fields.link') }}</label>
    <select class="form-select @error('plugin') is-invalid @enderror" id="pluginSelect" name="plugin">
        @foreach($pluginRoutes as $route => $name)
            <option value="{{ $route  }}" @selected(isset($navbarElement) && ($navbarElement->getTypeValue('plugin') === $route))>{{ trans($name) }}</option>
        @endforeach
    </select>

    @error('plugin')
    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
    @enderror
</div>

<div v-show="type === 'dropdown'">
    <small class="form-text text-info mb-3">{{ trans('admin.navbar_elements.dropdown') }}</small>
</div>

<div class="mb-3 form-check form-switch">
    <input type="checkbox" class="form-check-input" id="newTabSwitch" name="new_tab" @checked($navbarElement->new_tab ?? false)>
    <label class="form-check-label" for="newTabSwitch">{{ trans('admin.navbar_elements.fields.new_tab') }}</label>
</div>

<div class="mb-3 mb-2">
    <div class="form-check form-switch">
        <input type="checkbox" class="form-check-input" id="restrictedSwitch" name="restricted" data-bs-toggle="collapse" data-bs-target="#rolesGroup" @checked(isset($navbarElement) && $navbarElement->isRestricted())>
        <label class="form-check-label" for="restrictedSwitch">{{ trans('admin.navbar_elements.restrict') }}</label>
    </div>
</div>

<div id="rolesGroup" class="{{ (isset($navbarElement) && $navbarElement->isRestricted()) ? 'show' : 'collapse' }}">
    <div class="card card-body mb-2">
        <div class="row">
            @foreach($roles as $role)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="role{{ $role->id }}" name="roles[]" value="{{ $role->id }}" @checked(in_array($role->id, old('roles', isset($navbarElement) ? $navbarElement->roles->modelKeys() : []), true))>
                        <label class="form-check-label" for="role{{ $role->id }}">{{ $role->name }}</label>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
