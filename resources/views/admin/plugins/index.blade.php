@extends('admin.layouts.admin')

@section('title', 'Plugins')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">Installed plugins</h6>
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

                    @foreach($plugins as $path => $plugin)
                        <tr>
                            <th scope="row">{{ $plugin->name }}</th>
                            <td>{{ join(', ', $plugin->authors) }}</td>
                            <td>{{ $plugin->version }}</td>
                            <td>
                                <form method="POST" action="{{ route('admin.plugins.' . (($plugin->enabled) ? 'disable' : 'enable'), $path) }}">
                                    @csrf

                                    <button type="submit" class="btn btn-primary">{{  (($plugin->enabled) ? 'Disable' : 'Enable')  }}</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
