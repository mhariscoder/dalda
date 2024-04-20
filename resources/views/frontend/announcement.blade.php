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
                    <i class="metismenu-icon announcement" style="margin: 0">
                        <svg id="Group_958" data-name="Group 958" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" width="34.515" height="21.554"
                            viewBox="0 0 34.515 21.554">
                            <defs>
                                <clipPath id="clip-path">
                                    <rect id="Rectangle_156" data-name="Rectangle 156" width="34.515"
                                        height="21.554" fill="#fff" stroke="#fff" stroke-width="0.5" />
                                </clipPath>
                            </defs>
                            <g id="Group_957" data-name="Group 957" clip-path="url(#clip-path)">
                                <path  fill="#2b8540 " class="cls-3" id="Path_1671" data-name="Path 1671"
                                    d="M7.2,4.447q1.618,0,3.237,0A.72.72,0,0,0,10.7,4.4L22.067.091a1.121,1.121,0,0,1,1.584,1.092c0,1.533,0,3.067,0,4.6a.288.288,0,0,0,.17.291c.643.363,1.281.737,1.919,1.11A1.251,1.251,0,0,1,26.4,8.329q0,.772,0,1.543a1.238,1.238,0,0,1-.678,1.15c-.632.352-1.265.7-1.9,1.046a.28.28,0,0,0-.173.288c.006,1.408,0,2.817,0,4.225a1.111,1.111,0,0,1-1,1.15,1.17,1.17,0,0,1-.558-.081l-6.573-2.38L10.339,13.4a.749.749,0,0,0-.263-.048c-.474,0-.949,0-1.423,0-.212,0-.212,0-.212.206q0,2.907,0,5.814a2.089,2.089,0,0,1-1.09,1.919,1.943,1.943,0,0,1-.957.263,3.024,3.024,0,0,1-1.081-.112,2.105,2.105,0,0,1-1.419-1.987q0-2.967,0-5.933c0-.127-.025-.174-.166-.19A3.992,3.992,0,0,1,.147,10.142,5.152,5.152,0,0,1,.425,6.809a3.96,3.96,0,0,1,3.66-2.356c1.038-.031,2.078-.006,3.116-.006m13.05,4.439q0-3.371,0-6.742c0-.175,0-.175-.157-.116Q15.58,3.739,11.065,5.447a.21.21,0,0,0-.16.238q.006,3.281,0,6.562a.207.207,0,0,0,.165.233q4.506,1.625,9.009,3.259c.173.063.174.062.174-.126q0-3.364,0-6.727M9.758,8.894c0-1.054,0-2.108,0-3.161,0-.133-.03-.179-.173-.178-1.823,0-3.646,0-5.469,0A2.965,2.965,0,0,0,1.3,7.609a4.644,4.644,0,0,0-.109,2.049,2.922,2.922,0,0,0,2.972,2.58c1.808,0,3.616,0,5.424,0,.15,0,.179-.049.178-.187-.005-1.054,0-2.108,0-3.161M22.54,8.877V6.69q0-2.712,0-5.424c0-.132-.022-.165-.155-.11q-.435.18-.882.334a.188.188,0,0,0-.148.215c.005,1.039,0,2.078,0,3.116q0,5.6,0,11.207c0,.13.032.194.161.235.28.089.555.2.831.3.19.069.19.068.19-.132q0-3.776,0-7.551M5,16.5q0,1.461,0,2.922a.992.992,0,0,0,.874,1.014,2.71,2.71,0,0,0,.4.012A1,1,0,0,0,7.326,19.4c0-1.948,0-3.9,0-5.843,0-.121-.028-.163-.157-.161q-1,.01-2.008,0c-.13,0-.169.032-.168.166C5,14.539,5,15.517,5,16.5M25.292,9.1c0-.245,0-.49,0-.734a.232.232,0,0,0-.131-.23q-.7-.4-1.386-.8c-.093-.055-.127-.05-.127.068q0,1.678,0,3.356c0,.108.021.133.125.075q.692-.389,1.39-.767a.219.219,0,0,0,.129-.215c0-.25,0-.5,0-.749"
                                    transform="translate(0 0)" fill="#fff" stroke="#fff" stroke-width="0.5" />
                                <path fill="#2b8540 " class="cls-3" id="Path_1672" data-name="Path 1672"
                                    d="M333.632,94.117c.7,0,1.4,0,2.1,0a.549.549,0,0,1,.526.756.569.569,0,0,1-.573.352H332.1c-.185,0-.369,0-.554,0a.56.56,0,0,1-.581-.557.549.549,0,0,1,.582-.551c.694,0,1.388,0,2.082,0"
                                    transform="translate(-301.781 -85.815)" fill="#fff" stroke="#fff"
                                    stroke-width="0.5" />
                                <path fill="#2b8540 " class="cls-3" id="Path_1673" data-name="Path 1673"
                                    d="M314.9,130.024a.521.521,0,0,1-.318.486.53.53,0,0,1-.6-.087c-.131-.115-.25-.244-.374-.367q-.847-.848-1.694-1.7a.559.559,0,0,1-.118-.672.551.551,0,0,1,.593-.284.541.541,0,0,1,.3.158l2.045,2.044a.543.543,0,0,1,.167.419"
                                    transform="translate(-284.243 -116.159)" fill="#fff" stroke="#fff"
                                    stroke-width="0.5" />
                                <path fill="#2b8540 " class="cls-3" id="Path_1674" data-name="Path 1674"
                                    d="M312.289,36.976a.535.535,0,0,1-.505-.335.541.541,0,0,1,.127-.62q.719-.722,1.439-1.442c.194-.194.387-.39.583-.582a.56.56,0,0,1,.816-.027.568.568,0,0,1-.034.816q-1,1-2,2a.56.56,0,0,1-.425.186"
                                    transform="translate(-284.246 -30.825)" fill="#fff" stroke="#fff"
                                    stroke-width="0.5" />
                            </g>
                        </svg>

                    </i>
                </div>
                <div>
                    Announcements
                </div>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-lg-12">
            <div class="main-card mb-3 card">
                <div class="card-header">
                    <h5 class="card-title mt-3">Announcements</h5>
                </div>
                <div class="card-body pt-0">
                    <div class="accordion-wrapper mb-3 border-0" id="accordionAnnouncement">
                        @foreach ($announcements as $key => $val)
                            <div class="card-title mt-3">
                                {{ \Carbon\Carbon::parse($val->created_at)->isoFormat('dddd MMMM Do YYYY') }}</div>
                            <div class="card border">
                                <div id="announcement{{ $val->id . ucfirst($val->type) }}" class="card-header border-0">
                                    <button type="button" data-toggle="collapse"
                                        data-target="#announcement{{ $val->id }}" aria-expanded="true"
                                        aria-controls="announcement{{ $val->id }}"
                                        class="text-left btn btn-light btn-block">
                                        <h2 class="m-0 p-0">{{ Str::words($val->title, 10) }}</h2>
                                    </button>
                                </div>
                                <div data-parent="#accordionAnnouncement" id="announcement{{ $val->id }}"
                                    aria-labelledby="announcement{{ $val->id . ucfirst($val->type) }}" class="collapse">
                                    <div class="card-body pt-0">{{ $val->description }}.
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @if ($announcements->hasMorePages())
                            <button id="showmore" type="button" class="btn btn-light shadow-sm mt-2"
                                onclick="loadMoreData()">Show
                                More
                            </button>
                        @endif
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
                                    <h4 class="card-title">Announcements</h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="accordion border-0" id="accordionAnnouncement">
                                @foreach ($announcements as $key => $val)
                                    <div class="text-dark py-2">{{ \Carbon\Carbon::parse($val->created_at)->isoFormat('dddd MMMM Do YYYY') }}</div>
                                    <div class="card border-bottom">
                                        <div class="card-header border-0"
                                             id="announcement{{$val->id.ucfirst($val->type)}}">
                                            <h2 class="mb-0">
                                                <button class="btn btn-light btn-block text-left shadow-none"
                                                        type="button"
                                                        data-toggle="collapse" data-target="#announcement{{$val->id}}"
                                                        aria-expanded="true" aria-controls="announcement{{$val->id}}">
                                                    {{ Str::words($val->title,10) }}
                                                </button>
                                            </h2>
                                        </div>

                                        <div id="announcement{{$val->id}}" class="collapse"
                                             aria-labelledby="announcement{{$val->id.ucfirst($val->type)}}"
                                             data-parent="#accordionAnnouncement">
                                            <div class="card-body">
                                                {{$val->description}}.
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                @if ($announcements->hasMorePages())
                                    <button id="showmore" type="button" class="btn btn-light shadow-sm mt-2"
                                            onclick="loadMoreData()">Show
                                        More
                                    </button>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
                <!-- END: Card DATA-->
            </div>
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
        var page = 1;

        function loadMoreData() {
            page++;
            axios.get('/student/get-more-announcements?page=' + page)
                .then((response) => {
                    if (response.data.length === 0) {
                        $('#showmore').before(
                            "<div class='alert alert-secondary text-center my-1'>Sorry! We don't have more announcements for you :(</div>"
                        );
                        $("#showmore").hide();
                    } else {
                        $("#showmore").before(response.data);
                    }
                })
                .catch((error) => {
                    console.log(error.data.msg);
                });
        }
    </script>
@endpush
