@extends('admin.layouts.admin')

@section('title', 'Navbar')

@push('styles')
    <link href="{{ asset('assets/admin/vendor/nestable2/nestable2.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/nestable2/1.6.0/jquery.nestable.min.js" defer></script>
@endpush

@push('footer-scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            $('.dd').nestable({
                maxDepth: 2,
                expandBtnHTML: '',
                collapseBtnHTML: '',
                onDragStart: function () {
                    $('body').addClass('cursor-move');
                }, beforeDragStop: function () {
                    $('body').removeClass('cursor-move');
                }
            });

            const saveBtn = $('#saveBtn');

            saveBtn.on('click', function () {
                saveBtn.attr('disabled', true);

                axios.post('{{ route('admin.navbar-elements.update-order') }}', {
                    'order': $('.dd').nestable('serialize')
                }, {
                    headers: {
                        'Content-Type': 'application/json'
                    }
                }).then(function (json) {
                    saveBtn.attr('disabled', false);
                    createAlert('success', json.data.message, true);
                }).catch(function (error) {
                    saveBtn.attr('disabled', false);
                    console.error(error);
                    createAlert('danger', 'Error: ' + error, true)
                });
            });
        });
    </script>
@endpush

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="dd" id="nestable">
                <ol class="dd-list list-unstyled">
                    @foreach($navbarElements as $navbarElement)
                        <li class="dd-item {{ $navbarElement->isDropdown() ? '' : 'dd-nochildren' }}" data-id="{{ $navbarElement->id }}">
                            <div class="dd-handle card card-body">
                                @if($navbarElement->isDropdown())
                                    <i class="fas fa-bars"></i>
                                @endif
                                {{ $navbarElement->name }}
                                <span class="float-right">
                                    <a href="{{ route('admin.navbar-elements.edit', $navbarElement) }}" class="m-1 dd-nodrag" title="Edit" data-toggle="tooltip"><i class="fas fa-edit"></i></a>
                                    <a href="{{ route('admin.navbar-elements.destroy', $navbarElement) }}" class="m-1 dd-nodrag" title="Delete" data-toggle="tooltip" data-confirm="delete"><i class="fas fa-trash"></i></a>
                                </span>
                            </div>
                            @if($navbarElement->isDropdown())
                                <ol class="dd-list list-unstyled">
                                    @foreach($navbarElement->elements as $childElement)
                                        <li class="dd-item dd-nochildren" data-id="{{ $childElement->id }}">
                                            <div class="dd-handle card card-body">
                                                {{ $childElement->name }}
                                                <span class="float-right">
                                                    <a href="{{ route('admin.navbar-elements.edit', $childElement) }}" class="m-1 dd-nodrag" title="Edit" data-toggle="tooltip"><i class="fas fa-edit"></i></a>
                                                    <a href="{{ route('admin.navbar-elements.destroy', $childElement) }}" class="m-1 dd-nodrag" title="Delete" data-toggle="tooltip" data-confirm="delete"><i class="fas fa-trash"></i></a>
                                                </span>
                                            </div>
                                        </li>
                                    @endforeach
                                </ol>
                            @endif
                        </li>
                    @endforeach
                </ol>
            </div>

            <button type="button" class="btn btn-success" id="saveBtn">
                <i class="fas fa-save"></i> Save
            </button>
            <a class="btn btn-primary" href="{{ route('admin.navbar-elements.create') }}"><i class="fas fa-plus"></i> Create</a>
        </div>
    </div>
@endsection
