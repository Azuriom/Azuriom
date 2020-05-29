@extends('admin.layouts.admin')

@section('title', trans('admin.logs.title'))

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{ trans('messages.fields.user') }}</th>
                        <th scope="col">{{ trans('messages.fields.action') }}</th>
                        <th scope="col">{{ trans('messages.fields.date') }}</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($logs as $log)
                        <tr>
                            <th scope="row">{{ $log->id }}</th>
                            <td>{{ $log->user->name }}</td>
                            <td>
                                <i class="text-{{ $log->getActionFormat()['color'] }} fas fa-{{ $log->getActionFormat()['icon'] }}"></i>
                                {{ $log->getActionMessage() }}
                            </td>
                            <td>{{ format_date_compact($log->created_at) }}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>

            {{ $logs->links() }}

            <form action="{{ route('admin.logs.clear') }}" method="POST">
                @csrf

                <button type="submit" class="btn btn-danger">
                    <i class="fas fa-trash"></i> {{ trans('admin.logs.actions.clear') }}
                </button>
            </form>
        </div>
    </div>
@endsection
