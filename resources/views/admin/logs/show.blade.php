@extends('admin.layouts.admin')

@section('title', trans('admin.logs.title'))

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <h2 class="h3 text-{{ $log->getActionFormat()['color'] }}">
                <i class="bi bi-{{ $log->getActionFormat()['icon'] }}"></i>
                {{ $log->getActionMessage() }}
            </h2>

            <p class="mb-4">
                <a href="{{ route('admin.users.edit', $log->user) }}">
                   {{ $log->user->name }}
                </a> - {{ format_date($log->created_at) }}
            </p>

            @if(! $log->entries->isEmpty())
                <h3>{{ trans('admin.logs.changes') }}</h3>

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">{{ trans('admin.logs.old') }}</th>
                            <th scope="col">{{ trans('admin.logs.new') }}</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($log->entries as $entry)
                            <tr>
                                <th scope="row">{{ $entry->attribute }}</th>
                                <td>
                                    {{ $entry->old_value }}
                                </td>
                                <td>
                                    {{ $entry->new_value }}
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection
