@extends('layouts.app')

@section('title', trans('messages.maintenance.title'))

@section('content')
    <div class="container content">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ trans('messages.maintenance.title') }}</div>

                    <div class="card-body">
                        <div class="card-text user-html-content">
                            {!! $maintenanceMessage !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
