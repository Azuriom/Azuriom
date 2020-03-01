@extends('layouts.app')

@section('title', trans('messages.maintenance'))

@section('content')
    <div class="container content">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ trans('messages.maintenance') }}</div>

                    <div class="card-body">
                    @guest
                        @if(setting('maintenance-message'))
                                <h1>{!! setting('maintenance-message')!!}</h1>
                        @endif  
                        @else
                                <h1>@lang('messages.maintenance-message')</h1>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
