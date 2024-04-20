@extends('frontend.layouts.master')

@push('styles')
    <link rel="stylesheet" href="/assets/vendors/datatable/css/dataTables.bootstrap4.min.css">
@endpush

@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="metismenu-icon" style="margin: 0">

                        <svg xmlns="http://www.w3.org/2000/svg" width="22.148" height="31.05"
                            viewBox="0 0 22.148 31.05">
                            <g id="clipboard-notes" transform="translate(-6.926 -2.475)">
                                <path fill="#2b8540 " class="cls-3" id="Path_1662" data-name="Path 1662"
                                    d="M29.074,6.214h-.007c0-.018,0-.034,0-.052a1.888,1.888,0,0,0-1.887-1.888c-.014,0-.027,0-.042,0H21.9V3.052a.574.574,0,0,0-.573-.574v0H14.688v0h-.015a.574.574,0,0,0-.574.574V4.278H8.813A1.889,1.889,0,0,0,6.926,6.164c0,.017.005.032.005.049H6.926V31.619h0v.01a1.886,1.886,0,0,0,1.887,1.886c.028,0,.054-.007.082-.008v.008h18.18c.035,0,.069.01.1.01a1.886,1.886,0,0,0,1.886-1.886c0-.007,0-.013,0-.02h.01V6.214ZM27.5,31.947H8.5V5.851h3.8v3.1c0,.012,0,.023,0,.035a.654.654,0,0,0,.653.653h.005v0h10.09a.653.653,0,0,0,.653-.653c0-.005,0-.01,0-.016V5.851h3.8V31.946Z"
                                    fill="#fff" />
                                <path fill="#2b8540 " class="cls-3" id="Path_1663" data-name="Path 1663"
                                    d="M14.094,14.8a.431.431,0,0,0-.431-.43c-.011,0-.021.005-.032.006v-.006h-.9a.432.432,0,0,0-.432.431v.935a.431.431,0,0,0,.432.429h.9v-.006c.011,0,.02.006.031.006a.431.431,0,0,0,.432-.429V14.8h0Z"
                                    fill="#fff" />
                                <path fill="#2b8540 " class="cls-3" id="Path_1664" data-name="Path 1664"
                                    d="M23.7,14.8a.431.431,0,0,0-.431-.43H16.321a.432.432,0,0,0-.432.431v.935a.431.431,0,0,0,.432.429h6.946a.431.431,0,0,0,.432-.429V14.8h0Z"
                                    fill="#fff" />
                                <path fill="#2b8540 " class="cls-3" id="Path_1665" data-name="Path 1665"
                                    d="M14.094,18.394a.431.431,0,0,0-.431-.43c-.011,0-.021,0-.032.006v-.006h-.9a.432.432,0,0,0-.432.431v.935a.431.431,0,0,0,.432.429h.9v-.006c.011,0,.02.006.031.006a.431.431,0,0,0,.432-.429v-.935h0Z"
                                    fill="#fff" />
                                <path fill="#2b8540 " class="cls-3" id="Path_1666" data-name="Path 1666"
                                    d="M23.7,18.394a.431.431,0,0,0-.431-.43H16.321a.432.432,0,0,0-.432.431v.935a.431.431,0,0,0,.432.429h6.946a.431.431,0,0,0,.432-.429v-.935h0Z"
                                    fill="#fff" />
                                <path fill="#2b8540 " class="cls-3" id="Path_1667" data-name="Path 1667"
                                    d="M14.094,21.985a.431.431,0,0,0-.431-.43c-.011,0-.021,0-.032.006v-.006h-.9a.432.432,0,0,0-.432.431v.935a.431.431,0,0,0,.432.429h.9v-.006c.011,0,.02.006.031.006a.431.431,0,0,0,.432-.429v-.935h0Z"
                                    fill="#fff" />
                                <path fill="#2b8540 " class="cls-3" id="Path_1668" data-name="Path 1668"
                                    d="M23.7,21.985a.431.431,0,0,0-.431-.43H16.321a.432.432,0,0,0-.432.431v.935a.431.431,0,0,0,.432.429h6.946a.431.431,0,0,0,.432-.429v-.935h0Z"
                                    fill="#fff" />
                            </g>
                        </svg>
                    </i>
                </div>
                <div>
                    Result
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">
                        <div class="page-title-icon">
                            {{-- <i class="metismenu-icon" style="margin-right: 5px">

                                <svg xmlns="http://www.w3.org/2000/svg" width="22.148" height="31.05"
                                    viewBox="0 0 22.148 31.05">
                                    <g id="clipboard-notes" transform="translate(-6.926 -2.475)">
                                        <path class="cls-3" id="Path_1662" data-name="Path 1662"
                                            d="M29.074,6.214h-.007c0-.018,0-.034,0-.052a1.888,1.888,0,0,0-1.887-1.888c-.014,0-.027,0-.042,0H21.9V3.052a.574.574,0,0,0-.573-.574v0H14.688v0h-.015a.574.574,0,0,0-.574.574V4.278H8.813A1.889,1.889,0,0,0,6.926,6.164c0,.017.005.032.005.049H6.926V31.619h0v.01a1.886,1.886,0,0,0,1.887,1.886c.028,0,.054-.007.082-.008v.008h18.18c.035,0,.069.01.1.01a1.886,1.886,0,0,0,1.886-1.886c0-.007,0-.013,0-.02h.01V6.214ZM27.5,31.947H8.5V5.851h3.8v3.1c0,.012,0,.023,0,.035a.654.654,0,0,0,.653.653h.005v0h10.09a.653.653,0,0,0,.653-.653c0-.005,0-.01,0-.016V5.851h3.8V31.946Z"
                                            fill="#2B8540" />
                                        <path class="cls-3" id="Path_1663" data-name="Path 1663"
                                            d="M14.094,14.8a.431.431,0,0,0-.431-.43c-.011,0-.021.005-.032.006v-.006h-.9a.432.432,0,0,0-.432.431v.935a.431.431,0,0,0,.432.429h.9v-.006c.011,0,.02.006.031.006a.431.431,0,0,0,.432-.429V14.8h0Z"
                                            fill="#2B8540" />
                                        <path class="cls-3" id="Path_1664" data-name="Path 1664"
                                            d="M23.7,14.8a.431.431,0,0,0-.431-.43H16.321a.432.432,0,0,0-.432.431v.935a.431.431,0,0,0,.432.429h6.946a.431.431,0,0,0,.432-.429V14.8h0Z"
                                            fill="#2B8540" />
                                        <path class="cls-3" id="Path_1665" data-name="Path 1665"
                                            d="M14.094,18.394a.431.431,0,0,0-.431-.43c-.011,0-.021,0-.032.006v-.006h-.9a.432.432,0,0,0-.432.431v.935a.431.431,0,0,0,.432.429h.9v-.006c.011,0,.02.006.031.006a.431.431,0,0,0,.432-.429v-.935h0Z"
                                            fill="#2B8540" />
                                        <path class="cls-3" id="Path_1666" data-name="Path 1666"
                                            d="M23.7,18.394a.431.431,0,0,0-.431-.43H16.321a.432.432,0,0,0-.432.431v.935a.431.431,0,0,0,.432.429h6.946a.431.431,0,0,0,.432-.429v-.935h0Z"
                                            fill="#2B8540" />
                                        <path class="cls-3" id="Path_1667" data-name="Path 1667"
                                            d="M14.094,21.985a.431.431,0,0,0-.431-.43c-.011,0-.021,0-.032.006v-.006h-.9a.432.432,0,0,0-.432.431v.935a.431.431,0,0,0,.432.429h.9v-.006c.011,0,.02.006.031.006a.431.431,0,0,0,.432-.429v-.935h0Z"
                                            fill="#2B8540" />
                                        <path class="cls-3" id="Path_1668" data-name="Path 1668"
                                            d="M23.7,21.985a.431.431,0,0,0-.431-.43H16.321a.432.432,0,0,0-.432.431v.935a.431.431,0,0,0,.432.429h6.946a.431.431,0,0,0,.432-.429v-.935h0Z"
                                            fill="#2B8540" />
                                    </g>
                                </svg>
                            </i>  --}}
                             Your Result
                        </div>
                       </h5>
                    <div class="table-responsive">
                        <table class="mb-0 display table table-striped table-bordered the-table">
                            <thead>
                                <tr>
                                    <th style="max-width: 20px;">ID#</th>
                                    <th style="max-width: 400px;">Exam Name</th>
                                    <th>Marks</th>
                                    <th>Percentage</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($results) > 0)
                                    @foreach ($results as $key => $exam)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $exam->getExam->title ?? '' }}</td>
                                            <td>{{ $exam->marks }}</td>
                                            <td>{{ $exam->percentage . ' %' }}</td>
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
                                    <h4 class="card-title">Your Result</h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped the-table">
                                    <thead>
                                    <tr>
                                        <th style="max-width: 20px;">ID#</th>
                                        <th style="max-width: 400px;">Exam Name</th>
                                        <th>Marks</th>
                                        <th>Percentage</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if (count($results) > 0)
                                        @foreach ($results as $key => $exam)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $exam->getExam->title ?? '' }}</td>
                                                <td>{{ $exam->marks }}</td>
                                                <td>{{ $exam->percentage.' %' }}</td>
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
