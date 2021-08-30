@csrf

<div class="form-row">
    <div class="form-group col-md-6">
        <label for="nameInput">{{ trans('messages.fields.name') }}</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="nameInput" name="name" value="{{ (string) old('name', $navbarElement->name ?? '') }}" required>

        @error('name')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>

    <div class="form-group col-md-6">
        <label for="typeSelect">{{ trans('messages.fields.type') }}</label>
        <select class="custom-select @error('type') is-invalid @enderror" id="typeSelect" name="type" required data-toggle-select="nav-element">
            @foreach($types as $type)
                <option value="{{ $type }}" @if($type === old('type', $navbarElement->type ?? '')) selected @endif>{{ trans('admin.navbar-elements.fields.'.$type) }}</option>
            @endforeach
        </select>

        @error('type')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>
</div>

<div data-nav-element="page" class="form-group d-none">
    <label for="pageSelect">{{ trans('admin.navbar-elements.fields.page') }}</label>
    <select class="custom-select @error('page') is-invalid @enderror" id="pageSelect" name="page">
        @foreach($pages as $page)
            <option value="{{ $page->id }}" @if(isset($navbarElement) && ($navbarElement->getTypeValue('page') === $page->slug)) selected @endif>{{ $page->title }}</option>
        @endforeach
    </select>

    @error('page')
    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
    @enderror
</div>

<div data-nav-element="post" class="form-group d-none">
    <label for="postSelect">{{ trans('admin.navbar-elements.fields.post') }}</label>
    <select class="custom-select @error('post') is-invalid @enderror" id="postSelect" name="post">
        @foreach($posts as $post)
            <option value="{{ $post->id }}" @if(isset($navbarElement) && ($navbarElement->getTypeValue('post') === $post->slug)) selected @endif>{{ $post->title }}</option>
        @endforeach
    </select>

    @error('post')
    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
    @enderror
</div>

<div data-nav-element="link" class="form-group d-none">
    <label for="linkInput">{{ trans('messages.fields.link') }}</label>
    <input type="text" class="form-control @error('link') is-invalid @enderror" id="linkInput" name="link" value="{{ old('link', (isset($navbarElement) ? $navbarElement->getTypeValue('link') : '')) }}">

    @error('link')
    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
    @enderror
</div>

<div data-nav-element="plugin" class="form-group d-none">
    <label for="pluginSelect">{{ trans('messages.fields.link') }}</label>
    <select class="custom-select @error('plugin') is-invalid @enderror" id="pluginSelect" name="plugin">
        @foreach($pluginRoutes as $route => $name)
            <option value="{{ $route  }}" @if(isset($navbarElement) && ($navbarElement->getTypeValue('plugin') === $route)) selected @endif>{{ trans($name) }}</option>
        @endforeach
    </select>

    @error('plugin')
    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
    @enderror
</div>

<div data-nav-element="dropdown" class="d-none">
    <small class="form-text text-info mb-3">{{ trans('admin.navbar-elements.dropdown-info') }}</small>
</div>

<div class="form-group custom-control custom-switch">
    <input type="checkbox" class="custom-control-input" id="newTabSwitch" name="new_tab" @if($navbarElement->new_tab ?? false) checked @endif>
    <label class="custom-control-label" for="newTabSwitch">{{ trans('admin.navbar-elements.fields.new-tab') }}</label>
</div>

<div class="form-group mb-2">
    <div class="custom-control custom-switch">
        <input type="checkbox" class="custom-control-input" id="restrictedSwitch" name="restricted" data-toggle="collapse" data-target="#rolesGroup" @if(isset($navbarElement) && $navbarElement->isRestricted()) checked @endif aria-describedby="adminInfo">
        <label class="custom-control-label" for="restrictedSwitch">{{ trans('admin.navbar-elements.restrict') }}</label>
    </div>
</div>

<div id="rolesGroup" class="{{ (isset($navbarElement) && $navbarElement->isRestricted()) ? 'show' : 'collapse' }}">
    <div class="card card-body mb-2">
        <div class="row">
            @foreach($roles as $role)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="form-group custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="role{{ $role->id }}" name="roles[]" value="{{ $role->id }}" @if(in_array($role->id, old('roles', isset($navbarElement) ? $navbarElement->roles->modelKeys() : []), true)) checked @endif>
                        <label class="custom-control-label" for="role{{ $role->id }}">{{ $role->name }}</label>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
