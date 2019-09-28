@extends('admin.layouts.admin')

@section('title', 'Themes')

@push('scripts')
    <script>
        window.addEventListener('DOMContentLoaded', function () {
            $('[data-action="theme"]').on('click', function (e) {
                e.preventDefault();

                $('#themeForm').attr('action', $(this).attr('href')).submit();
            });
        });
    </script>
@endpush

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Author</th>
                        <th scope="col">Version</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($themes as $path => $theme)
                        <tr>
                            <th scope="row">{{ $theme->name }}</th>
                            <td>{{ join(', ', $theme->authors) }}</td>
                            <td>{{ $theme->version }}</td>
                            <td>
                                <a class="btn btn-primary" data-action="theme" href="{{ route('admin.themes.change', $path) }}">Enable</a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>

            <form action="{{ route('admin.themes.change') }}" method="POST">
                @csrf

                <button type="submit" class="btn btn-warning">Use default theme</button>
            </form>
        </div>
    </div>

    <form id="themeForm" method="POST" class="d-none">
        @csrf
    </form>
@endsection
