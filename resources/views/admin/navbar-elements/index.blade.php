@extends('admin.layouts.admin')

@section('title', trans('admin.navbar_elements.title'))

@push('footer-scripts')
    <script src="{{ asset('vendor/sortablejs/Sortable.min.js') }}"></script>
    <script>
        const sortable = document.getElementById('sortable');

        document.querySelectorAll('.sortable-list').forEach(function (el) {
            Sortable.create(el, {
                animation: 150,
                fallbackOnBody: true,
                swapThreshold: 0.65,
                group: {
                    name: 'navbar',
                    put: function (to, sortable, drag) {
                        return !drag.classList.contains('sortable-parent');
                    },
                },
            });
        });

        function serialize(sortable) {
            return [].slice.call(sortable.children).map(function (child) {
                const nested = child.querySelector('.sortable');

                return {
                    id: child.dataset['id'],
                    children: nested ? serialize(nested) : [],
                };
            });
        }

        const saveButton = document.getElementById('save');

        saveButton.addEventListener('click', function () {
            saveButton.setAttribute('disabled', '');

            axios.post('{{ route('admin.navbar-elements.update-order') }}', {
                'order': serialize(sortable)
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

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <ol class="list-unstyled sortable sortable-list mb-2" id="sortable">
                @foreach($navbarElements as $navbarElement)
                    <li class="sortable-item @if($navbarElement->isDropdown()) sortable-parent @endif" data-id="{{ $navbarElement->id }}">
                        <div class="card">
                            <div class="card-body d-flex justify-content-between">
                                <span>
                                    <i class="bi bi-arrows-move sortable-handle"></i>
                                    {{ $navbarElement->name }}

                                    @if($navbarElement->isDropdown())
                                        <i class="ml-2 bi bi-list"></i>
                                    @endif
                                </span>
                                <span>
                                    <a href="{{ route('admin.navbar-elements.edit', $navbarElement) }}" class="m-1" title="{{ trans('messages.actions.edit') }}" data-bs-toggle="tooltip"><i class="bi bi-pencil-square"></i></a>
                                    <a href="{{ route('admin.navbar-elements.destroy', $navbarElement) }}" class="m-1" title="{{ trans('messages.actions.delete') }}" data-bs-toggle="tooltip" data-confirm="delete"><i class="bi bi-trash"></i></a>
                                </span>
                            </div>
                        </div>

                        @if($navbarElement->isDropdown())
                            <ol class="list-unstyled sortable sortable-list">
                                @foreach($navbarElement->elements as $childElement)
                                    <li class="sortable-item" data-id="{{ $childElement->id }}">
                                        <div class="card">
                                            <div class="card-body d-flex justify-content-between">
                                                <span>
                                                    <i class="bi bi-arrows-move sortable-handle"></i>
                                                    {{ $childElement->name }}
                                                </span>
                                                <span>
                                                    <a href="{{ route('admin.navbar-elements.edit', $childElement) }}" class="m-1" title="{{ trans('messages.actions.edit') }}" data-bs-toggle="tooltip"><i class="bi bi-pencil-square"></i></a>
                                                    <a href="{{ route('admin.navbar-elements.destroy', $childElement) }}" class="m-1" title="{{ trans('messages.actions.delete') }}" data-bs-toggle="tooltip" data-confirm="delete"><i class="bi bi-trash"></i></a>
                                            </span>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ol>
                        @endif
                    </li>
                @endforeach
            </ol>

            @if(! $navbarElements->isEmpty())
                <button type="button" class="btn btn-success" id="save">
                    <i class="bi bi-save"></i> {{ trans('messages.actions.save') }}
                    <span class="spinner-border spinner-border-sm btn-spinner" role="status"></span>
                </button>
            @endif

            <a class="btn btn-primary" href="{{ route('admin.navbar-elements.create') }}">
                <i class="bi bi-plus-lg"></i> {{ trans('messages.actions.add') }}
            </a>
        </div>
    </div>
@endsection
