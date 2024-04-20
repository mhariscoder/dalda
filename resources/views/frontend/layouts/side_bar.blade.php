<div class="app-sidebar sidebar-shadow bg-success sidebar-text-light">
    {{-- <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div> --}}
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>
    <div class="scrollbar-sidebar scrollbar" id="style-7">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">Menu</li>
                <li>
                    <a href="/admin/dashboard" class="{{ getActiveClass(request()->segment(2), ['dashboard']) }}">
                        <i class="metismenu-icon"><svg xmlns="http://www.w3.org/2000/svg" width="27" height="27"
                                viewBox="0 0 27 27">
                                <g id="Icon_material-dashboard" data-name="Icon material-dashboard"
                                    transform="translate(-4.5 -4.5)" fill="none">
                                    <path d="M4.5,19.5h12V4.5H4.5Zm0,12h12v-9H4.5Zm15,0h12v-15h-12Zm0-27v9h12v-9Z"
                                        stroke="none" />
                                    <path class="cls-3"
                                        d="M 29.5 29.5 L 29.5 18.5 L 21.5 18.5 L 21.5 29.5 L 29.5 29.5 M 14.5 29.5 L 14.5 24.5 L 6.5 24.5 L 6.5 29.5 L 14.5 29.5 M 14.5 17.5 L 14.5 6.5 L 6.5 6.5 L 6.5 17.5 L 14.5 17.5 M 29.5 11.5 L 29.5 6.5 L 21.5 6.5 L 21.5 11.5 L 29.5 11.5 M 31.5 31.5 L 19.5 31.5 L 19.5 16.5 L 31.5 16.5 L 31.5 31.5 Z M 16.5 31.5 L 4.5 31.5 L 4.5 22.5 L 16.5 22.5 L 16.5 31.5 Z M 16.5 19.5 L 4.5 19.5 L 4.5 4.5 L 16.5 4.5 L 16.5 19.5 Z M 31.5 13.5 L 19.5 13.5 L 19.5 4.5 L 31.5 4.5 L 31.5 13.5 Z"
                                        stroke="none" fill="#fff" />
                                </g>
                            </svg></i> Dashboard</a>
                </li>
                <li class="{{ getActiveClass(request()->segment(2), ['course']) }}">
                    <a href="/student/course-offering" class="{{ getActiveClass(request()->segment(2), ['course']) }}">
                        <i class="metismenu-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22.5" height="30.25"
                                viewBox="0 0 22.5 30.25">
                                <path class="cls-3" id="course"
                                    d="M27,32.5H9a2.209,2.209,0,0,1-2.25-2.161V4.411A2.209,2.209,0,0,1,9,2.25H27a2.209,2.209,0,0,1,2.25,2.161V22.364l-5.625-2.7L18,22.364V4.411H9V30.339H27V26.018h2.25v4.321A2.21,2.21,0,0,1,27,32.5ZM23.625,17.247,27,18.868V4.411H20.25V18.868Z"
                                    transform="translate(-6.75 -2.25)" fill="#fff" />
                            </svg>
                        </i>
                        Offered Courses
                    </a>
                </li>
                @can('student-apply-scholarship-list')
                    <li class="{{ getActiveClass(request()->segment(2), ['scholarship', 'apply', 'claim']) }}">
                        <a class="removePointerEvent {{ getActiveClass(request()->segment(2), ['scholarship', 'apply', 'claim']) }}"
                            href="javascript:void(0);">
                            <i class="metismenu-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="28.326" height="25.568"
                                    viewBox="0 0 28.326 25.568">
                                    <g id="education" transform="translate(-2.25 -3.233)">
                                        <path class="cls-3" id="Path_1660" data-name="Path 1660"
                                            d="M24.061,24.057,16.98,28.041,9.9,24.057V19.849L7.875,18.725v6.516l9.1,5.121,9.1-5.121V18.724l-2.023,1.124v4.208Z"
                                            transform="translate(-0.567 -1.561)" fill="#fff" />
                                        <path class="cls-3" id="Path_1661" data-name="Path 1661"
                                            d="M16.413,3.233,2.25,10.576V12.33L16.413,20.2l12.14-6.744v5.588h2.023V10.576Zm10.116,9.031-2.023,1.124-8.093,4.5-8.093-4.5L6.3,12.264l-1.4-.779L16.413,5.512l11.518,5.973Z"
                                            transform="translate(0)" fill="#fff" />
                                    </g>
                                </svg>
                            </i>
                            Scholarship Program
                            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                        </a>
                        <ul>
                            <li><a class="text-nowrap {{ getActiveClass(request()->segment(2), ['apply']) }}"
                                    href="/student/apply-for-scholarship">
                                    Apply
                                    For Scholarship</a></li>
                            @can('student-claim-scholarship-list')
                                <li><a class="text-nowrap {{ getActiveClass(request()->segment(2), ['claim']) }}"
                                        href="/student/claim-for-scholarship">
                                        Claim For Scholarship</a></li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                <li>
                    <a href="/student/announcements"
                        class="{{ getActiveClass(request()->segment(2), ['announcements']) }}">
                        <i class="metismenu-icon">
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
                                    <path class="cls-3" id="Path_1671" data-name="Path 1671"
                                        d="M7.2,4.447q1.618,0,3.237,0A.72.72,0,0,0,10.7,4.4L22.067.091a1.121,1.121,0,0,1,1.584,1.092c0,1.533,0,3.067,0,4.6a.288.288,0,0,0,.17.291c.643.363,1.281.737,1.919,1.11A1.251,1.251,0,0,1,26.4,8.329q0,.772,0,1.543a1.238,1.238,0,0,1-.678,1.15c-.632.352-1.265.7-1.9,1.046a.28.28,0,0,0-.173.288c.006,1.408,0,2.817,0,4.225a1.111,1.111,0,0,1-1,1.15,1.17,1.17,0,0,1-.558-.081l-6.573-2.38L10.339,13.4a.749.749,0,0,0-.263-.048c-.474,0-.949,0-1.423,0-.212,0-.212,0-.212.206q0,2.907,0,5.814a2.089,2.089,0,0,1-1.09,1.919,1.943,1.943,0,0,1-.957.263,3.024,3.024,0,0,1-1.081-.112,2.105,2.105,0,0,1-1.419-1.987q0-2.967,0-5.933c0-.127-.025-.174-.166-.19A3.992,3.992,0,0,1,.147,10.142,5.152,5.152,0,0,1,.425,6.809a3.96,3.96,0,0,1,3.66-2.356c1.038-.031,2.078-.006,3.116-.006m13.05,4.439q0-3.371,0-6.742c0-.175,0-.175-.157-.116Q15.58,3.739,11.065,5.447a.21.21,0,0,0-.16.238q.006,3.281,0,6.562a.207.207,0,0,0,.165.233q4.506,1.625,9.009,3.259c.173.063.174.062.174-.126q0-3.364,0-6.727M9.758,8.894c0-1.054,0-2.108,0-3.161,0-.133-.03-.179-.173-.178-1.823,0-3.646,0-5.469,0A2.965,2.965,0,0,0,1.3,7.609a4.644,4.644,0,0,0-.109,2.049,2.922,2.922,0,0,0,2.972,2.58c1.808,0,3.616,0,5.424,0,.15,0,.179-.049.178-.187-.005-1.054,0-2.108,0-3.161M22.54,8.877V6.69q0-2.712,0-5.424c0-.132-.022-.165-.155-.11q-.435.18-.882.334a.188.188,0,0,0-.148.215c.005,1.039,0,2.078,0,3.116q0,5.6,0,11.207c0,.13.032.194.161.235.28.089.555.2.831.3.19.069.19.068.19-.132q0-3.776,0-7.551M5,16.5q0,1.461,0,2.922a.992.992,0,0,0,.874,1.014,2.71,2.71,0,0,0,.4.012A1,1,0,0,0,7.326,19.4c0-1.948,0-3.9,0-5.843,0-.121-.028-.163-.157-.161q-1,.01-2.008,0c-.13,0-.169.032-.168.166C5,14.539,5,15.517,5,16.5M25.292,9.1c0-.245,0-.49,0-.734a.232.232,0,0,0-.131-.23q-.7-.4-1.386-.8c-.093-.055-.127-.05-.127.068q0,1.678,0,3.356c0,.108.021.133.125.075q.692-.389,1.39-.767a.219.219,0,0,0,.129-.215c0-.25,0-.5,0-.749"
                                        transform="translate(0 0)" fill="#fff" stroke="#fff" stroke-width="0.5" />
                                    <path class="cls-3" id="Path_1672" data-name="Path 1672"
                                        d="M333.632,94.117c.7,0,1.4,0,2.1,0a.549.549,0,0,1,.526.756.569.569,0,0,1-.573.352H332.1c-.185,0-.369,0-.554,0a.56.56,0,0,1-.581-.557.549.549,0,0,1,.582-.551c.694,0,1.388,0,2.082,0"
                                        transform="translate(-301.781 -85.815)" fill="#fff" stroke="#fff"
                                        stroke-width="0.5" />
                                    <path class="cls-3" id="Path_1673" data-name="Path 1673"
                                        d="M314.9,130.024a.521.521,0,0,1-.318.486.53.53,0,0,1-.6-.087c-.131-.115-.25-.244-.374-.367q-.847-.848-1.694-1.7a.559.559,0,0,1-.118-.672.551.551,0,0,1,.593-.284.541.541,0,0,1,.3.158l2.045,2.044a.543.543,0,0,1,.167.419"
                                        transform="translate(-284.243 -116.159)" fill="#fff" stroke="#fff"
                                        stroke-width="0.5" />
                                    <path class="cls-3" id="Path_1674" data-name="Path 1674"
                                        d="M312.289,36.976a.535.535,0,0,1-.505-.335.541.541,0,0,1,.127-.62q.719-.722,1.439-1.442c.194-.194.387-.39.583-.582a.56.56,0,0,1,.816-.027.568.568,0,0,1-.034.816q-1,1-2,2a.56.56,0,0,1-.425.186"
                                        transform="translate(-284.246 -30.825)" fill="#fff" stroke="#fff"
                                        stroke-width="0.5" />
                                </g>
                            </svg>

                        </i> Announcements</a>
                </li>
                <li>
                    <a href="/student/result" class="{{ getActiveClass(request()->segment(2), ['result']) }}">
                        <i class="metismenu-icon">

                            <svg xmlns="http://www.w3.org/2000/svg" width="22.148" height="31.05"
                                viewBox="0 0 22.148 31.05">
                                <g id="clipboard-notes" transform="translate(-6.926 -2.475)">
                                    <path class="cls-3" id="Path_1662" data-name="Path 1662"
                                        d="M29.074,6.214h-.007c0-.018,0-.034,0-.052a1.888,1.888,0,0,0-1.887-1.888c-.014,0-.027,0-.042,0H21.9V3.052a.574.574,0,0,0-.573-.574v0H14.688v0h-.015a.574.574,0,0,0-.574.574V4.278H8.813A1.889,1.889,0,0,0,6.926,6.164c0,.017.005.032.005.049H6.926V31.619h0v.01a1.886,1.886,0,0,0,1.887,1.886c.028,0,.054-.007.082-.008v.008h18.18c.035,0,.069.01.1.01a1.886,1.886,0,0,0,1.886-1.886c0-.007,0-.013,0-.02h.01V6.214ZM27.5,31.947H8.5V5.851h3.8v3.1c0,.012,0,.023,0,.035a.654.654,0,0,0,.653.653h.005v0h10.09a.653.653,0,0,0,.653-.653c0-.005,0-.01,0-.016V5.851h3.8V31.946Z"
                                        fill="#fff" />
                                    <path class="cls-3" id="Path_1663" data-name="Path 1663"
                                        d="M14.094,14.8a.431.431,0,0,0-.431-.43c-.011,0-.021.005-.032.006v-.006h-.9a.432.432,0,0,0-.432.431v.935a.431.431,0,0,0,.432.429h.9v-.006c.011,0,.02.006.031.006a.431.431,0,0,0,.432-.429V14.8h0Z"
                                        fill="#fff" />
                                    <path class="cls-3" id="Path_1664" data-name="Path 1664"
                                        d="M23.7,14.8a.431.431,0,0,0-.431-.43H16.321a.432.432,0,0,0-.432.431v.935a.431.431,0,0,0,.432.429h6.946a.431.431,0,0,0,.432-.429V14.8h0Z"
                                        fill="#fff" />
                                    <path class="cls-3" id="Path_1665" data-name="Path 1665"
                                        d="M14.094,18.394a.431.431,0,0,0-.431-.43c-.011,0-.021,0-.032.006v-.006h-.9a.432.432,0,0,0-.432.431v.935a.431.431,0,0,0,.432.429h.9v-.006c.011,0,.02.006.031.006a.431.431,0,0,0,.432-.429v-.935h0Z"
                                        fill="#fff" />
                                    <path class="cls-3" id="Path_1666" data-name="Path 1666"
                                        d="M23.7,18.394a.431.431,0,0,0-.431-.43H16.321a.432.432,0,0,0-.432.431v.935a.431.431,0,0,0,.432.429h6.946a.431.431,0,0,0,.432-.429v-.935h0Z"
                                        fill="#fff" />
                                    <path class="cls-3" id="Path_1667" data-name="Path 1667"
                                        d="M14.094,21.985a.431.431,0,0,0-.431-.43c-.011,0-.021,0-.032.006v-.006h-.9a.432.432,0,0,0-.432.431v.935a.431.431,0,0,0,.432.429h.9v-.006c.011,0,.02.006.031.006a.431.431,0,0,0,.432-.429v-.935h0Z"
                                        fill="#fff" />
                                    <path class="cls-3" id="Path_1668" data-name="Path 1668"
                                        d="M23.7,21.985a.431.431,0,0,0-.431-.43H16.321a.432.432,0,0,0-.432.431v.935a.431.431,0,0,0,.432.429h6.946a.431.431,0,0,0,.432-.429v-.935h0Z"
                                        fill="#fff" />
                                </g>
                            </svg>
                        </i> Test Results</a>
                </li>
                <li class="{{ getActiveClass(request()->segment(2), ['upload', 'eligibility', 'test', 'exam']) }}">
                    <a class="removePointerEvent {{ getActiveClass(request()->segment(2), ['upload', 'eligibility', 'test', 'exam']) }}"
                        href="javascript:void(0);">
                        <i class="metismenu-icon">

                            <svg xmlns="http://www.w3.org/2000/svg" width="22.148" height="31.05"
                                viewBox="0 0 22.148 31.05">
                                <g id="clipboard-notes" transform="translate(-6.926 -2.475)">
                                    <path class="cls-3" id="Path_1662" data-name="Path 1662"
                                        d="M29.074,6.214h-.007c0-.018,0-.034,0-.052a1.888,1.888,0,0,0-1.887-1.888c-.014,0-.027,0-.042,0H21.9V3.052a.574.574,0,0,0-.573-.574v0H14.688v0h-.015a.574.574,0,0,0-.574.574V4.278H8.813A1.889,1.889,0,0,0,6.926,6.164c0,.017.005.032.005.049H6.926V31.619h0v.01a1.886,1.886,0,0,0,1.887,1.886c.028,0,.054-.007.082-.008v.008h18.18c.035,0,.069.01.1.01a1.886,1.886,0,0,0,1.886-1.886c0-.007,0-.013,0-.02h.01V6.214ZM27.5,31.947H8.5V5.851h3.8v3.1c0,.012,0,.023,0,.035a.654.654,0,0,0,.653.653h.005v0h10.09a.653.653,0,0,0,.653-.653c0-.005,0-.01,0-.016V5.851h3.8V31.946Z"
                                        fill="#fff" />
                                    <path class="cls-3" id="Path_1663" data-name="Path 1663"
                                        d="M14.094,14.8a.431.431,0,0,0-.431-.43c-.011,0-.021.005-.032.006v-.006h-.9a.432.432,0,0,0-.432.431v.935a.431.431,0,0,0,.432.429h.9v-.006c.011,0,.02.006.031.006a.431.431,0,0,0,.432-.429V14.8h0Z"
                                        fill="#fff" />
                                    <path class="cls-3" id="Path_1664" data-name="Path 1664"
                                        d="M23.7,14.8a.431.431,0,0,0-.431-.43H16.321a.432.432,0,0,0-.432.431v.935a.431.431,0,0,0,.432.429h6.946a.431.431,0,0,0,.432-.429V14.8h0Z"
                                        fill="#fff" />
                                    <path class="cls-3" id="Path_1665" data-name="Path 1665"
                                        d="M14.094,18.394a.431.431,0,0,0-.431-.43c-.011,0-.021,0-.032.006v-.006h-.9a.432.432,0,0,0-.432.431v.935a.431.431,0,0,0,.432.429h.9v-.006c.011,0,.02.006.031.006a.431.431,0,0,0,.432-.429v-.935h0Z"
                                        fill="#fff" />
                                    <path class="cls-3" id="Path_1666" data-name="Path 1666"
                                        d="M23.7,18.394a.431.431,0,0,0-.431-.43H16.321a.432.432,0,0,0-.432.431v.935a.431.431,0,0,0,.432.429h6.946a.431.431,0,0,0,.432-.429v-.935h0Z"
                                        fill="#fff" />
                                    <path class="cls-3" id="Path_1667" data-name="Path 1667"
                                        d="M14.094,21.985a.431.431,0,0,0-.431-.43c-.011,0-.021,0-.032.006v-.006h-.9a.432.432,0,0,0-.432.431v.935a.431.431,0,0,0,.432.429h.9v-.006c.011,0,.02.006.031.006a.431.431,0,0,0,.432-.429v-.935h0Z"
                                        fill="#fff" />
                                    <path class="cls-3" id="Path_1668" data-name="Path 1668"
                                        d="M23.7,21.985a.431.431,0,0,0-.431-.43H16.321a.432.432,0,0,0-.432.431v.935a.431.431,0,0,0,.432.429h6.946a.431.431,0,0,0,.432-.429v-.935h0Z"
                                        fill="#fff" />
                                </g>
                            </svg>

                        </i>
                        Miscellaneous
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li><a class="text-nowrap {{ getActiveClass(request()->segment(2), ['upload']) }}"
                                href="/student/upload-documents">
                                Uploaded Documents</a></li>
                        <li><a class="text-nowrap {{ getActiveClass(request()->segment(2), ['eligibility']) }}"
                                href="/student/eligibility-criteria">
                                Eligibility Criteria</a></li>
                        <li><a class="text-nowrap {{ getActiveClass(request()->segment(2), ['test']) }}"
                                href="/student/test-schedule">
                                Test Schedule</a></li>
                        <li><a class="text-nowrap {{ getActiveClass(request()->segment(2), ['exam']) }}"
                                href="/student/exam">
                                Exam</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>

