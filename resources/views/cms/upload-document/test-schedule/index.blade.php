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
                <i class="pe-7s-info" style="color:#2b8540;"> </i>

            </div>
            <div>
                Test Schedule Management
            </div>
        </div>
        <div class="page-title-actions">
            <div class="d-inline-block ">
                <a href="/admin/add-test-schedule"  class="btn-shadow btn btn-primary">
                    <span class="btn-icon-wrapper pr-2 opacity-7">
                        <i class="fas fa-file-upload fa-w-20"></i>
                    </span>
                    Add
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
                <h5 class="card-title">TEST SCHEDULE List</h5>
                <div class="table-responsive">
                <table class="mb-0 table table-striped table-bordered the-table">
                    <thead>
                        <tr>
                            <th style="max-width: 20px;">ID#</th>
                            <th>Title</th>
                            <th style="width:400px;">Description</th>
                            <th>File</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($tests) > 0)
                        @foreach($tests as $key => $test)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $test->title }}</td>
                            <td>{{ \Illuminate\Support\Str::words($test->description,40) ?? '' }}</td>
                            @if(!empty($test->name))
                                <td>
                                    <a href="{{Storage::url('uploads/'.$test->name ?? '')}}" data-toggle="tooltip" data-placement="bottom"
                                        title="" data-original-title="View File"
                                        target="_blank" class="btn btn-info btn-sm"><i class="fas fa-file"></i></a>
                                </td>
                            @else
                                <td>-</td>
                            @endif
                            <td class="d-flex justify-content-left align-items-center">
                                <a href="/admin/update-test-schedule/{{$test->id}}" class="text-warning" data-toggle="tooltip" data-placement="bottom"
                                    title="" data-original-title="Update"> <i class="fas fa-pen-square  ml-2 "></i> </a>
                                <a href="javascript:void(0)" class="text-danger" data-toggle="tooltip" data-placement="bottom"
                                    title="" data-original-title="Delete" onclick="deleteDocument(this, '{{$test->id}}')"> <i class="fas fa-trash-alt  ml-2 "></i> </a>
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
                                    <h4 class="card-title">Test Schedule List</h4>
                                </div>
                                <div class="col-md-6">
                                    <a href="/admin/add-test-schedule" class="btn btn-primary float-right">Add +</a>
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
                                <table class="table table-striped the-table">
                                    <thead>
                                    <tr>
                                        <th style="max-width: 25px;">ID#</th>
                                        <th>Title</th>
                                        <th style="width:400px;">Description</th>
                                        <th>File</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($tests) > 0)
                                        @foreach($tests as $key => $test)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $test->title }}</td>
                                                <td>{{ \Illuminate\Support\Str::words($test->description,40) ?? '' }}</td>
                                                @if(!empty($test->name))
                                                    <td>
                                                        <a href="{{Storage::url('uploads/'.$test->name ?? '')}}"
                                                           target="_blank" class="btn btn-dark btn-sm">View File</a>
                                                    </td>
                                                @else
                                                    <td>-</td>
                                                @endif
                                                <td>
                                                    <a href="/admin/update-test-schedule/{{$test->id}}"
                                                       class="btn btn-info btn-sm">Update</a>
                                                    <a href="javascript:void(0);"
                                                       class="btn btn-danger btn-sm"
                                                       onclick="deleteDocument(this, '{{$test->id}}')">Delete</a>
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
        $(function () {
            $('.table').DataTable();
        });

        function deleteDocument(input, documentId) {
            swal({
                title: "Are you sure?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                closeOnClickOutside: false
            }).then((willDismiss) => {
                if (willDismiss) {
                    axios.get(`/admin/delete-test-schedule/${documentId}`).then((response) => {
                        swal({
                            title: response.data.msg,
                            icon: "success",
                            closeOnClickOutside: false
                        }).then((successBtn) => {
                            if (successBtn) {
                                $(input).parent().parent().remove();
                            }
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
