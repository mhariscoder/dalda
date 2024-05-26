@extends('cms.layouts.master')

@push('styles')
    <link rel="stylesheet" href="/css/dashboard.css">

    <style>
        .cardHeading {
            min-height: 40px;
            line-height: 1.1;
            letter-spacing: 2px;
            font-size: 1em;
        }
    </style>
@endpush

@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    {{-- <i class="pe-7s-world  ">
                    </i> --}}
                    <i class="metismenu-icon" style="margin: 0"><svg xmlns="http://www.w3.org/2000/svg" width="27" height="27"
                        viewBox="0 0 27 27">
                        <g id="Icon_material-dashboard" data-name="Icon material-dashboard"
                            transform="translate(-4.5 -4.5)" fill="none">
                            <path fill="#2b8540 "  d="M4.5,19.5h12V4.5H4.5Zm0,12h12v-9H4.5Zm15,0h12v-15h-12Zm0-27v9h12v-9Z"
                                stroke="none" />
                            <path fill="#2b8540 " class="cls-3"
                                d="M 29.5 29.5 L 29.5 18.5 L 21.5 18.5 L 21.5 29.5 L 29.5 29.5 M 14.5 29.5 L 14.5 24.5 L 6.5 24.5 L 6.5 29.5 L 14.5 29.5 M 14.5 17.5 L 14.5 6.5 L 6.5 6.5 L 6.5 17.5 L 14.5 17.5 M 29.5 11.5 L 29.5 6.5 L 21.5 6.5 L 21.5 11.5 L 29.5 11.5 M 31.5 31.5 L 19.5 31.5 L 19.5 16.5 L 31.5 16.5 L 31.5 31.5 Z M 16.5 31.5 L 4.5 31.5 L 4.5 22.5 L 16.5 22.5 L 16.5 31.5 Z M 16.5 19.5 L 4.5 19.5 L 4.5 4.5 L 16.5 4.5 L 16.5 19.5 Z M 31.5 13.5 L 19.5 13.5 L 19.5 4.5 L 31.5 4.5 L 31.5 13.5 Z"
                                stroke="none" fill="#fff" />
                        </g>
                    </svg></i>
                </div>
                <div>Analytics Dashboard
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card card-coin">
                <div class="card-body">
                    <div class="row align-items-center mb-4">
                        <div class="col-4">
                            <h4 class="text-uppercase mb-0">Form Filter</h4>
                        </div>
                        <div class="col-4"></div>
                        <div class="col-4">
                            <input type="text" id="form-daterange-picker" class="form-control" placeholder="Click here for filter"/>
                        </div>
                    </div>

                    <div class="row py-2">
                        <div class="col-4">
                            <div class="card card-coin">
                                <div class="card-body">
                                    <h6 class="text-uppercase cardHeading">Application Form Submitted</h6>
                                    <h2 class="my-2 font-w600 font-weight-bold" id="application-form-submitted">0</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card card-coin">
                                <div class="card-body">
                                    <h6 class="text-uppercase cardHeading">Claim Form Submitted</h6>
                                    <h2 class="my-2 font-w600 font-weight-bold" id="claim-form-submitted">0</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row py-2">
        <div class="col py-2">
            <div class="card bg-white h-100">
                <div class="card-body bg-white">
                    <div class="rotate">
                        <i class="fa fa-user fa-4x" ></i>
                    </div>
                    <h6 class="text-uppercase cardHeading">Total Users</h6>
                    <h2 class="my-2 font-w600 font-weight-bold" id="totalUsers">{{$totalUsers - 1}}</h2>
                </div>
            </div>
        </div>
        <div class="col py-2">
            <div class="card bg-white h-100">
                <div class="card-body bg-white">
                    <div class="rotate">
                        <i class="fa fa-user-lock fa-4x"></i>
                    </div>
                    <h6 class="text-uppercase cardHeading">Block Users</h6>
                    <h2 class="my-2 font-w600 font-weight-bold" id="blockUsers">{{$blockUsers}}</h2>
                </div>
            </div>
        </div>
        <div class="col py-2">
            <div class="card bg-white h-100">
                <div class="card-body bg-white">
                    <div class="rotate">
                        <i class="fa fa-user-graduate fa-4x"></i>
                    </div>
                    <h6 class="text-uppercase cardHeading">Total Students</h6>
                    <h2 class="my-2 font-w600 font-weight-bold" id="totalStudents">{{$students}}</h2>
                </div>
            </div>
        </div>

        <!-- <div class="col py-2">
            <div class="card bg-white h-100">
                <div class="card-body bg-white">
                    <div class="rotate">
                        <i class="fa fa-graduation-cap fa-4x"></i>
                    </div>
                    <h6 class="text-uppercase">Applied Scholarships</h6>
                    <h1 class="display-4">{{$appliedScholarships}}</h1>
                </div>
            </div>
        </div>
        <div class="col py-2">
            <div class="card bg-white h-100">
                <div class="card-body bg-white">
                    <div class="rotate">
                        <i class="fa fa-university fa-4x"></i>
                    </div>
                    <h6 class="text-uppercase">Claimed Scholarships</h6>
                    <h1 class="display-4">{{$claimedScholarships}}</h1>
                </div>
            </div>
        </div> -->
    </div>

    <div class="row py-2">
        <div class="col-4">
            <div class="card card-coin">
                <div class="card-body">
                    <!-- <div class="rotate">
                        <i class="fa fa-graduation-cap fa-4x"></i>
                    </div> -->
                    <h6 class="text-uppercase cardHeading">Applications Forms Received from Students</h6>
                    <h2 class="my-2 font-w600 font-weight-bold" id="applyForScholorshipAll">{{$applyForScholorship['all']}}</h2>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card card-coin">
                <div class="card-body">
                    <!-- <div class="rotate">
                        <i class="fa fa-graduation-cap fa-4x"></i>
                    </div> -->
                    <h6 class="text-uppercase cardHeading">Applications forms Approved</h6>
                    <h2 class="my-2 font-w600 font-weight-bold" id="applyForScholorshipApproved">{{$applyForScholorship['approved']}}</h2>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card card-coin">
                <div class="card-body">
                    <!-- <div class="rotate">
                        <i class="fa fa-graduation-cap fa-4x"></i>
                    </div> -->
                    <h6 class="text-uppercase cardHeading">Applications forms Rejected</h6>
                    <h2 class="my-2 font-w600 font-weight-bold" id="applyForScholorshipRejected">{{$applyForScholorship['rejected']}}</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="row py-2">
        <div class="col-4">
            <div class="card card-coin">
                <div class="card-body">
                    <!-- <div class="rotate">
                        <i class="fa fa-graduation-cap fa-4x"></i>
                    </div> -->
                    <h6 class="text-uppercase cardHeading">Claim Forms Received from Students</h6>
                    <h2 class="my-2 font-w600 font-weight-bold" id="claimForScholorshipAll">{{$claimForScholorship['all']}}</h2>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card card-coin">
                <div class="card-body">
                    <!-- <div class="rotate">
                        <i class="fa fa-graduation-cap fa-4x"></i>
                    </div> -->
                    <h6 class="text-uppercase cardHeading">Claim form Approved</h6>
                    <h2 class="my-2 font-w600 font-weight-bold" id="claimForScholorshipApproved">{{$claimForScholorship['approved']}}</h2>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card card-coin">
                <div class="card-body">
                    <!-- <div class="rotate">
                        <i class="fa fa-graduation-cap fa-4x"></i>
                    </div> -->
                    <h6 class="text-uppercase cardHeading">Claim form Rejected</h6>
                    <h2 class="my-2 font-w600 font-weight-bold" id="claimForScholorshipRejected">{{$claimForScholorship['rejected']}}</h2>
                </div>
            </div>
        </div>
    </div>

    


    {{-- <div class="row">
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content ">
                <i class="fa fa-database icon-gradient bg-ripe-malin"> </i>
                <div class="widget-content-wrapper">
                    <div class="widget-content-left">
                        <div class="widget-heading">Total Users</div>
                    </div>
                    <div class="widget-content-right text-success">
                        <div class="widget-numbers"><span>{{$totalUsers - 1}}</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content ">
                <div class="widget-content-wrapper">
                    <div class="widget-content-left">
                        <div class="widget-heading">Block Users</div>
                    </div>
                    <div class="widget-content-right text-danger">
                        <div class="widget-numbers"><span>{{$blockUsers}}</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content ">
                <div class="widget-content-wrapper">
                    <div class="widget-content-left">
                        <div class="widget-heading">Total Students</div>
                    </div>
                    <div class="widget-content-right text-info">
                        <div class="widget-numbers"><span>{{$students}}</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content ">
                <div class="widget-content-wrapper">
                    <div class="widget-content-left">
                        <div class="widget-heading">Applied Scholarships</div>
                    </div>
                    <div class="widget-content-right text-warning">
                        <div class="widget-numbers"><span>{{$appliedScholarships}}</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content ">
                <div class="widget-content-wrapper ">
                    <div class="widget-content-left">
                        <div class="widget-heading">Claimed Scholarships</div>
                    </div>
                    <div class="widget-content-right text-primary">
                        <div class="widget-numbers "><span>{{$claimedScholarships}}</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    {{-- <main>
        <div class="container-fluid site-width">
            <!-- START: Card Data-->
            <div class="row">
                <div class="col-12 mt-3">
                    <div class="card">
                        <div class="card-header  justify-content-between align-items-center">
                            <h4 class="card-title">Dashboard</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-sm-4 mt-5 mb-2">
                                    <div class="card card-coin">
                                        <div class="card-body">
                                            <div class="mb-3 currency-icon" width="80" height="80" style="background: #00ADA3;"><i class="far fa-user fa-2x fa-fw cstm-icon"></i></div>
                                            <h2 class="my-2 font-w600 font-weight-bold">{{$totalUsers - 1}}</h2>
                                            <h3 class="text-dark">Total Users</h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4 mt-5 mb-2">
                                    <div class="card card-coin">
                                        <div class="card-body">
                                            <div class="mb-3 currency-icon" width="80" height="80" style="background: #00ADA3;"><i class="fa fa-user-alt-slash fa-2x fa-fw cstm-icon"></i></div>
                                            <h2 class="my-2 font-w600 font-weight-bold">{{$blockUsers}}</h2>
                                            <h3 class="text-dark">Block Users</h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4 mt-5 mb-2">
                                    <div class="card card-coin">
                                        <div class="card-body">
                                            <div class="mb-3 currency-icon" width="80" height="80" style="background: #00ADA3;"><i class="far fa-user fa-2x fa-fw cstm-icon"></i></div>
                                            <h2 class="my-2 font-w600 font-weight-bold">{{$students}}</h2>
                                            <h3 class="text-dark">Total Students</h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4 mt-5 mb-2">
                                    <div class="card card-coin">
                                        <div class="card-body">
                                            <div class="mb-3 currency-icon" width="80" height="80" style="background: #00ADA3;"><i class="fas fa-graduation-cap fa-2x fa-fw cstm-icon"></i></div>
                                            <h2 class="my-2 font-w600 font-weight-bold">{{$appliedScholarships}}</h2>
                                            <h3 class="text-dark">Applied Scholarships</h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4 mt-5 mb-2">
                                    <div class="card card-coin">
                                        <div class="card-body">
                                            <div class="mb-3 currency-icon" width="80" height="80" style="background: #00ADA3;"><i class="fas fa-graduation-cap fa-2x fa-fw cstm-icon"></i></div>
                                            <h2 class="my-2 font-w600 font-weight-bold">{{$claimedScholarships}}</h2>
                                            <h3 class="text-dark">Claimed Scholarships</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            
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
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
            
    <script>
        $(function() {
            $('#form-daterange-picker').daterangepicker({
                opens: 'right',

                showDropdowns: true,
                autoUpdateInput: false,
                locale: {
                    format: 'YYYY-MM-DD',
                    separator: ' - ',
                    applyLabel: 'Apply',
                    cancelLabel: 'Cancel',
                    customRangeLabel: 'Custom',
                    daysOfWeek: moment.weekdaysMin(),
                    monthNames: moment.monthsShort(),
                    firstDay: moment.localeData().firstDayOfWeek()
                }
            }, function(start, end, label) {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': '{{csrf_token()}}'
                    }
                });

                // Make AJAX POST request
                $.ajax({
                    url: '{{ url("/admin/forms-filter") }}',
                    type: 'POST',
                    data: {
                        start: start.format('YYYY-MM-DD'),
                        end: end.format('YYYY-MM-DD')
                    },
                    success: function(response){
                        // Handle success response
                        console.log('Response:', response);
                        $('#application-form-submitted').html(response?.data?.applyScholarShip)
                        $('#claim-form-submitted').html(response?.data?.claimScholarShip)
                        $('#totalUsers').html(response?.data?.totalUsers)
                        $('#blockUsers').html(response?.data?.totalStudents)
                        $('#totalStudents').html(response?.data?.totalBlockUsers)

                        $('#applyForScholorshipAll').html(response?.data?.applyForScholorship?.all)
                        $('#applyForScholorshipApproved').html(response?.data?.applyForScholorship?.approved)
                        $('#applyForScholorshipRejected').html(response?.data?.applyForScholorship?.rejected)
                        
                        $('#claimForScholorshipAll').html(response?.data?.claimForScholorship?.all)
                        $('#claimForScholorshipApproved').html(response?.data?.claimForScholorship?.approved)
                        $('#claimForScholorshipRejected').html(response?.data?.claimForScholorship?.pending)
                    },
                    error: function(xhr, status, error){
                        // Handle error
                        console.error('Error:', error);
                    }
                });
                console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
            });
        });
    </script>
@endpush
