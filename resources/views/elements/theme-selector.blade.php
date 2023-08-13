<li class="nav-item">
    <a href="{{ route('profile.theme') }}" class="nav-link @if(! dark_theme($defaultDark ?? false)) d-none @endif" data-theme-value="light">
        <i class="bi bi-sun" title="{{ trans('messages.theme.light') }}" data-bs-toggle="tooltip"></i>
    </a>
    <a href="{{ route('profile.theme') }}" class="nav-link @if(dark_theme($defaultDark ?? false)) d-none @endif" data-theme-value="dark">
        <i class="bi bi-moon-stars" title="{{ trans('messages.theme.dark') }}" data-bs-toggle="tooltip"></i>
    </a>
</li>
