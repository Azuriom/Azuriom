@extends('install.layout')

@section('content')
    @if($compatible)
        <p>@lang('install.welcome')</p>

        <div class="text-center">
            <p class="text-success">
                <i class="bi bi-check2-circle"></i> {{ trans('install.requirements.success') }}
            </p>

            <a href="{{ route('install.database') }}" class="btn btn-primary rounded-pill mx-1">
                {{ trans('messages.actions.continue') }} <i class="bi bi-arrow-right"></i>
            </a>
        </div>
    @else
        <div class="alert alert-danger">
            <i class="bi bi-exclamation-triangle"></i> {{ trans('install.requirements.missing') }}
        </div>

        <div class="list-group mb-3 requirements">
            @foreach($requirements as $requirement => $requirementStatus)
                <div class="list-group-item">
                    <div class="row">
                        <div class="col-10">
                            @if(Str::startsWith($requirement, 'extension-'))
                                @lang('install.requirements.extension', ['extension' => Str::after($requirement, '-')])
                            @elseif(Str::startsWith($requirement, 'function-'))
                                @lang('install.requirements.function', ['function' => Str::after($requirement, '-')])
                            @else
                                @lang('install.requirements.'.$requirement, ['version' => $minPhpVersion])
                            @endif
                        </div>

                        <div class="col-2">
                            @if($requirement === 'php')
                                <span class="float-right text-{{ $requirementStatus ? 'success' : 'danger' }}"
                                      title="{{ PHP_VERSION }}">
                                    {{ $v = $phpVersion }}
                                </span>
                            @elseif($requirementStatus)
                                <i class="bi-check2-circle text-success float-right"></i>
                            @else
                                <i class="bi bi-x-lg text-danger float-right"></i>
                            @endif
                        </div>

                        @if(!$requirementStatus && $requirement !== 'php' && $requirement !== '64bit')
                            <div class="col-md-12 px-4 mt-2">
                                <i class="bi bi-info-circle text-primary me-1"></i>
                                @if(Str::startsWith($requirement, 'extension-'))
                                    @lang('install.requirements.help.extension', [
                                        'extension' => Str::replace('extension-', '', $requirement),
                                        'command' => "apt install curl php{$v}-mysql php{$v}-pgsql php{$v}-sqlite3 php{$v}-bcmath php{$v}-mbstring php{$v}-xml php{$v}-curl php{$v}-zip php{$v}-gd",
                                    ])
                                @elseif(Str::startsWith($requirement, 'function-'))
                                    @lang('install.requirements.help.function')
                                @elseif($requirement === 'writable')
                                    @lang('install.requirements.help.writable', ['command' => "chmod -R 755 {$base} && chown -R www-data:www-data {$base}"])
                                @else
                                    @lang('install.requirements.help.'.$requirement)
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

        <div class="text-center">
            <a href="{{ route('home') }}" class="btn btn-primary rounded-pill mx-1">
                {{ trans('install.requirements.refresh') }} <i class="bi bi-arrow-clockwise"></i>
            </a>
        </div>
    @endif
@endsection
