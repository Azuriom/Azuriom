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
                                    @if($entry->old_value === '0')
                                        <span class="badge bg-danger">{{ trans('messages.no') }}</span>
                                    @elseif($entry->old_value === '1')
                                        <span class="badge bg-danger">{{ trans('messages.yes') }}</span>
                                    @else
                                        {{ $entry->old_value }}
                                    @endif
                                </td>
                                <td>
                                    @if($entry->new_value === '0')
                                        <span class="badge bg-danger">{{ trans('messages.no') }}</span>
                                    @elseif($entry->new_value === '1')
                                        <span class="badge bg-success">{{ trans('messages.yes') }}</span>
                                    @else
                                        {{ $entry->new_value }}
                                    @endif
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
