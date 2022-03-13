@push('footer-scripts')
    <script>
        const addListener = function(el) {
            el.addEventListener('click', function () {
                const element = el.parentNode;

                element.parentNode.removeChild(element);
            });
        }

        document.querySelectorAll('.{{ $name }}-remove').forEach(function (el) {
            addListener(el);
        });

        document.getElementById('{{ $name }}-add-button').addEventListener('click', function () {
            let input = '<div class="input-group mb-2"><input type="text" name="{{ $name }}[]" class="form-control">';
            input += '<button class="btn btn-outline-danger {{ $name }}-remove" type="button"><i class="bi bi-x-lg"></i></button>';
            input += '</div>';

            const newElement = document.createElement('div');
            newElement.innerHTML = input;

            addListener(newElement.querySelector('.{{ $name }}-remove'));

            document.getElementById('{{ $name }}-input').appendChild(newElement);
        });
    </script>
@endpush

<div id="{{ $name }}-input">

    @forelse($values ?? [] as $value)
        <div class="input-group mb-2">
            <input type="text" class="form-control" name="{{ $name }}[]" value="{{ $value }}">
            <button class="btn btn-outline-danger {{ $name }}-remove" type="button">
                <i class="bi bi-x-lg"></i>
            </button>
        </div>
    @empty
        <div class="input-group mb-2">
            <input type="text" class="form-control" name="{{ $name }}[]" placeholder="{{ $placeholder ?? '' }}">
            <button class="btn btn-outline-danger {{ $name }}-remove" type="button">
                <i class="bi bi-x-lg"></i>
            </button>
        </div>
    @endforelse
</div>

<div class="my-1">
    <button type="button" id="{{ $name }}-add-button" class="btn btn-sm btn-success">
        <i class="bi bi-plus-lg"></i> {{ trans('messages.actions.add') }}
    </button>
</div>
