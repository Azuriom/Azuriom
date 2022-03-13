@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-9 col-lg-6">
            <div class="card">
                <div class="card-body text-center">
                    <h1>@yield('code')</h1>
                    <h2>@yield('title')</h2>
                    <p>@yield('message')</p>

                    <a href="{{ route('home') }}" class="btn btn-primary">
                        <i class="bi bi-house"></i> {{ trans('errors.home') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
