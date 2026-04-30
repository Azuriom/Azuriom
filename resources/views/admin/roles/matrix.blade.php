@extends('admin.layouts.admin')

@section('title', trans('admin.roles.matrix_title'))

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h1 class="h4 mb-1">
                <i class="bi bi-grid-3x3"></i> {{ trans('admin.roles.matrix_title') }}
            </h1>
            <p class="text-body-secondary mb-0">{{ trans('admin.roles.matrix_subtitle') }}</p>
        </div>
        <a href="{{ route('admin.roles.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> {{ trans('admin.roles.back') }}
        </a>
    </div>

    <form action="{{ route('admin.roles.matrix.update') }}" method="POST" id="matrixForm">
        @csrf

        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="row g-2 mb-3 align-items-center">
                    <div class="col-md">
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-search"></i></span>
                            <input type="search" class="form-control" id="matrixSearch" placeholder="{{ trans('admin.roles.permissions_search') }}" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-md-auto d-flex gap-2">
                        <button type="button" class="btn btn-sm btn-secondary" id="matrixExpandAll">
                            <i class="bi bi-arrows-expand"></i> {{ trans('admin.roles.matrix_expand_all') }}
                        </button>
                        <button type="button" class="btn btn-sm btn-secondary" id="matrixCollapseAll">
                            <i class="bi bi-arrows-collapse"></i> {{ trans('admin.roles.matrix_collapse_all') }}
                        </button>
                    </div>
                </div>

                <div class="table-responsive matrix-wrapper">
                    <table class="table table-hover align-middle matrix-table mb-0">
                        <thead>
                            <tr>
                                <th class="matrix-perm-col">{{ trans('admin.roles.matrix_permission') }}</th>
                                @foreach($roles as $role)
                                    <th class="text-center matrix-role-col" title="{{ trans('admin.roles.info', ['id' => $role->id, 'power' => $role->power]) }}" data-bs-toggle="tooltip">
                                        <span class="badge matrix-role-badge" style="{{ $role->getBadgeStyle() }}">
                                            @if($role->icon) <i class="{{ $role->icon }}"></i> @endif
                                            {{ $role->name }}
                                        </span>
                                    </th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($groupedPermissions as $group => $permissions)
                                <tr class="matrix-group-row" data-matrix-group="{{ $group }}">
                                    <td colspan="{{ $roles->count() + 1 }}" class="bg-body-tertiary">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <button type="button" class="btn btn-link text-decoration-none p-0 fw-bold matrix-group-toggle" data-matrix-group="{{ $group }}" aria-expanded="true">
                                                <i class="bi bi-chevron-down matrix-group-icon"></i>
                                                {{ trans()->has('admin.roles.permission_groups.'.$group) ? trans('admin.roles.permission_groups.'.$group) : ucfirst($group) }}
                                                <span class="badge bg-secondary ms-1">{{ count($permissions) }}</span>
                                            </button>
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-sm btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="bi bi-check2-square"></i> {{ trans('admin.roles.matrix_toggle_group') }}
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    @foreach($roles as $role)
                                                        @php
                                                            $granted = count(array_intersect($rolePermissions[$role->id] ?? [], array_keys($permissions)));
                                                            $total = count($permissions);

                                                            if ($granted === 0) {
                                                                $stateClass = 'bi-square text-body-secondary';
                                                            } elseif ($granted === $total) {
                                                                $stateClass = 'bi-check-square-fill text-success';
                                                            } else {
                                                                $stateClass = 'bi-dash-square-fill text-warning';
                                                            }
                                                        @endphp
                                                        <li>
                                                            <button type="button" class="dropdown-item matrix-group-role-toggle d-flex align-items-center gap-2" data-matrix-group="{{ $group }}" data-role="{{ $role->id }}">
                                                                <i class="bi {{ $stateClass }} matrix-state-icon" data-matrix-group="{{ $group }}" data-role="{{ $role->id }}"></i>
                                                                <span class="badge" style="{{ $role->getBadgeStyle() }}">{{ $role->name }}</span>
                                                                <small class="text-body-secondary ms-auto">{{ $granted }}/{{ $total }}</small>
                                                            </button>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @foreach($permissions as $permission => $permissionDescription)
                                    <tr class="matrix-perm-row" data-matrix-group="{{ $group }}" data-permission-name="{{ $permission }}" data-permission-label="{{ trans($permissionDescription) }}">
                                        <td class="matrix-perm-col">
                                            <code class="small">{{ $permission }}</code>
                                            <div class="small text-body-secondary">{{ trans($permissionDescription) }}</div>
                                        </td>
                                        @foreach($roles as $role)
                                            @php $canUpdate = Auth::user()->can('update', $role); @endphp
                                            <td class="text-center">
                                                <div class="form-check d-inline-block m-0">
                                                    <input type="checkbox" class="form-check-input matrix-cell" name="roles[{{ $role->id }}][]" value="{{ $permission }}" data-matrix-group="{{ $group }}" data-role="{{ $role->id }}" @checked(in_array($permission, $rolePermissions[$role->id] ?? [], true)) @disabled(! $canUpdate)>
                                                </div>
                                                @if(! $canUpdate && in_array($permission, $rolePermissions[$role->id] ?? [], true))
                                                    <input type="hidden" name="roles[{{ $role->id }}][]" value="{{ $permission }}">
                                                @endif
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            @endforeach

                            <tr class="d-none" id="matrixNoResults">
                                <td colspan="{{ $roles->count() + 1 }}" class="text-center py-4 text-body-secondary">
                                    <i class="bi bi-search"></i> {{ trans('admin.roles.permissions_no_results') }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="mt-3 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i> {{ trans('admin.roles.matrix_save') }}
                    </button>
                </div>
            </div>
        </div>
    </form>

    @push('styles')
        <style>
            .matrix-wrapper { max-height: 72vh; overflow: auto; }
            .matrix-table thead th { position: sticky; top: 0; z-index: 2; background: var(--bs-body-bg); padding: .35rem .25rem; }
            .matrix-table .matrix-perm-col { position: sticky; left: 0; z-index: 1; background: var(--bs-body-bg); min-width: 260px; max-width: 320px; }
            .matrix-table thead th.matrix-perm-col { z-index: 3; padding-left: .75rem; }
            .matrix-table .matrix-role-col { min-width: 72px; max-width: 90px; }
            .matrix-table .matrix-role-badge { font-size: .72rem; max-width: 100%; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; padding: .3rem .5rem; }
            .matrix-table td { padding: .25rem .25rem; }
            .matrix-table .matrix-group-toggle { color: inherit; }
            .matrix-table .matrix-group-toggle[aria-expanded="false"] .matrix-group-icon { transform: rotate(-90deg); }
            .matrix-table .matrix-group-icon { transition: transform .15s ease-in-out; }
        </style>
    @endpush

    @push('footer-scripts')
        <script>
            const matrixForm = document.getElementById('matrixForm');

            function refreshMatrixState(group, role) {
                const icon = matrixForm.querySelector('.matrix-state-icon[data-matrix-group="' + group + '"][data-role="' + role + '"]');

                if (!icon) {
                    return;
                }

                const cells = matrixForm.querySelectorAll('.matrix-cell[data-matrix-group="' + group + '"][data-role="' + role + '"]');
                const checked = Array.from(cells).filter(function (cb) { return cb.checked; }).length;
                const counter = icon.parentElement.querySelector('small');

                icon.classList.remove('bi-square', 'bi-dash-square-fill', 'bi-check-square-fill', 'text-body-secondary', 'text-warning', 'text-success');

                if (checked === 0) {
                    icon.classList.add('bi-square', 'text-body-secondary');
                } else if (checked === cells.length) {
                    icon.classList.add('bi-check-square-fill', 'text-success');
                } else {
                    icon.classList.add('bi-dash-square-fill', 'text-warning');
                }

                if (counter) {
                    counter.textContent = checked + '/' + cells.length;
                }
            }

            matrixForm.querySelectorAll('.matrix-group-toggle').forEach(function (btn) {
                btn.addEventListener('click', function () {
                    const group = btn.dataset.matrixGroup;
                    const collapsed = btn.getAttribute('aria-expanded') === 'true';

                    matrixForm.querySelectorAll('.matrix-perm-row[data-matrix-group="' + group + '"]').forEach(function (row) {
                        row.classList.toggle('d-none', collapsed || row.dataset.filteredOut === '1');
                    });

                    btn.setAttribute('aria-expanded', collapsed ? 'false' : 'true');
                });
            });

            document.getElementById('matrixExpandAll').addEventListener('click', function () {
                matrixForm.querySelectorAll('.matrix-group-toggle').forEach(function (btn) { btn.setAttribute('aria-expanded', 'true'); });
                matrixForm.querySelectorAll('.matrix-perm-row').forEach(function (row) { row.classList.toggle('d-none', row.dataset.filteredOut === '1'); });
            });

            document.getElementById('matrixCollapseAll').addEventListener('click', function () {
                matrixForm.querySelectorAll('.matrix-group-toggle').forEach(function (btn) { btn.setAttribute('aria-expanded', 'false'); });
                matrixForm.querySelectorAll('.matrix-perm-row').forEach(function (row) { row.classList.add('d-none'); });
            });

            matrixForm.querySelectorAll('.matrix-group-role-toggle').forEach(function (btn) {
                btn.addEventListener('click', function () {
                    const group = btn.dataset.matrixGroup;
                    const role = btn.dataset.role;
                    const cells = matrixForm.querySelectorAll('.matrix-cell[data-matrix-group="' + group + '"][data-role="' + role + '"]:not(:disabled)');
                    const allChecked = Array.from(cells).every(function (cb) { return cb.checked; });

                    cells.forEach(function (cb) { cb.checked = !allChecked; });
                    refreshMatrixState(group, role);
                });
            });

            matrixForm.addEventListener('change', function (event) {
                const cell = event.target.closest('.matrix-cell');

                if (cell) {
                    refreshMatrixState(cell.dataset.matrixGroup, cell.dataset.role);
                }
            });

            document.getElementById('matrixSearch').addEventListener('input', function () {
                const query = this.value.trim().toLowerCase();
                let visible = 0;

                matrixForm.querySelectorAll('.matrix-perm-row').forEach(function (row) {
                    const matches = !query
                        || row.dataset.permissionName.toLowerCase().includes(query)
                        || row.dataset.permissionLabel.toLowerCase().includes(query);

                    row.dataset.filteredOut = matches ? '0' : '1';
                    row.classList.toggle('d-none', !matches);

                    if (matches) {
                        visible++;
                    }
                });

                matrixForm.querySelectorAll('.matrix-group-row').forEach(function (row) {
                    const any = matrixForm.querySelectorAll('.matrix-perm-row[data-matrix-group="' + row.dataset.matrixGroup + '"]:not(.d-none)').length > 0;
                    row.classList.toggle('d-none', !any);
                });

                document.getElementById('matrixNoResults').classList.toggle('d-none', visible !== 0);
            });
        </script>
    @endpush
@endsection
