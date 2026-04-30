@extends('admin.layouts.admin')

@section('title', trans('admin.roles.edit', ['role' => $role->name, 'id' => $role->id]))

@section('content')
    <div class="mb-3">
        <a href="{{ route('admin.roles.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> {{ trans('admin.roles.back') }}
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admin.roles.update', $role) }}" method="POST">
                @method('PUT')

                @include('admin.roles._form')

                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> {{ trans('messages.actions.save') }}
                </button>

                @if(! $role->isDefault())
                    @can('delete', $role)
                        <a href="{{ route('admin.roles.destroy', $role) }}" class="btn btn-danger" data-confirm="delete">
                            <i class="bi bi-trash"></i> {{ trans('messages.actions.delete') }}
                        </a>
                    @endcan
                @endif
            </form>
        </div>
    </div>

    @if($copySources->isNotEmpty())
        <div class="card shadow mb-4">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="bi bi-clipboard"></i> {{ trans('admin.roles.copy_title') }}
                </h5>
            </div>
            <div class="card-body">
                <p class="text-body-secondary mb-3">{{ trans('admin.roles.copy_info') }}</p>

                <form action="{{ route('admin.roles.copy-permissions', $role) }}" method="POST" class="row g-3 align-items-end">
                    @csrf

                    <div class="col-md-6">
                        <label class="form-label" for="sourceRole">{{ trans('admin.roles.copy_from') }}</label>
                        <select class="form-select" name="source_role" id="sourceRole" required>
                            <option value="">{{ trans('admin.roles.copy_select') }}</option>
                            @foreach($copySources as $source)
                                <option value="{{ $source->id }}">
                                    {{ $source->name }} {{ trans('admin.roles.info', ['id' => $source->id, 'power' => $source->power]) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-auto">
                        <div class="form-check form-switch">
                            <input type="checkbox" class="form-check-input" id="copyMerge" name="merge" value="1">
                            <label class="form-check-label" for="copyMerge">{{ trans('admin.roles.copy_merge') }}</label>
                        </div>
                        <small class="form-text text-body-secondary">{{ trans('admin.roles.copy_merge_info') }}</small>
                    </div>

                    <div class="col-md-auto">
                        <button type="submit" class="btn btn-primary" data-confirm-copy>
                            <i class="bi bi-clipboard-check"></i> {{ trans('admin.roles.copy_submit') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endif

    @push('footer-scripts')
        <script>
            document.querySelectorAll('[data-confirm-copy]').forEach(function (button) {
                button.addEventListener('click', function (event) {
                    if (!confirm('{{ trans('admin.roles.copy_confirm') }}')) {
                        event.preventDefault();
                    }
                });
            });
        </script>
    @endpush
@endsection
