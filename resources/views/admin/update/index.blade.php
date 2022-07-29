@extends('admin.layouts.admin')

@section('title', trans('admin.update.title'))

@push('footer-scripts')
    <script>
        document.querySelectorAll('[data-update-route]').forEach(function (el) {
            el.addEventListener('click', function () {
                const saveButtonIcon = el.querySelector('.btn-spinner');

                el.setAttribute('disabled', '');
                saveButtonIcon.classList.remove('d-none');

                axios.post(el.dataset['updateRoute'])
                    .then(function () {
                        window.location.reload();
                    })
                    .catch(function (error) {
                        createAlert('danger', error.response.data.message ? error.response.data.message : error, true)
                    })
                    .finally(function () {
                        el.removeAttribute('disabled');
                        saveButtonIcon.classList.add('d-none');
                    });
            });
        });

    </script>
@endpush

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">{{ trans('admin.update.v1.title') }}</h6>
        </div>
        <div class="card-body">
            <h4>{{ trans('admin.update.v1.subtitle') }}</h4>

            <div class="alert alert-warning mt-3" role="alert">
                <i class="fas fa-exclamation-triangle"></i> @lang('admin.update.v1.info')
            </div>

            <p>@lang('admin.update.v1.update', ['version' => Azuriom::version()])</p>

            @if($sqlite || $legacyPhp || $extensionsIssue || $invalidPath)
                @if($sqlite)
                    <div class="alert alert-danger">
                        <i class="fas fa-times-circle"></i> @lang('admin.update.v1.sqlite')
                    </div>
                @endif

                @if($legacyPhp)
                    <div class="alert alert-danger">
                        <i class="fas fa-times-circle"></i> @lang('admin.update.v1.php8', ['version' => PHP_VERSION])
                    </div>
                @endif

                @if($extensionsIssue)
                    <div class="alert alert-danger">
                        <i class="fas fa-times-circle"></i> @lang('admin.update.v1.extensions')
                    </div>
                @endif

                @if($invalidPath)
                    <div class="alert alert-danger">
                        <i class="fas fa-times-circle"></i> @lang('admin.update.v1.path', [
                            'url' => url('/'),
                            'root' => Str::beforeLast(url('/'), '/'),
                        ])
                    </div>
                @endif
            @elseif($isV1Downloaded)
                <button type="button" class="btn btn-success" data-update-route="{{ route('admin.update.install-v1') }}">
                    <i class="fas fa-download"></i>
                    {{ trans('admin.update.actions.install') }}
                    <span class="spinner-border spinner-border-sm btn-spinner d-none" role="status"></span>
                </button>
            @else
                <p>{{ trans('admin.update.download') }}</p>

                <button type="button" class="btn btn-primary" data-update-route="{{ route('admin.update.download-v1') }}">
                    <i class="fas fa-cloud-download-alt"></i>
                    {{ trans('admin.update.actions.download') }}
                    <span class="spinner-border spinner-border-sm btn-spinner d-none" role="status"></span>
                </button>
            @endif
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">{{ trans('admin.update.title') }}</h6>
        </div>
        <div class="card-body">

            @if($hasUpdate)
                <h4>{{ trans('admin.update.subtitle-update') }}</h4>

                <div class="alert alert-warning mt-3" role="alert">
                    <i class="fas fa-exclamation-triangle"></i>
                    {{ trans('admin.update.backup-info') }}
                </div>

                <p>@lang('admin.update.update', ['last-version' => $lastVersion, 'version' => Azuriom::version()])</p>

                @if($isDownloaded)
                    <p>{{ trans('admin.update.install') }}</p>

                    <button type="button" class="btn btn-success" data-update-route="{{ route('admin.update.install') }}">
                        <i class="fas fa-download"></i>
                        {{ trans('admin.update.actions.install') }}
                        <span class="spinner-border spinner-border-sm btn-spinner d-none" role="status"></span>
                    </button>
                @else
                    <p>{{ trans('admin.update.download') }}</p>

                    <button type="button" class="btn btn-primary" data-update-route="{{ route('admin.update.download') }}">
                        <i class="fas fa-cloud-download-alt"></i>
                        {{ trans('admin.update.actions.download') }}
                        <span class="spinner-border spinner-border-sm btn-spinner d-none" role="status"></span>
                    </button>
                @endif

            @else
                <h4>{{ trans('admin.update.subtitle-no-update') }}</h4>

                <p>
                    @lang('admin.update.up-to-date', ['version' => Azuriom::version()])
                    @lang('admin.update.changelog', ['url' => 'https://github.com/Azuriom/Azuriom/releases'])
                </p>

                <form method="POST" action="{{ route('admin.update.fetch') }}">
                    @csrf

                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-sync"></i> {{ trans('admin.update.actions.check') }}
                    </button>
                </form>
            @endif

        </div>
    </div>
@endsection
