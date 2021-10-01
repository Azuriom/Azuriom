@csrf

<div class="form-group">
    <label for="sourceInput">{{ trans('admin.redirects.source') }}</label>
    <div class="input-group">
        <div class="input-group-prepend">
            <div class="input-group-text">{{ url('/') }}/</div>
        </div>
        <input type="text" class="form-control @error('source') is-invalid @enderror" id="sourceInput" name="source" value="{{ old('source', $redirect->source ?? '') }}" required>

        @error('source')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-6">
        <label for="destinationInput">{{ trans('admin.redirects.destination') }}</label>
        <input type="text" class="form-control @error('target') is-invalid @enderror" id="destinationInput" name="destination" value="{{ old('destination', $redirect->destination ?? '') }}" required>

        @error('target')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>

    <div class="form-group col-md-6">
        <label for="codeSelect">{{ trans('admin.redirects.code') }}</label>
        <select class="custom-select @error('code') is-invalid @enderror" id="codeSelect" name="code" required>
            <option value="301" @if(($redirect->code ?? 0) === 301) selected @endif>
                {{ trans('admin.redirects.301') }}
            </option>
            <option value="302" @if(($redirect->code ?? 0) === 302) selected @endif>
                {{ trans('admin.redirects.302') }}
            </option>
        </select>

        @error('code')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>
</div>

<div class="form-group custom-control custom-switch">
    <input type="checkbox" class="custom-control-input" id="enableSwitch" name="is_enabled" @if($redirect->is_enabled ?? true) checked @endif>
    <label class="custom-control-label" for="enableSwitch">{{ trans('admin.redirects.enable') }}</label>
</div>
