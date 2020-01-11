@extends('admin.layouts.admin')

@section('title', trans('admin.update.title'))

@push('footer-scripts')
    <script>
        document.querySelectorAll('[data-update-route]').forEach(function (el) {
            el.addEventListener('click', function () {
                const saveButtonIcon = el.querySelector('.btn-animation');

                el.setAttribute('disabled', '');
                saveButtonIcon.classList.remove('d-none');

                axios.post(el.dataset['updateRoute']).then(function (json) {
                    createAlert('success', json.data.message, true);

                    window.location.reload();
                }).catch(function (error) {
                    createAlert('danger', error.response.data.message ? error.response.data.message : error, true)
                }).finally(function () {
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
                <h2>{{ trans('admin.update.subtitle-update') }}</h2>

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
                        <i class="fas fa-sync fa-spin d-none btn-animation"></i>
                    </button>
                @else
                    <p>{{ trans('admin.update.download') }}</p>

                    <button type="button" class="btn btn-primary" data-update-route="{{ route('admin.update.download') }}">
                        <i class="fas fa-cloud-download-alt"></i>
                        {{ trans('admin.update.actions.download') }}
                        <i class="fas fa-sync fa-spin d-none btn-animation"></i>
                    </button>
                @endif

            @else
                <h2>{{ trans('admin.update.subtitle-no-update') }}</h2>

                <p>@lang('admin.update.up-to-date', ['version' => Azuriom::version()])</p>

                <form method="POST" action="{{ route('admin.update.fetch') }}">
                    @csrf

                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-sync-alt"></i>
                        {{ trans('admin.update.actions.check') }}
                    </button>
                </form>
            @endif

        </div>
    </div>
@endsection
