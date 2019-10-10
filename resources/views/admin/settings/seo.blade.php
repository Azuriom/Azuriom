@extends('admin.layouts.admin')

@section('title', 'SEO settings')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admin.settings.update-seo') }}" method="POST">
                @csrf

                <div class="form-group mb-0">
                    <label for="keyInput">Google Analytics site id</label>
                    <input type="text" class="form-control @error('g-analytics-id') is-invalid @enderror" id="keyInput" name="g-analytics-id" placeholder="UA-XXXXXXXX-1" value="{{ old('g-analytics-id', setting('g-analytics-id', '')) }}">

                    @error('g-analytics-id')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror

                    <small>You can get the site id on the
                        <a href="https://www.google.com/analytics/web/" target="_blank"> Google Analytics website</a>.
                    </small>
                </div>

                <div class="form-group">
                    <label for="keywordsInput">Meta keywords</label>
                    <input type="text" class="form-control @error('keywords') is-invalid @enderror" id="keywordsInput" name="keywords" placeholder="word1, word2" value="{{ old('keywords', setting('keywords', '')) }}">
                    <small>The keywords must be separated with a comma.</small>

                    @error('keywords')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
