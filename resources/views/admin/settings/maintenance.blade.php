@extends('admin.layouts.admin')

@section('title', trans('admin.settings.maintenance.title'))

@include('admin.elements.editor')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admin.settings.maintenance.update') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="maintenanceArea">{{ trans('admin.settings.maintenance.message') }}</label>
                    <textarea class="form-control html-editor @error('maintenance-message') is-invalid @enderror" id="maintenanceArea" name="maintenance-message" rows="5">{{ old('maintenance-message', $message) }}</textarea>

                    @error('maintenance-message')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="form-group custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="enableSwitch" name="maintenance-status" @if($status) checked @endif>
                    <label class="custom-control-label" for="enableSwitch">{{ trans('admin.settings.maintenance.enable') }}</label>
                </div>

                <div class="form-group mb-2">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="globalSwitch" name="is_global" data-toggle="collapse" data-target="#pathsGroup" @if($paths === null) checked @endif>
                        <label class="custom-control-label" for="globalSwitch">
                            {{ trans('admin.settings.maintenance.global') }}
                        </label>
                    </div>
                </div>

                <div id="pathsGroup" class="{{ $paths === null ? 'collapse' : 'show' }}">
                    <div class="card card-body mb-2">
                        <label>{{ trans('admin.settings.maintenance.paths') }}</label>

                        @include('admin.elements.list-input', ['name' => 'paths', 'values' => $paths, 'placeholder' => 'news/*'])

                        <small class="form-text">@lang('admin.settings.maintenance.info')</small>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> {{ trans('messages.actions.save') }}
                </button>
            </form>
        </div>
    </div>
@endsection
