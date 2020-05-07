@extends('admin.layouts.admin')

@section('title', trans('admin.posts.title'))

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{ trans('messages.fields.title') }}</th>
                        <th scope="col">{{ trans('messages.fields.image') }}</th>
                        <th scope="col">{{ trans('messages.fields.slug') }}</th>
                        <th scope="col">{{ trans('messages.fields.author') }}</th>
                        <th scope="col">{{ trans('messages.fields.action') }}</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($posts as $post)
                        <tr>
                            <th scope="row">
                                {{ $post->id }}
                                @if($post->is_pinned)
                                    <i class="fas fa-thumbtack text-primary rotate-45" title="{{ trans('admin.posts.info.pinned') }}" data-toggle="tooltip"></i>
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
                            <td>
                                <a href="{{ route('admin.posts.edit', $post) }}" class="mx-1" title="{{ trans('messages.actions.edit') }}" data-toggle="tooltip"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('admin.posts.destroy', $post) }}" class="mx-1" title="{{ trans('messages.actions.delete') }}" data-toggle="tooltip" data-confirm="delete"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>

            {{ $posts->links() }}

            <a class="btn btn-primary" href="{{ route('admin.posts.create') }}">
                <i class="fas fa-plus"></i> {{ trans('messages.actions.add') }}
            </a>
        </div>
    </div>
@endsection
