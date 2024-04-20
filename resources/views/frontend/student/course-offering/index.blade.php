@extends('frontend.layouts.master')

@push('styles')
    <link rel="stylesheet" type="text/css" href="/assets/css/toggle-switch.css">
    <link rel="stylesheet" href="/assets/vendors/datatable/css/dataTables.bootstrap4.min.css">
@endpush

@section('content')

<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="metismenu-icon" style="margin: 0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22.5" height="30.25"
                        viewBox="0 0 22.5 30.25">
                        <path fill="#2b8540 " class="cls-3" id="course"
                            d="M27,32.5H9a2.209,2.209,0,0,1-2.25-2.161V4.411A2.209,2.209,0,0,1,9,2.25H27a2.209,2.209,0,0,1,2.25,2.161V22.364l-5.625-2.7L18,22.364V4.411H9V30.339H27V26.018h2.25v4.321A2.21,2.21,0,0,1,27,32.5ZM23.625,17.247,27,18.868V4.411H20.25V18.868Z"
                            transform="translate(-6.75 -2.25)" fill="#fff" />
                    </svg>
                </i>
            </div>
            <div>
                Offered Courses
            </div>
        </div>
    </div>
</div>
<div class="row">

    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">Course Offering List</h5>
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
                                <th style="max-width: 20px;">ID#</th>
                                        <th>Title</th>
                                        <th style="width:450px;">Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($courses) > 0)
                                @foreach ($courses as $key => $course)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $course->title }}</td>
                                    <td>{{ \Illuminate\Support\Str::words($course->description,70) ?? '-' }}</td>
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
        @include('partials.announcement')
            <!-- START: Card Data-->
            <div class="row">
                <div class="col-12 mt-3">
                    <div class="card">
                        <div class="card-header  justify-content-between align-items-center">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="card-title">Course Offering List</h4>
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
                                        <th style="max-width: 20px;">ID#</th>
                                        <th>Title</th>
                                        <th style="width:450px;">Description</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($courses) > 0)
                                        @foreach($courses as $key => $course)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $course->title }}</td>
                                                <td>{{ \Illuminate\Support\Str::words($course->description,70) ?? '-' }}</td>
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
                    axios.get(`/admin/delete-course-offering/${documentId}`).then((response) => {
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
