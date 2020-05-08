@extends('layouts.app')

@section('title', trans('messages.profile.title'))

@section('content')
    <div class="container content">
        <div class="card mb-4 shadow-sm">
            <div class="card-header">{{ trans('messages.profile.title') }}</div>
            <div class="card-body">
                <h4 class="card-title">{{ $user->name }}</h4>
                <ul>
                    <li>{{ trans('messages.profile.info.role', ['role' => $user->role->name]) }}</li>
                    <li>{{ trans('messages.profile.info.register', ['date' => format_date($user->created_at, true)]) }}</li>
                    <li>{{ trans('messages.profile.info.money', ['money' => format_money($user->money)]) }}</li>
                    <li>{{ trans('messages.profile.info.2fa', ['2fa' => trans_bool($user->hasTwoFactorAuth())]) }}</li>
                </ul>

                @if($user->hasTwoFactorAuth())
                    <form action="{{ route('profile.2fa.disable') }}" method="POST">
                        @csrf

                        <button type="submit" class="btn btn-danger">
                            {{ trans('messages.profile.2fa.disable') }}
                        </button>
                    </form>
                @else
                    <a class="btn btn-success" href="{{ route('profile.2fa.index') }}">{{ trans('messages.profile.2fa.enable') }}</a>
                @endif
            </div>
        </div>

        @if(! $user->hasVerifiedEmail())
            @if (session('resent'))
                <div class="alert alert-success mb-4" role="alert">
                    {{ trans('auth.verify-sent') }}
                </div>
            @endif

            <div class="alert alert-warning mb-4" role="alert">
                <p>{{ trans('messages.profile.not-verified') }}</p>
                <p>{{ trans('auth.verify-request') }}</p>

                <form method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <button type="submit" class="btn btn-primary">
                        {{ trans('auth.verify-resend') }}
                    </button>
                </form>
            </div>
        @endif

        <div class="row">
            <div class="col-md-6">
                <div class="card shadow-sm mb-4">
                    <div class="card-header">{{ trans('messages.profile.change-password') }}</div>
                    <div class="card-body">
                        <form action="{{ route('profile.password') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="passwordConfirmPassInput">{{ trans('auth.current-password') }}</label>
                                <input type="password" class="form-control @error('password_confirm_pass') is-invalid @enderror" id="passwordConfirmPassInput" name="password_confirm_pass" required>

                                @error('password_confirm_pass')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="passwordInput">{{ trans('auth.password') }}</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="passwordInput" name="password" required>

                                @error('password')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="confirmPasswordInput">{{ trans('auth.confirm-password') }}</label>
                                <input type="password" class="form-control" id="confirmPasswordInput" name="password_confirmation" required>
                            </div>

                            <button type="submit" class="btn btn-primary">
                                {{ trans('messages.actions.update') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card shadow-sm mb-4">
                    <div class="card-header">{{ trans('messages.profile.change-email') }}</div>
                    <div class="card-body">
                        <form action="{{ route('profile.email') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="emailInput">{{ trans('auth.email') }}</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="emailInput" name="email" value="{{ old('email', $user->email) }}" required>

                                @error('email')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="emailConfirmPassInput">{{ trans('auth.current-password') }}</label>
                                <input type="password" class="form-control @error('email_confirm_pass') is-invalid @enderror" id="emailConfirmPassInput" name="email_confirm_pass" required>

                                @error('email_confirm_pass')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">
                                {{ trans('messages.actions.update') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @if(setting('shop.use-site-money'))
            <div class="col-md-6">
                <div class="card shadow-sm mb-4">
                    <div class="card-header">Money transfer</div>
                    <div class="card-body">
                        <form action="{{ route('profile.transfer_money') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="user_name_money_Input">{{ trans('auth.name') }}</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="user_name_money_Input" name="name" required>

                                @error('name')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="number_name_money_Input">Money</label>
                                <input type="number" pattern="^\d+(?:\.\d{1,2})?$" placeholder="0.00" min="0" value="0" step="0.01" onblur="this.parentNode.parentNode.style.backgroundColor=/^\d+(?:\.\d{1,2})?$/.test(this.value)?'inherit':'red'" class="form-control @error('money') is-invalid @enderror" id="number_name_money_Input" name="money" required>

                                @error('money')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">
                                {{ trans('messages.actions.update') }}
                            </button>
                            
                        </form>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
@endsection

@if(setting('shop.use-site-money'))
    @push('styles')
        <style>
            .tt-query {
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
                -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
                    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
            }

            .tt-hint {
            color: #999
            }

            .tt-menu {    /* used to be tt-dropdown-menu in older versions */
            width: 422px;
            margin-top: 4px;
            padding: 4px 0;
            background-color: #fff;
            border: 1px solid #ccc;
            border: 1px solid rgba(0, 0, 0, 0.2);
            -webkit-border-radius: 4px;
                -moz-border-radius: 4px;
                    border-radius: 4px;
            -webkit-box-shadow: 0 5px 10px rgba(0,0,0,.2);
                -moz-box-shadow: 0 5px 10px rgba(0,0,0,.2);
                    box-shadow: 0 5px 10px rgba(0,0,0,.2);
            }

            .tt-suggestion {
            padding: 3px 20px;
            line-height: 32px;
            }

            .tt-suggestion.tt-cursor,.tt-suggestion:hover {
            color: #fff;
            background-color: #0097cf;

            }

            .tt-suggestion p {
            margin: 0;
            }
        </style>
    @endpush
    @push('footer-scripts')
        <script defer src="https://twitter.github.io/typeahead.js/releases/latest/typeahead.bundle.js"></script>
        <script defer>
            document.addEventListener("DOMContentLoaded", function(event) {
                var bloodhound = new Bloodhound({
                    datumTokenizer: Bloodhound.tokenizers.whitespace,
                    queryTokenizer: Bloodhound.tokenizers.whitespace,
                    remote: {
                        url: '{{ route("profile.search_users")}}?q=%QUERY%',
                        wildcard: '%QUERY%'
                    },
                });
                
                $('#user_name_money_Input').typeahead({
                    hint: true,
                    highlight: true,
                    minLength: 1
                }, {
                    name: 'users',
                    source: bloodhound,
                    display: function(data) {
                        return data.name  //Input value to be set when you select a suggestion. 
                    },

                    templates: {
                        empty: '<strong>{{ trans("errors.404.title") }}</strong>',
                        suggestion: function(data) {
                            return '<div>'+data.name+'</div>'
                        }
                    }
                });
            })
        </script>
    @endpush
@endif
