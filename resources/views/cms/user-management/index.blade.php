@extends('cms.layouts.master')

@push('styles')
    <link rel="stylesheet" type="text/css" href="/assets/css/toggle-switch.css">
    <link rel="stylesheet" href="/assets/vendors/datatable/css/dataTables.bootstrap4.min.css">
@endpush

@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-users " style="color:#2b8540;font-weight:bold"> </i>
                </div>
                <div>
                    User Management
                </div>
            </div>
            <div class="page-title-actions">
                <div class="d-inline-block dropdown">
                    @can('user-create')
                        <a href="/admin/add-user" class="btn-shadow btn btn-primary">
                            <span class="btn-icon-wrapper pr-2 opacity-7">
                                <i class="fas fa-user-plus fa-w-20" ></i>
                            </span>
                            Add
                        </a>
                    @endcan
                    <a id="tableToExcel" class="btn-shadow btn btn-success ml-2" onclick="exportButton(this)"
                        data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Export to Excel">
                        <span class="btn-icon-wrapper pr-2 opacity-7 text-white">
                            <i class="fas fa-file-excel fa-w-20"></i>
                        </span>
                        <span class="text-white"> Export </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ Session::get('success') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <h5 class="card-title">Users</h5>
                    <div class="table-responsive">
                        <table class="mb-0 table table-striped table-bordered the-table">
                            <thead>
                                <tr>
                                    <th style="max-width: 20px;">ID#</th>
                                    <th style="max-width:200px;">Full Name</th>
                                    <th style="max-width:200px;">Email</th>
                                    <th style="max-width:200px;">Contact Number</th>
                                    <th style="max-width:250px;">Role</th>
                                    <th style="max-width:250px;">Status</th>
                                    <th style="min-width:140px;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($users) > 0)
                                    @foreach ($users as $key => $user)
                                        {{-- {{ dd($user) }} --}}
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $user->full_name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->contact }}</td>
                                            <td>
                                                @foreach ($user->roles as $role)
                                                    <div class="mb-2 mr-2 badge badge-secondary">
                                                        {{ $role->name == 'super-admin' ? 'admin' : $role->name }}</div>
                                                @endforeach
                                            </td>
                                            <td>
                                                @if (!empty($user->is_block))
                                                    <div class="mb-2 mr-2 badge badge-danger">Inactive</div>
                                                @else
                                                    <div class="mb-2 mr-2 badge badge-success">Active</div>
                                                @endif
                                            </td>
                                            <td class="d-flex justify-content-left align-items-center">

                                                <a href="/admin/user-detail/{{ $user->id }}" class="text-info"
                                                    data-toggle="tooltip" data-placement="bottom" title=""
                                                    data-original-title="View"><i class="fas fa-eye  ml-2"></i></a>
                                                @if ($user->is_block === 0)
                                                    @can('user-update')
                                                        <a href="/admin/update-user/{{ $user->id }}" class="text-warning"
                                                            data-toggle="tooltip" data-placement="bottom" title=""
                                                            data-original-title="Update"> <i
                                                                class="fas fa-pen-square  ml-2 "></i> </a>

                                                    @endcan
                                                @endif
                                                @if (!empty($user->verification_token))
                                                    <a href="/admin/resend-verification-email/{{ $user->verification_token }}"
                                                        data-toggle="tooltip" class="text-secondary" data-placement="bottom"
                                                        title="" data-original-title="Resend Email"><i
                                                            class="fas fa-envelope  ml-2"></i></a>
                                                @endif
                                                <label class="switch">
                                                    <input type="checkbox" name="is_active" class="is_active" value="1"
                                                        onchange="blockUser(this, '{{ $user->id }}','{{ $user->is_block }}')"
                                                        {{ !empty($user->is_block) ? 'checked' : '' }}>
                                                    <span class="slider" data-toggle="tooltip" data-placement="bottom"
                                                        title="" data-original-title="Block/Unblock"></span>
                                                </label>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <main>
        <div class="container-fluid site-width">

            <!-- START: Card Data-->
            <div class="row">
                <div class="col-12 mt-3">
                    <div class="card">
                        <div class="card-header  justify-content-between align-items-center">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="card-title">Users</h4>
                                </div>
                                <div class="col-4 col-md-6 d-flex justify-content-end">
                                    <button id="tableToExcel" class="btn text-white mr-3"
                                            onclick="exportButton(this)" data-toggle="tooltip" data-placement="bottom"
                                            title="" data-original-title="Export to Excel"
                                            style="background-color: #306e3f;">EXPORT
                                    </button>
                                    <a href="/admin/add-user" class="btn btn-primary float-right">Add +</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            @if (Session::has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{ Session::get('success') }}</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered the-table">
                                    <thead>
                                    <tr>
                                        <th style="max-width: 20px;">ID#</th>
                                        <th style="max-width:200px;">Name</th>
                                        <th style="max-width:200px;">Email</th>
                                        <th style="max-width:250px;">Role</th>
                                        <th style="max-width:100px;">UnBlock / Block</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if (count($users) > 0)
                                        @foreach ($users as $key => $user)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $user->full_name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    @foreach ($user->roles as $role)
                                                        <button type="button"
                                                                class="btn btn-dark btn-sm text-break">{{ $role->name == 'super-admin' ? 'admin' : $role->name }}</button>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    <label class="switch">
                                                        <input type="checkbox" name="is_active"
                                                               class="is_active"
                                                               value="1"
                                                               onchange="blockUser(this, '{{ $user->id }}','{{$user->is_block}}')"
                                                                {{ !empty($user->is_block) ? 'checked' : '' }}>
                                                        <span class="slider round"></span>
                                                    </label>
                                                </td>
                                                <td class="cstm-flex-gap">
                                                    @if ($user->is_block === 0)
                                                        <a href="/admin/update-user/{{$user->id}}"
                                                           class="btn btn-primary btn-sm">Update</a>
                                                    @endif
                                                        <a href="/admin/user-detail/{{$user->id}}"
                                                           class="btn btn-success btn-sm">Detail</a>
                                                    @if (!empty($user->verification_token))
                                                        <a href="/admin/resend-verification-email/{{ $user->verification_token }}"
                                                           class="btn btn-warning btn-sm text-nowrap">Resend Email</a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- END: Card DATA-->
        </div>
    </main> --}}
