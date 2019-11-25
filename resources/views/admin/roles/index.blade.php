@extends('admin.layouts.admin')

@section('title', trans('admin.roles.title'))

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{ trans('messages.fields.name') }}</th>
                        <th scope="col">{{ trans('messages.fields.action') }}</th>
                    </tr>
                    </thead>
                    <tbody id="sortable">

                    @foreach($roles as $role)
                        <tr>
                            <th scope="row">
                                {{ $role->id }}
                                @if($role->isPermanent())
                                    <i class="fas fa-certificate text-primary" title="{{ trans('admin.roles.info.permanent') }}" data-toggle="tooltip"></i>
                                @endif
                                @if($role->isDefault())
                                    <i class="fas fa-star text-warning" title="{{ trans('admin.roles.info.default') }}" data-toggle="tooltip"></i>
                                @endif
                                @if($role->is_admin)
                                    <i class="fas fa-crown text-warning" title="{{ trans('admin.roles.info.admin') }}" data-toggle="tooltip"></i>
                                @endif
                            </th>
                            <td>
                                <span class="badge badge-label" style="{{ $role->getBadgeStyle() }}">{{ $role->name }}</span>
                            </td>
                            <td>
                                <a href="{{ route('admin.roles.edit', $role) }}" class="mx-1" title="{{ trans('messages.actions.edit') }}" data-toggle="tooltip"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('admin.roles.destroy', $role) }}" class="mx-1 @if($role->isPermanent()) disabled @endif" @if(!$role->isPermanent()) title="{{ trans('messages.actions.delete') }}" data-confirm="delete" data-toggle="tooltip" @endif><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>

            {{ $roles->links() }}

            <a class="btn btn-primary" href="{{ route('admin.roles.create') }}">
                <i class="fas fa-plus"></i> {{ trans('messages.actions.create') }}
            </a>
        </div>
    </div>
@endsection
