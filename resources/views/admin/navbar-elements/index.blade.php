@extends('admin.layouts.admin')

@section('title', 'Navbar')

@push('styles')
    <style>
        .sortable .sortable {
            padding-left: 2.8em;
        }

        .sortable {
            margin: 0;
            padding-top: 0.6em;
        }

        .sortable-item {
            display: block;
            position: relative;
            margin: 0 0 0.9em;
            padding: 0;
            min-height: 20px;
        }

        .sortable-dropdown {
            margin-bottom: 0.3em;
        }

        .sortable-dropdown .sortable-item {
            margin-bottom: 0.6em;
        }

        .sortable-handle {
            display: block;
            padding: 1em;
            box-sizing: border-box;
        }

        .sortable-handle,
        .cursor-move {
            cursor: move;
        }

        .sortable-handle:hover {
            color: #2ea8e5;
        }

        .sortable-ghost .sortable-handle {
            background: #f2fbff;
            border: 1px dashed #b6bcbf;
        }
    </style>
@endpush

@push('footer-scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.10.1/Sortable.min.js"></script>
    <script>
        const sortable = Sortable.create(document.getElementById('sortable'), {
            group: {
                name: 'navbar',
                animation: 150,
                fallbackOnBody: true,
                swapThreshold: 0.65,
            }
        });

        document.querySelectorAll('.sortable-list').forEach(function (el) {
            Sortable.create(el, {
                group: {
                    name: 'navbar',
                    animation: 150,
                    ghostClass: 'sortable-background',
                    put: function (to, sortable, drag) {
                        return !drag.classList.contains('sortable-dropdown');
                    },
                }
            });
        });

        function serialize(sortable) {
            const serialized = [];

            [].slice.call(sortable.children).forEach(function (child) {
                const nested = child.querySelector('.sortable');

                serialized.push({
                    id: child.dataset['id'],
                    children: nested ? serialize(nested) : []
                });
            });

            return serialized
        }

        const saveButton = document.getElementById('save');

        saveButton.addEventListener('click', function () {
            saveButton.setAttribute('disabled', '');

            axios.post('{{ route('admin.navbar-elements.update-order') }}', {
                'order': serialize(sortable.el)
            }, {
                headers: {
                    'Content-Type': 'application/json'
                }
            }).then(function (json) {
                saveButton.removeAttribute('disabled');
                createAlert('success', json.data.message, true);
            }).catch(function (error) {
                saveButton.removeAttribute('disabled');
                createAlert('danger', error, true)
            });
        });
    </script>
@endpush

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <ol class="list-unstyled sortable" id="sortable">
                @foreach($navbarElements as $navbarElement)
                    <li class="sortable-item @if($navbarElement->isDropdown()) sortable-dropdown @endif" data-id="{{ $navbarElement->id }}">
                        <div class="sortable-handle card card-body">
                            @if($navbarElement->isDropdown())
                                <i class="fas fa-bars"></i>
                            @endif
                            {{ $navbarElement->name }}
                            <span class="float-right">
                                <a href="{{ route('admin.navbar-elements.edit', $navbarElement) }}" class="m-1 nodrag" title="Edit" data-toggle="tooltip"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('admin.navbar-elements.destroy', $navbarElement) }}" class="m-1 nodrag" title="Delete" data-toggle="tooltip" data-confirm="delete"><i class="fas fa-trash"></i></a>
                            </span>
                        </div>
                        @if($navbarElement->isDropdown())
                            <ol class="list-unstyled sortable sortable-list">
                                @foreach($navbarElement->elements as $childElement)
                                    <li class="sortable-item" data-id="{{ $childElement->id }}">
                                        <div class="sortable-handle card card-body">
                                            {{ $childElement->name }}
                                            <span class="float-right">
                                                <a href="{{ route('admin.navbar-elements.edit', $childElement) }}" class="m-1 nodrag" title="Edit" data-toggle="tooltip"><i class="fas fa-edit"></i></a>
                                                <a href="{{ route('admin.navbar-elements.destroy', $childElement) }}" class="m-1 nodrag" title="Delete" data-toggle="tooltip" data-confirm="delete"><i class="fas fa-trash"></i></a>
                                            </span>
                                        </div>
                                    </li>
                                @endforeach
                            </ol>
                        @endif
                    </li>
                @endforeach
            </ol>

            <button type="button" class="btn btn-success" id="save">
                <i class="fas fa-save"></i> Save
            </button>
            <a class="btn btn-primary" href="{{ route('admin.navbar-elements.create') }}"><i class="fas fa-plus"></i> Create</a>
        </div>
    </div>
@endsection
