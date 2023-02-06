@extends('admin.layouts.admin')

@section('title', trans('admin.logs.title'))

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{ trans('messages.fields.user') }}</th>
                        <th scope="col">{{ trans('messages.fields.action') }}</th>
                        <th scope="col">{{ trans('messages.fields.date') }}</th>
                        <th scope="col">{{ trans('messages.fields.action') }}</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($logs as $log)
                        <tr>
                            <th scope="row">{{ $log->id }}</th>
                            <td>
                                <a href="{{ route('admin.users.edit', $log->user) }}">
                                    {{ $log->user->name }}
                                </a>
                            </td>
                            <td class="text-{{ $log->getActionFormat()['color'] }}">
                                <i class="bi bi-{{ $log->getActionFormat()['icon'] }}"></i>
                                {{ $log->getActionMessage() }}
                            </td>
                            <td>{{ format_date_compact($log->created_at) }}</td>
                            <td>
                                <a href="{{ route('admin.logs.show', $log) }}" class="mx-1" title="{{ trans('messages.actions.show') }}" data-bs-toggle="tooltip"><i class="bi bi-eye"></i></a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>

            {{ $logs->links() }}

            <form action="{{ route('admin.logs.clear') }}" method="POST">
                @csrf

                <button type="submit" class="btn btn-danger">
                    <i class="bi bi-trash"></i> {{ trans('admin.logs.clear') }}
                </button>
            </form>
        </div>
    </div>
@endsection
