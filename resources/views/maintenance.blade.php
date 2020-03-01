@extends('layouts.app')

@section('title', trans('messages.maintenance'))

@section('content')
    <div class="container content">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ trans('messages.maintenance') }}</div>

                    <div class="card-body">
                    
                        @if(setting('maintenance-message'))
                                <h1>{!! setting('maintenance-message')!!}</h1>
                        
                        @else
                                <h1>@lang('messages.maintenance-message')</h1>
                         @endif 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
