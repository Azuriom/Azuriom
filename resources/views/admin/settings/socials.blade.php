@extends('admin.layouts.admin')

@section('title', trans('admin.settings.maintenance.title'))

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{route('admin.settings.socials-update')}}" method="post">
                @csrf
                <div class="accordion" id="accordionExample">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="@if ($errors->has('services-facebook-client_id') ||  $errors->has('services-facebook-client_secret')) true @else false @endif" aria-controls="collapseOne">
                                Facebook is @if(setting('enable_facebook_login'))<span class="bg-success text-white"> ON </span> @else <span class="bg-danger text-white"> OFF </span> @endif
                            </button>
                            </h2>
                        </div>
                    
                        <div id="collapseOne" class="collapse @if ($errors->has('services-facebook-client_id') ||  $errors->has('services-facebook-client_secret')) show @else  @endif" aria-labelledby="headingOne" >
                            <div class="card-body">
                                <div class="alert alert-info">
                                    Have a developper account :<code>https://developers.facebook.com/</code><br>
                                    Create an app : <code>https://developers.facebook.com/apps/</code><br>
                                    Base URI : <code>{{ secure_url('') }}</code><br>
                                    Redirect URI : <code>{{ secure_url('/login/facebook/callback') }}</code><br>

                                    <div class="form-group col-md-8">
                                        <label for="services-facebook-client_id">CLIENT ID</label>
                                        <input type="text" class="form-control @error('services-facebook-client_id') is-invalid @enderror" id="services-facebook-client_id" name="services-facebook-client_id" value="{{ old('services-facebook-client_id', setting('services.facebook.client_id')) }}">
                
                                        @error('services-facebook-client_id')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    
                                    </div>
                                    <div class="form-group col-md-8">
                                        <label for="services-facebook-client_secret">CLIENT SECRET</label>
                                        <input type="text" class="form-control @error('services-facebook-client_secret') is-invalid @enderror" id="services-facebook-client_secret" name="services-facebook-client_secret" value="{{ old('services-facebook-client_secret', setting('services.facebook.client_secret')) }}">
                
                                        @error('services-facebook-client_secret')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    
                                    </div>
                                    <div class="form-group custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="enable_facebook_login" name="enable_facebook_login" @if(setting('enable_facebook_login')) checked @endif>
                                        <label class="custom-control-label" for="enable_facebook_login">{{ trans('messages.fields.enabled') }}</label>
                                    </div>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save"></i> {{ trans('messages.actions.save') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="@if ($errors->has('services-twitter-client_id') ||  $errors->has('services-twitter-client_secret')) true @else false @endif" aria-controls="collapseTwo">
                                Twitter is @if(setting('enable_twitter_login'))<span class="bg-success text-white"> ON </span> @else <span class="bg-danger text-white"> OFF </span> @endif
                            </button>
                            </h2>
                        </div>
                        <div id="collapseTwo" class="collapse @if ($errors->has('services-twitter-client_id') ||  $errors->has('services-twitter-client_secret')) show @else  @endif" aria-labelledby="headingTwo" >
                            <div class="card-body">
                                <div class="alert alert-info">
                                    Have a developper account :<code>https://developer.twitter.com/</code><br>
                                    Create an app : <code>https://developer.twitter.com/apps</code><br>
                                    Website URL : <code>{{ secure_url('') }}</code><br>
                                    You need to check "Enable Sign in with Twitter" <br>
                                    Callback URL : <code>{{ secure_url('/login/twitter/callback') }}</code><br>
                                    You need to provide a Terms of Service URL which can be created here : <code>{{url('/admin/pages')}}</code><br>
                                    You need to provide a Privacy policy URL which can be created here : <code>{{url('/admin/pages')}}</code><br>
                                    Go to permissions click edit then check "read-only" and in the additional permissions check "request email address from users"
                                    <div class="form-group col-md-8">
                                        <label for="services-twitter-client_id">CLIENT ID</label>
                                        <input type="text" class="form-control @error('services-twitter-client_id') is-invalid @enderror" id="services-twitter-client_id" name="services-twitter-client_id" value="{{ old('services-twitter-client_id', setting('services.twitter.client_id')) }}">
                
                                        @error('services-twitter-client_id')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    
                                    </div>
                                    <div class="form-group col-md-8">
                                        <label for="services-twitter-client_secret">CLIENT SECRET</label>
                                        <input type="text" class="form-control @error('services-twitter-client_secret') is-invalid @enderror" id="services-twitter-client_secret" name="services-twitter-client_secret" value="{{ old('services-twitter-client_secret', setting('services.twitter.client_secret')) }}">
                
                                        @error('services-twitter-client_secret')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    
                                    </div>
                                    <div class="form-group custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="enable_twitter_login" name="enable_twitter_login" @if(setting('enable_twitter_login', false)) checked @endif>
                                        <label class="custom-control-label" for="enable_twitter_login">{{ trans('messages.fields.enabled') }}</label>
                                    </div>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save"></i> {{ trans('messages.actions.save') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingThree">
                            <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="@if($errors->has('services-steam-client_secret')) true @else false @endif" aria-controls="collapseThree">
                                Steam is @if(setting('enable_steam_login'))<span class="bg-success text-white"> ON </span> @else <span class="bg-danger text-white"> OFF </span> @endif
                            </button>
                            </h2>
                        </div>
                        <div id="collapseThree" class="collapse @if($errors->has('services-steam-client_secret')) show @endif" aria-labelledby="headingThree" >
                            <div class="card-body">
                                <div class="alert alert-info">
                                    Have a developper account :<code>https://steamcommunity.com/dev</code><br>
                                    Create an app : <code>https://steamcommunity.com/dev/apikey</code><br>
                                    Base URI : <code>{{ secure_url('') }}</code><br>

                                    <div class="form-group col-md-8">
                                        <label for="services-steam-client_secret">CLIENT SECRET</label>
                                        <input type="text" class="form-control @error('services-steam-client_secret') is-invalid @enderror" id="services-steam-client_secret" name="services-steam-client_secret" value="{{ old('services-steam-client_secret', setting('services.steam.client_secret')) }}">
                
                                        @error('services-steam-client_secret')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    
                                    </div>
                                    <div class="form-group custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="enable_steam_login" name="enable_steam_login" @if(setting('enable_steam_login', false)) checked @endif>
                                        <label class="custom-control-label" for="enable_steam_login">{{ trans('messages.fields.enabled') }}</label>
                                    </div>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save"></i> {{ trans('messages.actions.save') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingFour">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="@if ($errors->has('services-discord-client_id') ||  $errors->has('services-discord-client_secret')) true @else false @endif" aria-controls="collapseFour">
                                    Discord is @if(setting('enable_discord_login'))<span class="bg-success text-white"> ON </span> @else <span class="bg-danger text-white"> OFF </span> @endif
                                </button>
                            </h2>
                            </div>
                            <div id="collapseFour" class="collapse @if ($errors->has('services-discord-client_id') ||  $errors->has('services-discord-client_secret')) show @else  @endif" aria-labelledby="headingFour" >
                                <div class="card-body">
                                    <div class="alert alert-info">
                                        Create an app : <code>https://discord.com/developers/applications</code><br>
                                        Base URI : <code>{{ secure_url('') }}</code><br>
                                        Redirect URI : <code>{{ secure_url('/login/discord/callback') }}</code><br>
    
                                        <div class="form-group col-md-8">
                                            <label for="services-discord-client_id">CLIENT ID</label>
                                            <input type="text" class="form-control @error('services-discord-client_id') is-invalid @enderror" id="services-discord-client_id" name="services-discord-client_id" value="{{ old('services-discord-client_id', setting('services.discord.client_id')) }}">
                    
                                            @error('services-discord-client_id')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        
                                        </div>
                                        <div class="form-group col-md-8">
                                            <label for="services-discord-client_secret">CLIENT SECRET</label>
                                            <input type="text" class="form-control @error('services-discord-client_secret') is-invalid @enderror" id="services-discord-client_secret" name="services-discord-client_secret" value="{{ old('services-discord-client_secret', setting('services.discord.client_secret')) }}">
                    
                                            @error('services-discord-client_secret')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        
                                        </div>
                                        <div class="form-group custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="enable_discord_login" name="enable_discord_login" @if(setting('enable_discord_login', false)) checked @endif>
                                            <label class="custom-control-label" for="enable_discord_login">{{ trans('messages.fields.enabled') }}</label>
                                        </div>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-save"></i> {{ trans('messages.actions.save') }}
                                        </button>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingFifth">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFifth" aria-expanded="@if ($errors->has('services-google-client_id') ||  $errors->has('services-google-client_secret')) true @else false @endif" aria-controls="collapseFifth">
                                    Google+ is @if(setting('enable_google_login'))<span class="bg-success text-white"> ON </span> @else <span class="bg-danger text-white"> OFF </span> @endif
                                </button>
                            </h2>
                            </div>
                            <div id="collapseFifth" class="collapse @if ($errors->has('services-google-client_id') ||  $errors->has('services-google-client_secret')) show @else  @endif" aria-labelledby="headingFifth" >
                                <div class="card-body">
                                    <div class="alert alert-info">
                                        Have a developper account :<code>https://developers.google.com/</code><br>
                                        Create an app : <code>https://console.developers.google.com/</code><br>
                                        Base URI : <code>{{ secure_url('') }}</code><br>
                                        Redirect URI : <code>{{ secure_url('/login/google/callback') }}</code><br>
    
                                        <div class="form-group col-md-8">
                                            <label for="services-google-client_id">CLIENT ID</label>
                                            <input type="text" class="form-control @error('services-google-client_id') is-invalid @enderror" id="services-google-client_id" name="services-google-client_id" value="{{ old('services-google-client_id', setting('services.google.client_id')) }}">
                    
                                            @error('services-google-client_id')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        
                                        </div>
                                        <div class="form-group col-md-8">
                                            <label for="services-google-client_secret">CLIENT SECRET</label>
                                            <input type="text" class="form-control @error('services-google-client_secret') is-invalid @enderror" id="services-google-client_secret" name="services-google-client_secret" value="{{ old('services-google-client_secret', setting('services.google.client_secret')) }}">
                    
                                            @error('services-google-client_secret')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        
                                        </div>
                                        <div class="form-group custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="enable_google_login" name="enable_google_login" @if(setting('enable_google_login', false)) checked @endif>
                                            <label class="custom-control-label" for="enable_google_login">{{ trans('messages.fields.enabled') }}</label>
                                        </div>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-save"></i> {{ trans('messages.actions.save') }}
                                        </button>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingFifth">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSixth" aria-expanded="@if ($errors->has('services-sign-in-with-apple-client_id') ||  $errors->has('services-sign-in-with-apple-client_secret')) true @else false @endif" aria-controls="collapseSixth">
                                    Apple ID is @if(setting('enable_sign-in-with-apple_login'))<span class="bg-success text-white"> ON </span> @else <span class="bg-danger text-white"> OFF </span> @endif
                                </button>
                            </h2>
                            </div>
                            <div id="collapseSixth" class="collapse @if ($errors->has('services-sign-in-with-apple-client_id') ||  $errors->has('services-sign-in-with-apple-client_secret')) show @else  @endif" aria-labelledby="headingFifth" >
                                <div class="card-body">
                                    <div class="alert alert-info">
                                        Follow the instructions here : <code>https://github.com/GeneaLabs/laravel-sign-in-with-apple</code><br>
                                        Base URI : <code>{{ secure_url('') }}</code><br>
                                        Redirect URI : <code>{{ secure_url('/login/sign-in-with-apple/callback') }}</code><br>
    
                                        <div class="form-group col-md-8">
                                            <label for="services-sign-in-with-apple-client_id">CLIENT ID</label>
                                            <input type="text" class="form-control @error('services-sign-in-with-apple-client_id') is-invalid @enderror" id="services-sign-in-with-apple-client_id" name="services-sign-in-with-apple-client_id" value="{{ old('services-sign-in-with-apple-client_id', setting('services.sign-in-with-apple.client_id')) }}">
                    
                                            @error('services-sign-in-with-apple-client_id')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        
                                        </div>
                                        <div class="form-group col-md-8">
                                            <label for="services-sign-in-with-apple-client_secret">CLIENT SECRET</label>
                                            <input type="text" class="form-control @error('services-sign-in-with-apple-client_secret') is-invalid @enderror" id="services-sign-in-with-apple-client_secret" name="services-sign-in-with-apple-client_secret" value="{{ old('services-sign-in-with-apple-client_secret', setting('services.sign-in-with-apple.client_secret')) }}">
                    
                                            @error('services-sign-in-with-apple-client_secret')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        
                                        </div>
                                        <div class="form-group custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="enable_sign-in-with-apple_login" name="enable_sign-in-with-apple_login" @if(setting('enable_sign-in-with-apple_login', false)) checked @endif>
                                            <label class="custom-control-label" for="enable_sign-in-with-apple_login">{{ trans('messages.fields.enabled') }}</label>
                                        </div>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-save"></i> {{ trans('messages.actions.save') }}
                                        </button>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label class="control-label" for="overwrite_avatar">Force user's avatar</label>
                    <select class="custom-select" id="overwrite_avatar" name="overwrite_avatar">
                        @foreach(array_merge(socials_getProviders(), ['default','minecraft']) as $item)
                            <option value="{{ $item }}" @if($item === setting('overwrite_avatar')) selected @endif>{{ $item }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> {{ trans('messages.actions.save') }}
                </button>
            </form>
        </div>
    </div>
@endsection
