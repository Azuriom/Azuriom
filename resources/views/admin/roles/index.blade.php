@extends('admin.layouts.admin')

@section('title', trans('admin.roles.title'))

@if(Auth::user()->isAdmin())
    @push('footer-scripts')
        <script src="{{ asset('vendor/sortablejs/Sortable.min.js') }}"></script>
        <script>
            const sortable = Sortable.create(document.getElementById('roles'), {
                animation: 150,
                group: 'role',
                handle: '.sortable-handle',
            });

            function serialize(sortable) {
                return [].slice.call(sortable.children).map(function (child) {
                    return child.dataset['id'];
                });
            }

            const saveButton = document.getElementById('save');

            saveButton.addEventListener('click', function () {
                saveButton.setAttribute('disabled', '');

                axios.post('{{ route('admin.roles.update-power') }}', {
                    'roles': serialize(sortable.el).reverse()
                }).then(function (json) {
                    createAlert('success', json.data.message, true);
                }).catch(function (error) {
                    createAlert('danger', error.response.data.message ? error.response.data.message : error, true)
                }).finally(function () {
                    saveButton.removeAttribute('disabled');
                });
            });
        </script>
    @endpush
@endif

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">

            <ol class="list-unstyled sortable mb-3" id="roles">
                @foreach($roles as $role)
                    <li class="sortable-item sortable-dropdown" data-id="{{ $role->id }}">
                        <div class="card">
                            <div class="card-body d-flex justify-content-between">
                                <span>
                                    @if(Auth::user()->isAdmin())
                                        <i class="bi bi-arrows-move sortable-handle"></i>
                                    @endif

                                    <span class="badge" style="{{ $role->getBadgeStyle() }}; font-size: 1.05em">{{ $role->name }}</span>

                                    @if($role->isDefault())
                                        <i class="bi bi-star text-info" title="{{ trans('admin.roles.default') }}" data-bs-toggle="tooltip"></i>
                                    @endif
                                    @if($role->is_admin)
                                        <i class="bi bi-trophy text-warning" title="{{ trans('admin.roles.admin') }}" data-bs-toggle="tooltip"></i>
                                    @endif
                                </span>
                                <span>
                                    @can('update', $role)
                                        <a href="{{ route('admin.roles.edit', $role) }}" class="m-1" title="{{ trans('messages.actions.edit') }}" data-bs-toggle="tooltip"><i class="bi bi-pencil-square"></i></a>
                                    @endcan
                                    @if(! $role->isDefault())
                                        @can('delete', $role)
                                            <a href="{{ route('admin.roles.destroy', $role) }}" class="m-1 " title="{{ trans('messages.actions.delete') }}" data-bs-toggle="tooltip" data-confirm="delete"><i class="bi bi-trash"></i></a>
                                        @endcan
                                    @endif
                                </span>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ol>

            @if(Auth::user()->isAdmin())
                <button type="button" class="btn btn-success" id="save">
                    <i class="bi bi-save"></i> {{ trans('messages.actions.save') }}
                    <span class="spinner-border spinner-border-sm btn-spinner" role="status"></span>
                </button>
            @endif

            <a class="btn btn-primary" href="{{ route('admin.roles.create') }}">
                <i class="bi bi-plus-lg"></i> {{ trans('messages.actions.add') }}
            </a>
        </div>
    </div>
@endsection
