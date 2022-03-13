@extends('admin.layouts.admin')

@section('title', trans('admin.social_links.title'))

@push('footer-scripts')
    @push('footer-scripts')
        <script src="{{ asset('vendor/sortablejs/Sortable.min.js') }}"></script>
        <script>
            const sortable = Sortable.create(document.getElementById('links'), {
                animation: 150,
                group: 'links',
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

                axios.post('{{ route('admin.social-links.update-order') }}', {
                    'links': serialize(sortable.el)
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
@endpush

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <ol class="list-unstyled sortable mb-3" id="links">
                @foreach($links as $link)
                    <li class="sortable-item sortable-dropdown" data-id="{{ $link->id }}">
                        <div class="card">
                            <div class="card-body d-flex justify-content-between">
                                <span>
                                    <i class="bi bi-arrows-move sortable-handle"></i>
                                    {{ $link->title }}
                                </span>
                                <span>
                                    <a href="{{ route('admin.social-links.edit', $link) }}" class="m-1" title="{{ trans('messages.actions.edit') }}" data-bs-toggle="tooltip"><i class="bi bi-pencil-square"></i></a>
                                    <a href="{{ route('admin.social-links.destroy', $link) }}" class="m-1" title="{{ trans('messages.actions.delete') }}" data-bs-toggle="tooltip" data-confirm="delete"><i class="bi bi-trash"></i></a>
                                </span>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ol>

            @if(! $links->isEmpty())
                <button type="button" class="btn btn-success" id="save">
                    <i class="bi bi-save"></i> {{ trans('messages.actions.save') }}
                    <span class="spinner-border spinner-border-sm btn-spinner" role="status"></span>
                </button>
            @endif

            <a class="btn btn-primary" href="{{ route('admin.social-links.create') }}">
                <i class="bi bi-plus-lg"></i> {{ trans('messages.actions.add') }}
            </a>
        </div>
    </div>
@endsection
