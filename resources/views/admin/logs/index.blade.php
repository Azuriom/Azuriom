@extends('admin.layouts.admin')

@section('title', 'Logs')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Type</th>
                        <th scope="col">Author</th>
                        <th scope="col">Target</th>
                        <th scope="col">Action</th>
                        <th scope="col">Date</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($logs as $log)
                        <tr>
                            <th scope="row">{{ $log->id }}</th>
                            <td>{{ $log->type }}</td>
                            <td>{{ $log->user->name }}</td>
                            <td>{{ $log->target !== null ? ($log->target->name ?? $log->target->title) : 'X' }}</td>
                            <td class="text-{{ $log->getActionFormat()['color'] }}">
                                <i class="fas fa-{{ $log->getActionFormat()['icon'] }}"></i>
                                {{ $log->formatAction() }}
                            </td>
                            <td>{{ $log->created_at }}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>

            {{ $logs->links() }}
        </div>
    </div>
@endsection