{{-- <div class="sidebar">
    <div class="site-width">

        <!-- START: Menu-->
        <ul id="side-menu" class="sidebar-menu">
            <li class="{{ getActiveClass(request()->segment(2),['dashboard']) }}">
                <a href="/student/dashboard">
                    <i class="icon-rocket fa-fw"></i> Dashboard</a>
            </li>
            <li class="{{ getActiveClass(request()->segment(2),['course']) }}">
                <a class="text-nowrap" href="/student/course-offering"><i class="fas fa-file fa-fw"></i>
                    Offered Courses</a>
            </li>
            @can('student-apply-scholarship-list')
                <li class="dropdown {{ getActiveClass(request()->segment(2),['scholarship']) }}"><a
                            class="removePointerEvent" href="javascript:void(0);"><i class="fas fa-book-open fa-fw"></i>
                        Scholarship Program</a>
                    <ul>
                        <li><a class="text-nowrap" href="/student/apply-for-scholarship"><i
                                        class="fas fa-book-open fa-fw"></i>
                                Apply
                                For Scholarship</a></li>
                        @can('student-claim-scholarship-list')
                            <li><a class="text-nowrap" href="/student/claim-for-scholarship"><i
                                            class="fas fa-book-open fa-fw"></i>
                                    Claim For Scholarship</a></li>
                        @endcan
                    </ul>
                </li>
            @endcan
            <li class="{{ getActiveClass(request()->segment(2),['announcements']) }}">
                <a class="text-nowrap" href="/student/announcements"><i class="fas fa-bullhorn fa-fw"></i>
                    Announcements</a>
            </li>
            <li class="{{ getActiveClass(request()->segment(2),['result']) }}"><a class="text-nowrap" href="/student/result"><i class="far fa-file-alt fa-fw"></i>
                    Test Results</a></li>
            <li class="dropdown {{ getActiveClass(request()->segment(2),['upload','eligibility','test','exam']) }}">
                <a class="removePointerEvent" href="javascript:void(0);"><i class="fas fa-hourglass"></i> Miscellaneous</a>
                <ul>
                    <li><a class="text-nowrap" href="/student/upload-documents"><i class="fas fa-paste fa-fw"></i>
                            Uploaded Documents</a></li>
                    <li><a class="text-nowrap" href="/student/eligibility-criteria"><i class="fas fa-file fa-fw"></i>
                            Eligibility Criteria</a></li>
                    <li><a class="text-nowrap" href="/student/test-schedule"><i class="fas fa-file fa-fw"></i>
                            Test Schedule</a></li>
                    <li><a class="text-nowrap" href="/student/exam"><i class="fas fa-file fa-fw"></i>
                            Exam</a></li>
                </ul>
            </li>
        </ul>
        <!-- END: Menu-->
    </div>
</div> --}}
