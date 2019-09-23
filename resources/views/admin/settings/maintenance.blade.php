@extends('admin.layouts.admin')

@section('title', 'Maintenance')

@include('admin.elements.editor')

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.settings.update-maintenance') }}" method="POST">
                @csrf

                <div class="form-group custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="enableSwitch" name="enable-maintenance" @if($enable) checked @endif>
                    <label class="custom-control-label" for="enableSwitch">Enable maintenance</label>
                </div>

                <div class="form-group">
                    <label for="maintenanceArea">Maintenance message</label>
                    <textarea class="form-control html-editor @error('maintenance') is-invalid @enderror" id="maintenanceArea" name="maintenance">{{ old('maintenance', $maintenance) }}</textarea>

                    @error('maintenance')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
