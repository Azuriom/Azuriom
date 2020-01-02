@extends('admin.layouts.admin')

@section('title', trans('admin.roles.title'))

@if(Auth::user()->isAdmin())
    @push('footer-scripts')
        <script src="{{ asset('vendor/sortablejs/Sortable.min.js') }}"></script>
        <script>
            const sortable = Sortable.create(document.getElementById('roles'), {
                animation: 150,
                group: 'role',
                handle: '.sortable-handle'
            });

            function serialize(sortable) {
                const serialized = [];

                [].slice.call(sortable.children).forEach(function (child) {
                    serialized.push(child.dataset['id']);
                });

                return serialized
            }

            const saveButton = document.getElementById('save');
            const saveButtonIcon = saveButton.querySelector('.btn-animation');

            saveButton.addEventListener('click', function () {
                saveButton.setAttribute('disabled', '');
                saveButtonIcon.classList.remove('d-none');

                axios.post('{{ route('admin.roles.update-power') }}', {
                    'roles': serialize(sortable.el).reverse()
                }).then(function (json) {
                    createAlert('success', json.data.message, true);
                }).catch(function (error) {
                    createAlert('danger', error.response.data.message ? error.response.data.message : error, true)
                }).finally(function () {
                    saveButton.removeAttribute('disabled');
                    saveButtonIcon.classList.add('d-none');
                });
            });
        </script>
    @endpush
@endif

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">

            <ol class="list-unstyled sortable" id="roles">
                @foreach($roles as $role)
                    <li class="sortable-item sortable-dropdown" data-id="{{ $role->id }}">
                        <div class="card">
                            <div class="card-body d-flex justify-content-between">
                                <span>
                                    @if(Auth::user()->isAdmin())
                                        <i class="fas fa-arrows-alt sortable-handle"></i>
                                    @endif

                                    <span class="badge badge-label" style="{{ $role->getBadgeStyle() }}; font-size: 1.05em">{{ $role->name }}</span>

                                    @if($role->isDefault())
                                        <i class="fas fa-star text-info" title="{{ trans('admin.roles.info.default') }}" data-toggle="tooltip"></i>
                                    @endif
                                    @if($role->is_admin)
                                        <i class="fas fa-crown text-warning" title="{{ trans('admin.roles.info.admin') }}" data-toggle="tooltip"></i>
                                    @endif
                                </span>
                                <span>
                                    @can('update', $role)
                                        <a href="{{ route('admin.roles.edit', $role) }}" class="m-1" title="Edit" data-toggle="tooltip"><i class="fas fa-edit"></i></a>
                                    @endcan
                                    @can('delete', $role)
                                        <a href="{{ route('admin.roles.destroy', $role) }}" class="m-1 @if($role->isDefault()) disabled @endif" @if(!$role->isDefault()) title="Delete" disabled data-toggle="tooltip" data-confirm="delete" @endif><i class="fas fa-trash"></i></a>
                                    @endcan
                                </span>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ol>

            @if(Auth::user()->isAdmin())
                <button type="button" class="btn btn-success" id="save">
                    <i class="fas fa-save"></i> {{ trans('messages.actions.save') }}
                    <i class="fas fa-sync fa-spin d-none btn-animation"></i>
                </button>
            @endif

            <a class="btn btn-primary" href="{{ route('admin.roles.create') }}">
                <i class="fas fa-plus"></i> {{ trans('messages.actions.add') }}
            </a>
        </div>
    </div>
@endsection