@endsection

@push('scripts')
    <script src="/assets/js/bootstrap4-toggle.min.js"></script>
    <script src="/assets/js/axios.min.js"></script>
    <script src="/assets/js/sweetalert.min.js"></script>
    <script src="/assets/vendors/datatable/js/jquery.dataTables.min.js"></script>
    <script src="/assets/vendors/datatable/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(function() {
            $('.table').DataTable();
        });

        function blockUser(input, userId, is_block) {
            let status = is_block === '1' ? "unblock" : "block";
            swal({
                title: "Are you sure you want to " + status + "?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                closeOnClickOutside: false
            }).then((willDelete) => {
                if (willDelete) {
                    axios.get(`/admin/block-user/${userId}`).then(function(response) {
                        swal({
                            title: response.data.msg,
                            icon: "success",
                            closeOnClickOutside: false
                        }).then((successBtn) => {
                            if (successBtn) {
                                location.reload();
                                $(input).prop("checked", input.checked ? false : true);
                            }
                        });
                    }).catch(function(error) {
                        swal({
                            title: error.response.data.msg,
                            icon: "error",
                            dangerMode: true
                        });
                    });
                }
            });
            $(input).prop("checked", input.checked ? false : true);
        }

        function exportButton(input) {
            axios.get('/admin/users/export', {}, {
                    responseType: 'blob'
                })
                .then(function(response) {
                    window.open(response.data, '_blank');
                })
                .catch(function(error) {
                    console.log(error.data);
                });
        }
    </script>
@endpush
