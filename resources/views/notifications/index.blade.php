@extends('layouts.app')

@section('title', trans('messages.notifications.notifications'))

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8">
            <h1>{{ trans('messages.notifications.notifications') }}</h1>

            <div id="all-notifications">
                @forelse($allNotifications as $notification)
                    <div class="card mb-2">
                        <div class="card-body">
                            <a href="{{ $notification->link ? url($notification->link) : '#' }}" class="d-flex align-items-center">
                                <div class="flex-shrink-0 me-3">
                                    <div class="rounded-circle p-1 text-bg-{{ $notification->level }}">
                                        <i class="bi bi-{{ $notification->icon() }} m-1"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="small text-body-secondary">
                                        {{ format_date($notification->created_at, true) }}
                                    </div>
                                    {{ $notification->content }}
                                </div>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-primary">
                        <i class="bi bi-check-circle"></i> {{ trans('messages.notifications.empty') }}
                    </div>
                @endforelse

                {{ $allNotifications->links() }}
            </div>
        </div>
    </div>
@endsection
