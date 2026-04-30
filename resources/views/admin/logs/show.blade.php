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

            @if($log->action === 'roles.permissions-updated')
                @php
                    $source = $log->data['source'] ?? null;
                    $sourceRole = $log->data['source_role'] ?? null;
                    $added = $log->entries->where('new_value', 'granted');
                    $removed = $log->entries->where('new_value', 'not granted');
                @endphp

                <div class="row mb-4">
                    @if($log->target)
                        <div class="col-md-4 mb-2">
                            <div class="text-body-secondary small">{{ trans('admin.roles.title') }}</div>
                            <a href="{{ route('admin.roles.edit', $log->target) }}">
                                <span class="badge" style="{{ $log->target->getBadgeStyle() }}">
                                    @if($log->target->icon) <i class="{{ $log->target->icon }}"></i> @endif
                                    {{ $log->target->name }}
                                </span>
                            </a>
                        </div>
                    @endif
                    @if($source)
                        <div class="col-md-4 mb-2">
                            <div class="text-body-secondary small">{{ trans('admin.logs.roles.permission_source') }}</div>
                            <strong>{{ trans('admin.logs.roles.permission_source_'.$source, ['name' => $sourceRole]) }}</strong>
                        </div>
                    @endif
                    <div class="col-md-4 mb-2">
                        <div class="text-body-secondary small">{{ trans('admin.logs.changes') }}</div>
                        <span class="badge bg-success">+{{ $added->count() }}</span>
                        <span class="badge bg-danger">-{{ $removed->count() }}</span>
                    </div>
                </div>

                @if($added->isNotEmpty())
                    <h5 class="text-success mb-2">
                        <i class="bi bi-plus-circle"></i> {{ trans('admin.logs.roles.permission_added') }}
                    </h5>
                    <div class="mb-3">
                        @foreach($added as $entry)
                            <span class="badge bg-success-subtle text-success-emphasis border border-success-subtle me-1 mb-1 p-2">
                                <code class="text-success-emphasis">{{ $entry->attribute }}</code>
                            </span>
                        @endforeach
                    </div>
                @endif

                @if($removed->isNotEmpty())
                    <h5 class="text-danger mb-2">
                        <i class="bi bi-dash-circle"></i> {{ trans('admin.logs.roles.permission_removed') }}
                    </h5>
                    <div>
                        @foreach($removed as $entry)
                            <span class="badge bg-danger-subtle text-danger-emphasis border border-danger-subtle me-1 mb-1 p-2">
                                <code class="text-danger-emphasis">{{ $entry->attribute }}</code>
                            </span>
                        @endforeach
                    </div>
                @endif
            @elseif(! $log->entries->isEmpty())
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
