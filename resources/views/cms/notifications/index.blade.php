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
                <i class="pe-7s-bell" style="color:#2b8540; font-weight:bold"> </i>

            </div>
            <div>
                Notifications
            </div>
        </div>
    </div>
</div>
<div class="row">

    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">Notifications</h5>
                @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ Session::get('success') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="mb-0 display table table-striped table-bordered the-table">
                        <thead>
                            <tr>
                                <th>ID#</th>
                                <th>User Name</th>
                                <th>Message</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($notifications) > 0)
                                @foreach ($notifications as $key => $notification)
                                {{-- @dd($notification) --}}
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                                <td>{{ $notification->getUser->full_name ?? ''}}</td>
                                                <td>{{ $notification->getUser->full_name ?? ''}} {{ $notification->message ?? '' }}</td>
                                                <td class="d-flex justify-content-left align-items-center">
                                                    <a href="javascript:void(0);"
                                                       class="text-danger "
                                                       data-toggle="tooltip" data-placement="bottom" title=""
                                                        data-original-title="Dismiss"
                                                       onclick="deleteNotification(this, '{{$notification->id}}')"><i class="fas fa-minus-circle"></i></a>
                                                    @if($notification->type === 'apply')
                                                        <a href="/admin/apply-for-scoloarships"
                                                           class="text-info"
                                                   data-toggle="tooltip" data-placement="bottom" title=""
                                                    data-original-title="View"> <i class="fas fa-eye ml-2"></i>
                                                </a>
                                                    @endif
                                                    @if($notification->type === 'claim')
                                                        <a href="/admin/claim-for-scoloarships"
                                                        class="text-info"
                                                        data-toggle="tooltip" data-placement="bottom" title=""
                                                         data-original-title="View"> <i class="fas fa-eye ml-2"></i>
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
                                    <h4 class="card-title">Notifications</h4>
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
                                <table class="display table dataTable table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>ID#</th>
                                        <th>User Name</th>
                                        <th>Message</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($notifications) > 0)
                                        @foreach($notifications as $key => $notification)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $notification->getUser->full_name }}</td>
                                                <td>{{ $notification->getUser->full_name.' '.$notification->message }}</td>
                                                <td>
                                                    <a href="javascript:void(0);"
                                                       class="btn btn-info btn-sm"
                                                       onclick="deleteNotification(this, '{{$notification->id}}')">Dismiss</a>
                                                    @if($notification->type === 'apply')
                                                        <a href="/admin/apply-for-scoloarships"
                                                   w        class="btn btn-success btn-sm">Detail</a>
                                                    @endif
                                                    @if($notification->type === 'claim')
                                                        <a href="/admin/claim-for-scoloarships"
                                                           class="btn btn-success btn-sm">Detail</a>
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
        $(function () {
            $('.table').DataTable();
        });

        function deleteNotification(input, notificationId) {
            swal({
                title: "Are you sure?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                closeOnClickOutside: false
            }).then((willDismiss) => {
                if (willDismiss) {
                    axios.get(`/admin/delete-notification/${notificationId}`).then((response) => {
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
