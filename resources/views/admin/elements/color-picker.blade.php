@push('styles')
    <link href="{{ asset('vendor/pickr/themes/nano.min.css') }}" rel="stylesheet">
@endpush

@push('footer-scripts')
    <script src="{{ asset('vendor/pickr/pickr.min.js') }}"></script>
    <script>
        const colorPickrForm = document.querySelector('.color-picker');

        Pickr.create({
            el: colorPickrForm,
            theme: 'nano',
            default: colorPickrForm.value,
            useAsButton: true,
            swatches: [
                '#ff0e0b',
                '#e91e63',
                '#9c27b0',
                '#673ab7',
                '#3f51b5',
                '#2196f3',
                '#03a9f4',
                '#00bcd4',
                '#009688',
                '#4caf50',
                '#8bc34a',
                '#cddc39',
                '#ffeb3b',
                '#ffc107'
            ],
            components: {
                preview: true,
                opacity: false,
                hue: true,
                interaction: {
                    input: true,
                },
            }
        }).on('change', function (color) {
            if (color) {
                colorPickrForm.value = color.toHEXA();
            }
        });

        colorPickrForm.addEventListener('click', function (e) {
            e.preventDefault();
        });
    </script>
@endpush
