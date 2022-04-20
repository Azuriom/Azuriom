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
        <div class="card-body">

            @if($hasUpdate)
                <h2>{{ trans('admin.update.has_update') }}</h2>

                <div class="alert alert-warning mt-3" role="alert">
                    <i class="bi bi-exclamation-triangle"></i>
                    {{ trans('admin.update.backup') }}
                </div>

                <p>@lang('admin.update.update', ['last-version' => $lastVersion, 'version' => Azuriom::version()])</p>

                @if($isDownloaded)
                    <p>{{ trans('admin.update.install') }}</p>

                    <button type="button" class="btn btn-success" data-update-route="{{ route('admin.update.install') }}">
                        <i class="bi bi-download"></i>
                        {{ trans('messages.actions.install') }}
                        <span class="spinner-border spinner-border-sm btn-spinner d-none" role="status"></span>
                    </button>
                @else
                    <p>{{ trans('admin.update.download') }}</p>

                    <button type="button" class="btn btn-primary" data-update-route="{{ route('admin.update.download') }}">
                        <i class="bi bi-cloud-download"></i>
                        {{ trans('messages.actions.download') }}
                        <span class="spinner-border spinner-border-sm btn-spinner d-none" role="status"></span>
                    </button>
                @endif

            @else
                <h2>{{ trans('admin.update.no_update') }}</h2>

                <p>
                    @lang('admin.update.latest_version', ['version' => Azuriom::version()])
                    @lang('admin.update.changelog', ['url' => 'https://github.com/Azuriom/Azuriom/releases'])
                </p>

                <form method="POST" action="{{ route('admin.update.fetch') }}">
                    @csrf

                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-arrow-repeat"></i> {{ trans('admin.update.check') }}
                    </button>
                </form>
            @endif

        </div>
    </div>
@endsection
