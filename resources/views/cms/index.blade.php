@extends('cms.layouts.master')

@push('styles')
    <link rel="stylesheet" href="/css/dashboard.css">
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
    <div class="col py-2">
        <div class="card bg-white h-100">
            <div class="card-body bg-white">
                <div class="rotate">
                    <i class="fa fa-user fa-4x" ></i>
                </div>
                <h6 class="text-uppercase">Total Users</h6>
                <h1 class="display-4">{{$totalUsers - 1}}</h1>
            </div>
        </div>
    </div>
    <div class="col py-2">
        <div class="card bg-white h-100">
            <div class="card-body bg-white">
                <div class="rotate">
                    <i class="fa fa-user-lock fa-4x"></i>
                </div>
                <h6 class="text-uppercase">Block Users</h6>
                <h1 class="display-4">{{$blockUsers}}</h1>
            </div>
        </div>
    </div>
    <div class="col py-2">
        <div class="card bg-white h-100">
            <div class="card-body bg-white">
                <div class="rotate">
                    <i class="fa fa-user-graduate fa-4x"></i>
                </div>
                <h6 class="text-uppercase">Total Students</h6>
                <h1 class="display-4">{{$students}}</h1>
            </div>
        </div>
    </div>

<div class="col py-2">
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
</div>
</div>
<div class="row">

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
                                        <div class="card-body text-center">
                                            <div class="mb-3 currency-icon" width="80" height="80" style="background: #00ADA3;"><i class="far fa-user fa-2x fa-fw cstm-icon"></i></div>
                                            <h2 class="my-2 font-w600 font-weight-bold">{{$totalUsers - 1}}</h2>
                                            <h3 class="text-dark">Total Users</h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4 mt-5 mb-2">
                                    <div class="card card-coin">
                                        <div class="card-body text-center">
                                            <div class="mb-3 currency-icon" width="80" height="80" style="background: #00ADA3;"><i class="fa fa-user-alt-slash fa-2x fa-fw cstm-icon"></i></div>
                                            <h2 class="my-2 font-w600 font-weight-bold">{{$blockUsers}}</h2>
                                            <h3 class="text-dark">Block Users</h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4 mt-5 mb-2">
                                    <div class="card card-coin">
                                        <div class="card-body text-center">
                                            <div class="mb-3 currency-icon" width="80" height="80" style="background: #00ADA3;"><i class="far fa-user fa-2x fa-fw cstm-icon"></i></div>
                                            <h2 class="my-2 font-w600 font-weight-bold">{{$students}}</h2>
                                            <h3 class="text-dark">Total Students</h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4 mt-5 mb-2">
                                    <div class="card card-coin">
                                        <div class="card-body text-center">
                                            <div class="mb-3 currency-icon" width="80" height="80" style="background: #00ADA3;"><i class="fas fa-graduation-cap fa-2x fa-fw cstm-icon"></i></div>
                                            <h2 class="my-2 font-w600 font-weight-bold">{{$appliedScholarships}}</h2>
                                            <h3 class="text-dark">Applied Scholarships</h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4 mt-5 mb-2">
                                    <div class="card card-coin">
                                        <div class="card-body text-center">
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
