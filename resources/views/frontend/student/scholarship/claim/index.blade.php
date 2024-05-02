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
                    <i class="metismenu-icon" style="margin:0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28.326" height="25.568"
                            viewBox="0 0 28.326 25.568">
                            <g id="education" transform="translate(-2.25 -3.233)">
                                <path fill="#2b8540 " class="cls-3" id="Path_1660" data-name="Path 1660"
                                    d="M24.061,24.057,16.98,28.041,9.9,24.057V19.849L7.875,18.725v6.516l9.1,5.121,9.1-5.121V18.724l-2.023,1.124v4.208Z"
                                    transform="translate(-0.567 -1.561)" fill="#fff" />
                                <path fill="#2b8540 " class="cls-3" id="Path_1661" data-name="Path 1661"
                                    d="M16.413,3.233,2.25,10.576V12.33L16.413,20.2l12.14-6.744v5.588h2.023V10.576Zm10.116,9.031-2.023,1.124-8.093,4.5-8.093-4.5L6.3,12.264l-1.4-.779L16.413,5.512l11.518,5.973Z"
                                    transform="translate(0)" fill="#fff" />
                            </g>
                        </svg>
                    </i>
                </div>
                <div>
                    Your Claimed Scholarships
                </div>
            </div>
            <div class="page-title-actions">
                <div class="d-inline-block ">
                    <a href="/student/add-claim-for-scholarship" class="btn-shadow btn btn-primary">
                        <span class="btn-icon-wrapper pr-2 opacity-7">
                            <i class="fas fa-plus fa-w-20"></i>
                        </span>
                        Claim Now
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
                    @if (Session::has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ Session::get('error') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <h5 class="card-title">Your Claimed Scholarships</h5>

                    <div class="table-responsive">
                        <table class="mb-0 display table table-striped table-bordered the-table">
                            <thead>
                                <tr>
                                    <th style="max-width: 25px;">ID#</th>
                                    <th style="max-width: 60px;">Your Id</th>
                                    <th style="max-width: 160px;">Email</th>
                                    <th>Claimed Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($claims) > 0)
                                    @foreach ($claims as $key => $claim)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $claim->student_id }}</td>
                                            <td>{{ $claim->email_address }}</td>
                                            <td>{{ \Carbon\Carbon::parse($claim->created_at,'UTC')->isoFormat('MMMM Do YYYY') }}</td>
                                            <td>
                                                @if ($claim->status == 'pending')
                                                    <div class="mb-2 mr-2 badge badge-secondary">Pending</div>
                                                @elseif ($claim->status == 'rejected')
                                                    <div class="mb-2 mr-2 badge badge-danger">Rejected</div>
                                                @else
                                                    <div class="mb-2 mr-2 badge badge-success">Approved</div>
                                                @endif
                                            </td>
                                            <td class="cstm-flex-gap">
                                                <a href="/student/claim-for-scholarship-detail/{{ $claim->id }}"
                                                    class="text-info" data-toggle="tooltip" data-placement="bottom"
                                                    title="" data-original-title="View"><i
                                                        class="fas fa-eye  ml-2"></i></a>
                                                @if ($claim->status === 'pending')
                                                    <a href="/student/update-claim-for-scholarship/{{$claim->id}}"
                                                        class="text-warning"
                                                        data-toggle="tooltip" data-placement="bottom" title=""
                                                        data-original-title="Update"> <i
                                                            class="fas fa-pen-square  ml-2 "></i> </a>
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
                                    <h4 class="card-title">Your Claimed Scholarships</h4>
                                </div>
                                <div class="col-4 col-md-6">
                                    <a href="/student/add-claim-for-scholarship" class="btn btn-primary float-right">Claim Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            @if (Session::has('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>{{ Session::get('error') }}</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
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
                                        <th style="max-width: 60px;">Your Id</th>
                                        <th style="max-width: 160px;">Email</th>
                                        <th>Claimed Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if (count($claims) > 0)
                                        @foreach ($claims as $key => $claim)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $claim->student_id }}</td>
                                                <td>{{ $claim->email_address }}</td>
                                                <td>{{ \Carbon\Carbon::parse($claim->created_at,'UTC')->isoFormat('MMMM Do YYYY') }}</td>
                                                <td><button class="btn btn-dark btn-sm"
                                                            disabled>{{ $claim->status }}</button></td>
                                                <td>
                                                    <a href="/student/claim-for-scholarship-detail/{{$claim->id}}"
                                                       class="btn btn-info btn-sm">Detail</a>
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
    <script src="/assets/vendors/datatable/js/jquery.dataTables.min.js"></script>
    <script src="/assets/vendors/datatable/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(function() {
            $('.table').DataTable();
        });
    </script>
@endpush
