@extends('admin.layouts.admin')

@section('title', 'Images')

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
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Path</th>
                        <th scope="col">Action</th>
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
                                <a href="{{ route('admin.images.edit', $image) }}" class="mx-1" title="Edit" data-toggle="tooltip"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('admin.images.destroy', $image) }}" class="mx-1" title="Delete" data-toggle="tooltip" data-confirm="delete"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>

            {{ $images->links() }}

            <a class="btn btn-primary" href="{{ route('admin.images.create') }}"><i class="fas fa-plus"></i> Upload</a>
        </div>
    </div>
@endsection
