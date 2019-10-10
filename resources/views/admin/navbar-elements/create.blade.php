@extends('admin.layouts.admin')

@section('title', 'Create navbar element')

@push('footer-scripts')
    <script>
        function updateType(el) {
            $('[data-nav-element]').addClass('d-none');
            $('[data-nav-element="' + el.val() + '"]').removeClass('d-none');
        }

        document.addEventListener('DOMContentLoaded', function () {
            const typeSelect = $('#typeSelect');

            updateType(typeSelect);

            typeSelect.on('change', function () {
                updateType($(this));
            });
        });
    </script>
@endpush

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admin.navbar-elements.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="nameInput">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="nameInput" name="name" value="{{ old('name') }}" required>

                    @error('name')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="typeSelect">Type</label>
                    <select class="custom-select @error('type') is-invalid @enderror" id="typeSelect" name="type" required>
                        @foreach($types as $type)
                            <option value="{{ $type }}">{{ $type }}</option>
                        @endforeach
                    </select>

                    @error('type')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div data-nav-element="page" class="form-group d-none">
                    <label for="pageSelect">Page</label>
                    <select class="custom-select @error('page') is-invalid @enderror" id="pageSelect" name="page">
                        @foreach($pages as $page)
                            <option value="{{ $page->id }}">{{ $page->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div data-nav-element="post" class="form-group d-none">
                    <label for="postSelect">Post</label>
                    <select class="custom-select @error('post') is-invalid @enderror" id="postSelect" name="post">
                        @foreach($posts as $post)
                            <option value="{{ $post->id }}">{{ $post->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div data-nav-element="link" class="form-group d-none">
                    <label for="linkInput">Link</label>
                    <input type="text" class="form-control @error('link') is-invalid @enderror" id="linkInput" name="link" value="{{ old('link') }}">

                    @error('link')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
                <div data-nav-element="dropdown" class="form-group d-none">
                    <small>You can add elements to this dropdown when this element is save</small>
                </div>

                <div class="form-group custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="newTabSwitch" name="new_tab">
                    <label class="custom-control-label" for="newTabSwitch">Open in new tab</label>
                </div>

                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
@endsection
