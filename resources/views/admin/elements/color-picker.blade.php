@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/themes/nano.min.css" rel="stylesheet">
@endpush

@push('footer-scripts')
    <script src="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/pickr.min.js"></script>
    <script>
        const colorPickrForm = document.querySelector('.color-picker');

        const pickr = Pickr.create({
            el: colorPickrForm,
            theme: 'nano',
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
            default: colorPickrForm.value,
            useAsButton: true,
            components: {
                preview: true,
                opacity: false,
                hue: true,
                interaction: {
                    hex: false,
                    rgba: false,
                    hsla: false,
                    hsva: false,
                    cmyk: false,
                    input: true,
                    cancel: true,
                    clear: false,
                    save: false
                }
            },
            strings: {
                cancel: 'Reset'
            }
        });

        pickr.options.el.addEventListener('click', function (e) {
            e.preventDefault()
        });

        const updatePickrInput = function (color, instance) {
            if (color) {
                instance.options.el.value = color.toHEXA();
            }
        };

        pickr.on('change', updatePickrInput).on('cancel', function (instance) {
            updatePickrInput(instance._lastColor, instance);
        });
    </script>
@endpush
