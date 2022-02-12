@csrf

@include('admin.elements.color-picker')

<div class="row g-3">
    <div class="mb-3 col-md-6">
        <label class="form-label" for="typeSelect">{{ trans('messages.fields.type') }}</label>
        <select class="form-select @error('type') is-invalid @enderror" id="typeSelect" name="type" required data-bs-toggle-select="social-type">
            @foreach($types as $type => $typeName)
                <option value="{{ $type }}" @if($type === old('type', $link->type ?? '')) selected @endif>
                    {{ $typeName }}
                </option>
            @endforeach
            <option value="other" @if(old('type', $link->type ?? '') === 'other') selected @endif>
                {{ trans('messages.other') }}
            </option>
        </select>

        @error('type')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>

    <div class="mb-3 col-md-6">
        <label class="form-label" for="valueInput">{{ trans('messages.fields.value') }}</label>
        <input type="url" class="form-control @error('value') is-invalid @enderror" id="valueInput" name="value" value="{{ old('value', $link->value ?? '') }}" required placeholder="https://twitter.com/Azuriom">

        @error('value')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>
</div>

<div data-social-type="other" class="mb-3 d-none">
    <div class="row g-3">
        <div class="mb-3 col-md-4">
            <label class="form-label" for="titleInput">{{ trans('messages.fields.title') }}</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="titleInput" name="title" value="{{ old('title', $link->title ?? '') }}">

            @error('title')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <div class="mb-3 col-md-4">
            <label class="form-label" for="iconInput">{{ trans('messages.fields.icon') }}</label>

            <div class="input-group has-validation">
                <span class="input-group-text"><i class="{{ $link->icon ?? 'fas fa-comments' }} fa-fw"></i></span>

                <input type="text" class="form-control @error('icon') is-invalid @enderror" id="iconInput" name="icon" value="{{ old('icon', $link->icon ?? '') }}" placeholder="fas fa-comments" aria-labelledby="iconLabel">

                @error('icon')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <small id="iconLabel" class="form-text">@lang('messages.fontawesome')</small>
        </div>

        <div class="mb-3 col-md-4">
            <label class="form-label" for="colorInput">{{ trans('messages.fields.color') }}</label>
            <input type="color" class="form-control form-control-color color-picker @error('color') is-invalid @enderror" id="colorInput" name="color" value="{{ old('color', $link->color ?? '#2196f3') }}">

            @error('color')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
    </div>
</div>
