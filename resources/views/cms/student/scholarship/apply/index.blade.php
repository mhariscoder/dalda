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
                    <i class="metismenu-icon" style="margin: 0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28.326" height="25.568"
                            viewBox="0 0 28.326 25.568">
                            <g id="education" transform="translate(-2.25 -3.233)">
                                <path  fill="#2b8540" class="cls-3" id="Path_1660" data-name="Path 1660"
                                    d="M24.061,24.057,16.98,28.041,9.9,24.057V19.849L7.875,18.725v6.516l9.1,5.121,9.1-5.121V18.724l-2.023,1.124v4.208Z"
                                    transform="translate(-0.567 -1.561)" fill="#fff" />
                                <path fill="#2b8540" class="cls-3" id="Path_1661" data-name="Path 1661"
                                    d="M16.413,3.233,2.25,10.576V12.33L16.413,20.2l12.14-6.744v5.588h2.023V10.576Zm10.116,9.031-2.023,1.124-8.093,4.5-8.093-4.5L6.3,12.264l-1.4-.779L16.413,5.512l11.518,5.973Z"
                                    transform="translate(0)" fill="#fff" />
                            </g>
                        </svg>
                    </i>
                </div>
                <div>
                    Scholarship Program
                </div>
            </div>
            <div class="page-title-actions">
                <div class="d-inline-block ">
                    <a href="/admin/add-apply-for-scoloarship" class="btn-shadow btn btn-primary">
                        <span class="btn-icon-wrapper pr-2 opacity-7">
                            <i class="fas fa-plus fa-w-20"></i>
                        </span>
                        Add
                    </a>
                </div>
            </div>
            <a id="tableToExcel" class="btn-shadow btn btn-success ml-2" onclick="exportButton(this)" data-toggle="tooltip"
                data-placement="bottom" title="">
                 {{-- data-original-title="Export to Excel"> --}}
                <span class="btn-icon-wrapper pr-2 opacity-7 text-white">
                    <i class="fas fa-file-excel fa-w-20"></i>
                </span>
                <span class="text-white"> Export </span>
            </a>

            <form id="importForm" action="{{ url('/admin/import-apply-for-scholarship') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input id="excelImport" class="d-none" type="file" name="file" onchange="submitForm()">
                <label for="excelImport" class="btn-shadow btn btn-success ml-2 mb-0">
                    <span class="btn-icon-wrapper pr-2 opacity-7 text-white">
                        <i class="fas fa-file-excel fa-w-20"></i>
                    </span>
                    <span class="text-white"> Import </span>
                </label>
            </form>
        </div>
    </div>

    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">

        <div class="col-lg-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <div class="justify-content-between align-items-center">
                        <form id="searchForm" action="/admin/apply-for-scoloarships" method="GET">
                            <p><b>Search Filters</b></p>
                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <input type="text" class="form-control" placeholder="Search By Student Name"
                                           name="std_name" value="{{request('std_name')}}"/>
                                </div>
                                <div class="col-md-3 form-group">
                                    <input type="text" class="form-control" placeholder="Search By Email"
                                           name="std_email" value="{{request('std_email')}}"/>
                                </div>
                                <div class="col-md-3 form-group">
                                    <select class="form-control rounded" name="std_year">
                                        <option value="">Search By Year</option>
                                        @foreach ($years as $val)
                                            <option value="{{$val}}" {{request('std_year') === $val ? "selected" : ""}}>{{$val}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3 form-group">
                                    <input type="text" class="form-control" placeholder="Search By City"
                                           name="std_city" value="{{request('std_city')}}"/>
                                </div>
                                <div class="col-md-3 form-group">
                                    <input type="text" class="form-control" placeholder="From Date"  onfocus="(this.type='date')"
                                           name="from_date" value="{{request('from_date')}}"/>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" placeholder="To Date"
                                           onfocus="(this.type='date')"
                                           name="to_date" value="{{request('to_date')}}"/>
                                </div>
                                <div class="col-md-3 form-group">
                                    <select class="form-control rounded" name="status">
                                        <option value="">Search By Status</option>
                                        <option value="pending">Pending</option>
                                        <option value="approved">Approved</option>
                                        <option value="rejected">Rejected</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <input type="submit" class="btn btn-success"/>
                                    <button type="button" class="btn btn-primary reset">Clear Filters</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <hr>
                    @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ Session::get('success') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <h5 class="card-title">STUDENT APPLIED SCHOLARSHIPS</h5>

                    <div class="table-responsive">
                        <table class="mb-0 display table table-striped table-bordered the-table">
                            <thead>
                                <tr>
                                    <th style="width: 25px;">ID#</th>
                                    <th style="width: 500px;">Email</th>
                                    <th>Status</th>
                                    <th>Approved / Rejected</th>
                                    <th style="width: 10%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($applies) > 0)
                                    @foreach ($applies as $key => $apply)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                                <td>{{ $apply->email_address }}</td>
                                                <td>
                                                    @if ($apply->status == 'pending')
                                                        <div class="mb-2 mr-2 badge badge-secondary">Pending</div>
                                                    @elseif ($apply->status == 'rejected')
                                                        <div class="mb-2 mr-2 badge badge-danger">Rejected</div>
                                                    @else
                                                    <div class="mb-2 mr-2 badge badge-success">Approved</div>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($apply->status === 'pending')
                                                        <div class="d-flex justify-content-start flex-row flex-wrap">
                                                            <a href="javascript:void(0);"
                                                               class="btn btn-success btn-sm"
                                                               onclick="changeStatus(this,'{{$apply->id}}','approved')">Approved</a>
                                                            <a href="javascript:void(0);"
                                                               class="btn btn-warning btn-sm ml-1"
                                                               onclick="changeStatus(this,'{{$apply->id}}','rejected')">Rejected</a>
                                                        </div>
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td class="d-flex justify-content-left align-items-center">
                                                    <a href="/admin/apply-for-scoloarship-detail/{{$apply->id}}"
                                                        class="text-info"
                                                        data-toggle="tooltip" data-placement="bottom" title=""
                                                        data-original-title="View"><i class="fas fa-eye  ml-2"></i></a>
                                                    @if ($apply->status === 'pending')
                                                        @can('apply-scholarship-update')
                                                            <a href="/admin/update-apply-for-scoloarship/{{$apply->id}}"
                                                                class="text-warning"
                                                                data-toggle="tooltip" data-placement="bottom" title=""
                                                                data-original-title="Update"> <i
                                                                    class="fas fa-pen-square  ml-2 "></i> </a>
                                                        @endcan
                                                    @endif
                                                    @if ($apply->status === 'approved')
                                                        <a href="/admin/admit-card/{{$apply->id}}"
                                                            class="text-primary" target="_blank"
                                                                data-toggle="tooltip" data-placement="bottom" title=""
                                                                data-original-title="Admit Card"> <i
                                                                    class="fas fa-id-card fa-lg ml-2 "></i> </a>
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
                                <div class="col-8 col-md-6">
                                    <h4 class="card-title">Student Applied Scholarships</h4>
                                </div>
                                <div class="col-4 col-md-6 d-flex justify-content-end">
                                    <button id="tableToExcel" class="btn text-white mr-3"
                                            onclick="exportButton(this)" data-toggle="tooltip" data-placement="bottom"
                                            title="" data-original-title="Export to Excel"
                                            style="background-color: #306e3f;">EXPORT
                                    </button>
                                    <a href="/admin/add-apply-for-scoloarship" class="btn btn-primary">Add
                                        +</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-header  justify-content-between align-items-center">
                            <form id="searchForm" action="/admin/apply-for-scoloarships" method="GET">
                                <h6>Search Filters</h6>
                                <div class="row">
                                    <div class="col-md-3 form-group">
                                        <input type="text" class="form-control" placeholder="Search By Student Name"
                                               name="std_name" value="{{request('std_name')}}"/>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <input type="text" class="form-control" placeholder="Search By Email"
                                               name="std_email" value="{{request('std_email')}}"/>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <select class="form-control rounded" name="std_year">
                                            <option value="">Search By Year</option>
                                            @foreach ($years as $val)
                                                <option value="{{$val}}" {{request('std_year') === $val ? "selected" : ""}}>{{$val}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <input type="text" class="form-control" placeholder="Search By City"
                                               name="std_city" value="{{request('std_city')}}"/>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <input type="text" class="form-control" placeholder="From Date"  onfocus="(this.type='date')"
                                               name="from_date" value="{{request('from_date')}}"/>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" placeholder="To Date"
                                               onfocus="(this.type='date')"
                                               name="to_date" value="{{request('to_date')}}"/>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <select class="form-control rounded" name="status">
                                            <option value="">Search By Status</option>
                                            <option value="pending">Pending</option>
                                            <option value="approved">Approved</option>
                                            <option value="rejected">Rejected</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="submit" class="btn btn-success"/>
                                        <button type="button" class="btn btn-primary reset">Clear Filters</button>
                                    </div>
                                </div>
                            </form>
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
                                        <th style="max-width: 25px;">ID#</th>
                                        <th style="max-width: 160px;">Email</th>
                                        <th>Status</th>
                                        <th>Approved / Rejected</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if (count($applies) > 0)
                                        @foreach ($applies as $key => $apply)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $apply->email_address }}</td>
                                                <td>
                                                    <button href="javascript:void(0);"
                                                            class="btn btn-dark btn-sm"
                                                            disabled>{{ $apply->status }}</button>
                                                </td>
                                                <td>
                                                    @if ($apply->status === 'pending')
                                                        <div class="d-flex justify-content-start flex-row flex-wrap">
                                                            <a href="javascript:void(0);"
                                                               class="btn btn-success btn-sm"
                                                               onclick="changeStatus(this,'{{$apply->id}}','approved')">Approved</a>
                                                            <a href="javascript:void(0);"
                                                               class="btn btn-warning btn-sm ml-1"
                                                               onclick="changeStatus(this,'{{$apply->id}}','rejected')">Rejected</a>
                                                        </div>
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td class="cstm-flex-gap">
                                                    <a href="/admin/apply-for-scoloarship-detail/{{$apply->id}}"
                                                       class="btn btn-info btn-sm">Detail</a>
                                                    @if ($apply->status === 'pending')
                                                        @can('apply-scholarship-update')
                                                            <a href="/admin/update-apply-for-scoloarship/{{$apply->id}}"
                                                               class="btn btn-primary btn-sm ml-1">Update</a>
                                                        @endcan
                                                    @endif
                                                    @if ($apply->status === 'approved')
                                                        <a href="/admin/admit-card/{{$apply->id}}"
                                                           class="btn btn-dark btn-sm" target="_blank">Admit Card</a>
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
        $(function() {
            $('.table').DataTable({
                responsive: true,
                autoWidth: false,
            });

            $(".reset").on('click', function() {
                var uri = window.location.toString();
                if (uri.indexOf("?") > 0) {
                    var clean_uri = uri.substring(0, uri.indexOf("?"));
                    window.history.replaceState({}, document.title, clean_uri);
                    window.location.reload();
                }
            });
        });

        function changeStatus(input, applyId, status) {
            swal({
                title: "Are you sure?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                closeOnClickOutside: false
            }).then((response) => {
                if (response) {
                    axios.get(`/admin/apply-scholarship-change-status/${applyId}/${status}`).then((response) => {

                        swal({
                            title: response.data.msg,
                            icon: "success",
                            closeOnClickOutside: false
                        }).then((btn) => {
                            window.location.reload();
                        });
                    }).catch((error) => {
                        swal({
                            title: error.response.data.msg,
                            icon: "error",
                            dangerMode: true
                        });
                    });
                }
            });
        }

        function exportButton(input) {
            axios.get('/admin/students/applied-scholarships/export')
                .then(function(response) {
                    window.open(response.data, '_blank');
                })
                .catch(function(error) {
                    console.log(error.data);
                });
        }

        function submitForm() {
            document.getElementById("importForm").submit();
        }
    </script>
@endpush
