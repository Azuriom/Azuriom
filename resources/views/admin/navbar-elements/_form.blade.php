@push('footer-scripts')
    <script>
        function updateType(el) {
            document.querySelectorAll('[data-nav-element]').forEach(function (e) {
                e.classList.add('d-none');
            });

            const current = document.querySelector('[data-nav-element="' + el.value + '"]');
            if (current) {
                current.classList.remove('d-none');
            }
        }

        const typeSelect = document.getElementById('typeSelect');

        updateType(typeSelect);

        typeSelect.addEventListener('change', function (ev) {
            updateType(ev.target);
        });
    </script>
@endpush

@csrf

<div class="form-row">
    <div class="form-group col-md-6">
        <label for="nameInput">{{ trans('messages.fields.name') }}</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="nameInput" name="name" value="{{ old('name', $navbarElement->name ?? '') }}" required>

        @error('name')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>

    <div class="form-group col-md-6">
        <label for="typeSelect">{{ trans('messages.fields.type') }}</label>
        <select class="custom-select @error('type') is-invalid @enderror" id="typeSelect" name="type" required>
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
            <option value="{{ $page->id }}" @if($page->slug === (isset($navbarElement) && $navbarElement->getTypeValue('page'))) selected @endif>{{ $page->title }}</option>
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
            <option value="{{ $post->id }}" @if($post->slug === (isset($navbarElement) && $navbarElement->getTypeValue('post'))) selected @endif>{{ $post->title }}</option>
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
            <option value="{{ $route  }}" @if($route === (isset($navbarElement) && $navbarElement->getTypeValue('plugin'))) selected @endif>{{ $name }}</option>
        @endforeach
    </select>

    @error('plugin')
    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
    @enderror
</div>

<div data-nav-element="dropdown" class="form-group d-none">
    <small>{{ trans('admin.navbar-elements.dropdown-info') }}</small>
</div>

<div class="form-group custom-control custom-switch">
    <input type="checkbox" class="custom-control-input" id="newTabSwitch" name="new_tab" @if($navbarElement->new_tab ?? false) checked @endif>
    <label class="custom-control-label" for="newTabSwitch">{{ trans('admin.navbar-elements.fields.new-tab') }}</label>
</div>
