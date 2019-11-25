@extends('admin.layouts.admin')

@section('title', trans('admin.images.title'))

@push('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.0/baguetteBox.min.css" rel="stylesheet">
@endpush

@push('footer-scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.0/baguetteBox.min.js"></script>
    <script>
        baguetteBox.run('.gallery');
    </script>
@endpush

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
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
                            <td class="gallery">
                                <a href="{{ $image->url() }}" target="_blank">
                                    <img src="{{ $image->url() }}" class="img-small rounded" alt="{{ $image->name }}">
                                </a>
                            </td>
                            <td>{{ $image->name }}</td>
                            <td><a href="{{ $image->url() }}" target="_blank">{{ $image->file }}</a></td>
                            <td>
                                <a href="{{ route('admin.images.edit', $image) }}" class="mx-1" title="{{ trans('messages.actions.edit') }}" data-toggle="tooltip"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('admin.images.destroy', $image) }}" class="mx-1" title="{{ trans('messages.actions.delete') }}" data-toggle="tooltip" data-confirm="delete"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>

            {{ $images->links() }}

            <a class="btn btn-primary" href="{{ route('admin.images.create') }}"><i class="fas fa-upload"></i> {{ trans('messages.actions.upload') }}</a>
        </div>
    </div>
@endsection
