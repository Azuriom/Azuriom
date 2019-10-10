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
    <div class="card shadow mb-4">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">Current theme</h6>
        </div>
        <div class="card-body">
            @if($current)
                <h3 class="h5">{{ $current->name }}</h3>
                <ul>
                    <li>Author: {{ join(', ', $current->authors) }}</li>
                    <li>Version: {{ $current->version }}</li>
                </ul>

                <form action="{{ route('admin.themes.change') }}" method="POST">
                    @csrf

                    <a class="btn btn-primary" href="#"><i class="fas fa-wrench"></i> Edit config</a>
                    <button type="submit" class="btn btn-warning"><i class="fas fa-times"></i> Disable</button>
                </form>
            @else
                You don't have any theme enable.
            @endif
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">Installed themes</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
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
        </div>
    </div>

    <form id="themeForm" method="POST" class="d-none">
        @csrf
    </form>
@endsection
