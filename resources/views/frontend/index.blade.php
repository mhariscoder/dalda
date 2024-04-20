@extends('frontend.layouts.master')

@push('styles')
    <link rel="stylesheet" href="/css/dashboard.css">
@endpush

@section('content')

<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
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
                    <i class="fa fa-user fa-4x" style="color: #2B8540"></i>
                </div>
                <h6 class="text-uppercase">Approved Scholarships</h6>
                <h1 class="display-4" style="color: #2B8540">{{$appliedApprovedScholarships}}</h1>
            </div>
        </div>
    </div>
    <div class="col py-2">
        <div class="card bg-white h-100">
            <div class="card-body bg-white">
                <div class="rotate">
                    <i class="fa fa-user-lock fa-4x"></i>
                </div>
                <h6 class="text-uppercase">Rejected Scholarships</h6>
                <h1 class="display-4">{{$appliedRejectedScholarships}}</h1>
            </div>
        </div>
    </div>
    <div class="col py-2">
        <div class="card bg-white h-100">
            <div class="card-body bg-white">
                <div class="rotate">
                    <i class="fa fa-user-graduate fa-4x" style="color: #2B8540"></i>
                </div>
                <h6 class="text-uppercase">Approved Claimed Scholarships</h6>
                <h1 class="display-4" style="color: #2B8540">{{$claimedApprovedScholarships}}</h1>
            </div>
        </div>
    </div>

<div class="col py-2">
    <div class="card bg-white h-100">
        <div class="card-body bg-white">
            <div class="rotate">
                <i class="fa fa-graduation-cap fa-4x"></i>
            </div>
            <h6 class="text-uppercase">Rejected Claimed Scholarships</h6>
            <h1 class="display-4">{{$claimedRejectedScholarships}}</h1>
        </div>
    </div>
</div>
</div>
<div class="row">

</div>
    {{-- <main>
        <div class="container-fluid site-width">
        @include('partials.announcement')
        <!-- START: Card Data-->
            <div class="row">
                <div class="col-12 mt-3">
                    <div class="card">
                        <div class="card-header  justify-content-between align-items-center">
                            <h4 class="card-title">Dashboard</h4>
                        </div>
                        <div class="card-body">
                            @if(session()->has('success'))
                                <div class="alert alert-success">
                                    <strong>{{session()->get('success')}}</strong>
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-12 col-sm-4 mt-5 mb-2">
                                    <div class="card card-coin">
                                        <div class="card-body text-center">
                                            <div class="mb-3 currency-icon" width="80" height="80"
                                                 style="background: #00ADA3;"><i
                                                        class="fas fa-graduation-cap fa-2x fa-fw cstm-icon"></i></div>
                                            <h2 class="my-2 font-w600 font-weight-bold">{{$appliedApprovedScholarships}}</h2>
                                            <h3 class="text-dark">Approved <br/> Scholarships</h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4 mt-5 mb-2">
                                    <div class="card card-coin">
                                        <div class="card-body text-center">
                                            <div class="mb-3 currency-icon" width="80" height="80"
                                                 style="background: #00ADA3;"><i
                                                        class="fas fa-graduation-cap fa-2x fa-fw cstm-icon"></i></div>
                                            <h2 class="my-2 font-w600 font-weight-bold">{{$appliedRejectedScholarships}}</h2>
                                            <h3 class="text-dark">Rejected <br/> Scholarships</h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4 mt-5 mb-2">
                                    <div class="card card-coin">
                                        <div class="card-body text-center">
                                            <div class="mb-3 currency-icon" width="80" height="80"
                                                 style="background: #00ADA3;"><i
                                                        class="fas fa-graduation-cap fa-2x fa-fw cstm-icon"></i></div>
                                            <h2 class="my-2 font-w600 font-weight-bold">{{$claimedApprovedScholarships}}</h2>
                                            <h3 class="text-dark">Approved Claimed <br/> Scholarships</h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4 mt-5 mb-2">
                                    <div class="card card-coin">
                                        <div class="card-body text-center">
                                            <div class="mb-3 currency-icon" width="80" height="80"
                                                 style="background: #00ADA3;"><i
                                                        class="fas fa-graduation-cap fa-2x fa-fw cstm-icon"></i></div>
                                            <h2 class="my-2 font-w600 font-weight-bold">{{$claimedRejectedScholarships}}</h2>
                                            <h3 class="text-dark">Rejected Claimed <br/> Scholarships</h3>
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
