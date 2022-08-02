@csrf

<div class="mb-3">
    <label class="form-label" for="sourceInput">{{ trans('admin.redirects.source') }}</label>
    <div class="input-group @error('source') has-validation @enderror">
        <span class="input-group-text">{{ url('/') }}/</span>
        <input type="text" class="form-control @error('source') is-invalid @enderror" id="sourceInput" name="source" value="{{ old('source', $redirect->source ?? '') }}" required>

        @error('source')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>
</div>

<div class="row g-3">
    <div class="mb-3 col-md-6">
        <label class="form-label" for="destinationInput">{{ trans('admin.redirects.destination') }}</label>
        <input type="text" class="form-control @error('target') is-invalid @enderror" id="destinationInput" name="destination" value="{{ old('destination', $redirect->destination ?? '') }}" required>

        @error('target')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>

    <div class="mb-3 col-md-6">
        <label class="form-label" for="codeSelect">{{ trans('admin.redirects.code') }}</label>
        <select class="form-select @error('code') is-invalid @enderror" id="codeSelect" name="code" required>
            <option value="301" @selected(($redirect->code ?? 0) === 301)>
                {{ trans('admin.redirects.301') }}
            </option>
            <option value="302" @selected(($redirect->code ?? 0) === 302)>
                {{ trans('admin.redirects.302') }}
            </option>
        </select>

        @error('code')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>
</div>

<div class="mb-3 form-check form-switch">
    <input type="checkbox" class="form-check-input" id="enableSwitch" name="is_enabled" @checked($redirect->is_enabled ?? true)>
    <label class="form-check-label" for="enableSwitch">{{ trans('admin.redirects.enable') }}</label>
</div>
