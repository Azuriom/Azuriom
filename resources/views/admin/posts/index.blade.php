@extends('admin.layouts.admin')

@section('title', trans('admin.posts.title'))

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{ trans('messages.fields.title') }}</th>
                        <th scope="col">{{ trans('messages.fields.image') }}</th>
                        <th scope="col">{{ trans('messages.fields.slug') }}</th>
                        <th scope="col">{{ trans('messages.fields.author') }}</th>
                        <th scope="col">{{ trans('messages.fields.date') }}</th>
                        <th scope="col">{{ trans('messages.fields.action') }}</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($posts as $post)
                        <tr>
                            <th scope="row">
                                {{ $post->id }}
                                @if($post->is_pinned)
                                    <i class="bi bi-pin-angle text-primary" title="{{ trans('admin.posts.pinned') }}" data-bs-toggle="tooltip"></i>
                                @endif
                            </th>
                            <td>{{ $post->title }}</td>
                            <td>
                                @if($post->image !== null)
                                    <img src="{{ $post->imageUrl() }}" class="img-small rounded" alt="{{ $post->title  }}">
                                @endif
                            </td>
                            <td><a href="{{ route('posts.show', $post) }}">{{ $post->slug }}</a></td>
                            <td>
                                <a href="{{ route('admin.users.edit', $post->author ) }}">{{ $post->author->name }}</a>
                            </td>
                            <td>{{ format_date($post->published_at)  }}</td>
                            <td>
                                <a href="{{ route('admin.posts.edit', $post) }}" class="mx-1" title="{{ trans('messages.actions.edit') }}" data-bs-toggle="tooltip"><i class="bi bi-pencil-square"></i></a>
                                <a href="{{ route('admin.posts.destroy', $post) }}" class="mx-1" title="{{ trans('messages.actions.delete') }}" data-bs-toggle="tooltip" data-confirm="delete"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>

            {{ $posts->links() }}

            <a class="btn btn-primary mb-3" href="{{ route('admin.posts.create') }}">
                <i class="bi bi-plus-lg"></i> {{ trans('messages.actions.add') }}
            </a>

            <p class="mb-0">
                <i class="bi bi-info-circle text-primary"></i>
                @lang('admin.posts.feed', ['rss' => route('feeds.rss'), 'atom' => route('feeds.atom')])
            </p>
        </div>
    </div>
@endsection
