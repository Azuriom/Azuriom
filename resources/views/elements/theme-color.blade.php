<style>
    :root,
    [data-bs-theme=light] {
        --bs-primary: {{ $color }};
        --bs-primary-rgb: {{ color_rgb($color) }};
        --bs-primary-text-emphasis: {{ color_shade($color, 0.6) }};
        --bs-primary-bg-subtle: {{ color_tint($color, 0.8) }};
        --bs-primary-border-subtle: {{ color_tint($color, 0.6) }};
        --bs-link-hover-color: {{ color_shade($color, 0.2) }};
        --bs-link-hover-color-rgb: {{ color_rgb(color_shade($color, 0.2)) }};

        --bs-primary-color-contrast: {{ color_contrast($color) }};
        --bs-btn-primary-hover-bg: {{ color_mix(color_contrast($color), $color, 0.15) }};
        --bs-btn-primary-active-bg: {{ color_mix(color_contrast($color), $color, 0.15) }};
        --bs-btn-primary-focus-shadow-rgb: {{ color_rgb(color_mix(color_contrast($color), $color, 0.15)) }};
    }

    [data-bs-theme=dark] {
        --bs-primary-text-emphasis: {{ color_shade($color, 0.4) }};
        --bs-primary-bg-subtle: {{ color_shade($color, 0.8) }};
        --bs-primary-border-subtle: {{ color_tint($color, 0.4) }};

        --bs-link-color: {{ color_tint($color, 0.4) }};
        --bs-link-hover-color: {{ color_tint($color, 0.2) }};
        --bs-link-color-rgb: {{ color_rgb(color_tint($color, 0.4)) }};
        --bs-link-hover-color-rgb: {{ color_rgb(color_tint($color, 0.2)) }};
    }
</style>
