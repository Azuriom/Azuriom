@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level === 'error')
# @lang('mail.whoops')
@else
# @lang('mail.hello')
@endif
@endif

{{-- Intro Lines --}}
@foreach ($introLines as $line)
{{ $line }}

@endforeach

{{-- Action Button --}}
@isset($actionText)
@component('mail::button', ['url' => $actionUrl, 'color' => Str::is(['success', 'error'], $level) ? $level : 'primary'])
{{ $actionText }}
@endcomponent
@endisset

{{-- Outro Lines --}}
@foreach ($outroLines as $line)
{{ $line }}

@endforeach

{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
@lang('mail.regards')<br>
{{ site_name() }}
@endif

{{-- Subcopy --}}
@isset($actionText)
@slot('subcopy')
@lang('mail.link', [
    'actionText' => $actionText,
    'actionURL' => $actionUrl,
    'displayableActionUrl' => $displayableActionUrl,
])
@endslot
@endisset
@endcomponent
