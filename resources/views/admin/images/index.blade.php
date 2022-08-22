@extends('admin.layouts.admin')

@section('title', trans('admin.images.title'))

@push('footer-scripts')
    <script>
        let showError = false;

        document.querySelectorAll('td img').forEach(function (el) {
            el.addEventListener('error', function () {
                if (showError) {
                    return;
                }

                showError = true;

                document.getElementById('loadingHelpMessage').classList.remove('d-none');
            });
        });
    </script>
@endpush

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{ trans('messages.fields.image') }}</th>
                        <th scope="col">{{ trans('messages.fields.name') }}</th>
                        <th scope="col">{{ trans('messages.fields.file') }}</th>
                        <th scope="col">{{ trans('messages.fields.action') }}</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($images as $image)
                        <tr>
                            <th scope="row">{{ $image->id }}</th>
                            <td>
                                <img src="{{ $image->url() }}" class="img-small rounded" alt="{{ $image->name }}">
                            </td>
                            <td>{{ $image->name }}</td>
                            <td>
                                <a href="{{ $image->url() }}" target="_blank" rel="noopener noreferrer">
                                    {{ $image->file }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('admin.images.edit', $image) }}" class="mx-1" title="{{ trans('messages.actions.edit') }}" data-bs-toggle="tooltip"><i class="bi bi-pencil-square"></i></a>
                                <a href="{{ route('admin.images.destroy', $image) }}" class="mx-1" title="{{ trans('messages.actions.delete') }}" data-bs-toggle="tooltip" data-confirm="delete"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>

            {{ $images->links() }}

            <a class="btn btn-primary" href="{{ route('admin.images.create') }}">
                <i class="bi bi-upload"></i> {{ trans('messages.actions.add') }}
            </a>
        </div>
    </div>

    <div class="alert alert-info d-none" id="loadingHelpMessage">
        <i class="bi bi-info-circle"></i> @lang('admin.images.help')
    </div>
@endsection
