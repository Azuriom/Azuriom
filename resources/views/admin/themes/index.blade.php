@extends('admin.layouts.admin')

@section('title', trans('admin.extensions.themes'))

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
            <h6 class="m-0 font-weight-bold text-primary">{{ trans('admin.extensions.current-theme.title') }}</h6>
        </div>
        <div class="card-body">
            @if($current)
                <h3 class="h5">{{ $current->name }}</h3>
                <ul>
                    <li>{{ trans('admin.extensions.current-theme.author', ['author' => join(', ', $current->authors)]) }}</li>
                    <li>{{ trans('admin.extensions.current-theme.version', ['version' => $current->version]) }}</li>
                </ul>

                <form action="{{ route('admin.themes.change') }}" method="POST">
                    @csrf

                    <a class="btn btn-primary" href="#"><i class="fas fa-wrench"></i> {{ trans('admin.extensions.actions.edit-theme-config') }}</a>
                    <button type="submit" class="btn btn-warning"><i class="fas fa-times"></i> {{ trans('admin.extensions.actions.disable-theme') }}</button>
                </form>
            @else
                {{ trans('admin.extensions.no-theme') }}
            @endif
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">{{ trans('admin.extensions.installed-themes') }}</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">{{ trans('admin.fields.name') }}</th>
                        <th scope="col">{{ trans('admin.fields.author') }}</th>
                        <th scope="col">{{ trans('admin.extensions.fields.version') }}</th>
                        <th scope="col">{{ trans('admin.fields.action') }}</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($themes as $path => $theme)
                        <tr>
                            <th scope="row">{{ $theme->name }}</th>
                            <td>{{ join(', ', $theme->authors) }}</td>
                            <td>{{ $theme->version }}</td>
                            <td>
                                <a class="btn btn-primary" data-action="theme" href="{{ route('admin.themes.change', $path) }}"><i class="fas fa-check"></i> {{ trans('admin.actions.enable') }}</a>
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
