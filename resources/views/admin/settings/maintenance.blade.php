@extends('admin.layouts.admin')

@section('title', trans('admin.settings.maintenance.title'))

@include('admin.elements.editor')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admin.settings.maintenance.update') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label" for="maintenanceArea">{{ trans('admin.settings.maintenance.message') }}</label>
                    <textarea class="form-control html-editor @error('maintenance_message') is-invalid @enderror" id="maintenanceArea" name="maintenance_message" rows="5">{{ old('maintenance_message', $message) }}</textarea>

                    @error('maintenance_message')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="mb-3 form-check form-switch">
                    <input type="checkbox" class="form-check-input" id="enableSwitch" name="maintenance_status" @checked($status)>
                    <label class="form-check-label" for="enableSwitch">{{ trans('admin.settings.maintenance.enable') }}</label>
                </div>

                <div class="mb-3 mb-2">
                    <div class="form-check form-switch">
                        <input type="checkbox" class="form-check-input" id="globalSwitch" name="is_global" data-bs-toggle="collapse" data-bs-target="#pathsGroup" @checked($paths === null)>
                        <label class="form-check-label" for="globalSwitch">
                            {{ trans('admin.settings.maintenance.global') }}
                        </label>
                    </div>
                </div>

                <div id="pathsGroup" class="{{ $paths === null ? 'collapse' : 'show' }}">
                    <div class="card card-body mb-2">
                        <label class="form-label">{{ trans('admin.settings.maintenance.paths') }}</label>

                        @include('admin.elements.list-input', ['name' => 'paths', 'values' => $paths, 'placeholder' => 'news/*'])

                        <small class="form-text">@lang('admin.settings.maintenance.info')</small>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> {{ trans('messages.actions.save') }}
                </button>
            </form>
        </div>
    </div>
@endsection
