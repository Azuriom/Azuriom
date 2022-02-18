@extends('layouts.app')

@section('title', trans('messages.maintenance.title'))

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h1>{{ trans('messages.maintenance.title') }}</h1>

            <div class="card">
                <div class="card-body">
                    {{ $maintenanceMessage }}
                </div>
            </div>
        </div>
    </div>
@endsection
