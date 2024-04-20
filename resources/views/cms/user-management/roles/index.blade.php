@extends('cms.layouts.master')

@push('styles')
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
                Role Management
            </div>
        </div>
        @can('role-create')
            <div class="page-title-actions">
                <div class="d-inline-block ">
                    <a href="/admin/add-role"  class="btn-shadow btn btn-primary">
                        <span class="btn-icon-wrapper pr-2 opacity-7">
                            <i class="fas fa-plus fa-w-20"></i>
                        </span>
                        Add
                    </a>
                </div>
            </div>
        @endcan
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
                <h5 class="card-title">Roles</h5>
                <div class="table-responsive">
                <table class="mb-0 table table-striped table-bordered the-table">
                    <thead>
                        <tr>
                            <th style="max-width: 20px;">ID#</th>
                            <th style="width:350px;">Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($roles) > 0)
                        @foreach($roles as $key => $role)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $role->name }}</td>
                            <td class="d-flex justify-content-left align-items-center">
                                @if($role->name !== 'super-admin')
                                    @can('role-update')
                                    <a href="/admin/update-role/{{$role->id}}" class="text-warning" data-toggle="tooltip" data-placement="bottom"
                                        title="" data-original-title="Update"> <i class="fas fa-pen-square  ml-2 "></i> </a>
                                    @endcan
                                    @can('role-delete')
                                    <a href="javascript:void(0)" class="text-danger" data-toggle="tooltip" data-placement="bottom"
                                        title="" data-original-title="Delete" onclick="deleteRole(this, '{{ $role->id }}')"> <i class="fas fa-trash-alt  ml-2 "></i> </a>
                                    @endcan
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
    {{-- <main>
        <div class="container-fluid site-width">


            <!-- START: Card Data-->
            <div class="row">
                <div class="col-12 mt-3">
                    <div class="card">
                        <div class="card-header  justify-content-between align-items-center">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="card-title">Roles</h4>
                                </div>
                                @can('role-create')
                                    <div class="col-md-6">
                                        <a href="/admin/add-role" class="btn btn-primary float-right">Add +</a>
                                    </div>
                                @endcan
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
                                        <th style="width:350px;">Name</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($roles) > 0)
                                        @foreach($roles as $key => $role)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $role->name }}</td>
                                                <td>
                                                    @if($role->name !== 'super-admin')
                                                        @can('role-update')
                                                            <a href="/admin/update-role/{{$role->id}}"
                                                               class="btn btn-success btn-primary">Update</a>
                                                        @endcan
                                                        @can('role-delete')
                                                            <a href="javascript:void(0)"
                                                               class="btn btn-danger a-btn-custom"
                                                               onclick="deleteRole(this, '{{ $role->id }}')">Delete</a>
                                                        @endcan
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
    <script src="/assets/js/axios.min.js"></script>
    <script src="/assets/js/sweetalert.min.js"></script>
    <script src="/assets/vendors/datatable/js/jquery.dataTables.min.js"></script>
    <script src="/assets/vendors/datatable/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(function () {
            $('.table').DataTable();
        });

        function deleteRole(input, roleId) {
            let tr = $(input).parent().parent();
            swal({
                title: "Are you sure?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                closeOnClickOutside: false
            }).then((willDelete) => {
                if (willDelete) {
                    axios.get(`/admin/delete-role/${roleId}`).then(function (response) {
                        swal(response.data.msg);
                        swal({
                            title: response.data.msg,
                            icon: "success",
                            closeOnClickOutside: false
                        }).then((btn) => {
                            tr.remove();
                        });
                    }).catch(function (error) {
                        swal({
                            title: error.response.data.msg,
                            icon: "error",
                            dangerMode: true
                        });
                    });
                }
            });
        }
    </script>
@endpush
