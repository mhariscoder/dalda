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
                        {{-- <i class="metismenu-icon pe-7s-world "></i> --}}
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
                        </svg></i>
                        Dashboard</a>
                </li>
                @can('user-list')
                    <li class="{{ getActiveClass(request()->segment(2), ['users', 'roles']) }}">
                        <a href="javascript:void(0);"
                            class="{{ getActiveClass(request()->segment(2), ['users', 'user', 'role', 'roles']) }}">
                            <i class="metismenu-icon pe-7s-users" style="font-size: 2rem;color:#fff;}"></i>
                            User Management
                            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                        </a>
                        <ul>
                            <li>
                                <a href="/admin/manage-users"
                                    class="{{ getActiveClass(request()->segment(2), ['users', 'user']) }}">
                                    <i class="metismenu-icon"></i>
                                    Users
                                </a>
                            </li>
                            @can('role-list')
                                <li>
                                    <a href="/admin/manage-roles"
                                        class="{{ getActiveClass(request()->segment(2), ['roles', 'role']) }}">
                                        <i class="metismenu-icon">
                                        </i>Roles
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('upload-documents')
                    <li
                        class="{{ getActiveClass(request()->segment(2), ['documnets', 'upload', 'eligibility', 'test', 'course', 'exam', 'result']) }}">
                        <a class="removePointerEvent {{ getActiveClass(request()->segment(2), ['documnets', 'upload', 'eligibility', 'test', 'course', 'exam', 'result']) }}"
                            href="javascript:void(0);">
                            <i class="metismenu-icon pe-7s-info"  style="font-size: 1.8rem;color:#fff"    ></i>
                            Info Management
                            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                        </a>
                        <ul>
                            <li>
                                <a href="/admin/upload-documents"
                                    class="{{ getActiveClass(request()->segment(2), ['uploads', 'upload']) }}">
                                    <i class="metismenu-icon"></i>
                                    Uploaded Documents
                                </a>
                            </li>
                            <li>
                                <a href="/admin/eligibility-criteria"
                                    class="{{ getActiveClass(request()->segment(2), ['eligibility']) }}">
                                    <i class="metismenu-icon"></i>
                                    Eligibility Criteria
                                </a>
                            </li>
                            <li>
                                <a href="/admin/test-schedule"
                                    class="{{ getActiveClass(request()->segment(2), ['schedule', 'schedule']) }}">
                                    <i class="metismenu-icon"></i>
                                    Test Schedule
                                </a>
                            </li>
                            <li>
                                <a href="/admin/course-offering"
                                    class="{{ getActiveClass(request()->segment(2), ['courses', 'course']) }}">
                                    <i class="metismenu-icon"></i>
                                    Course Offering
                                </a>
                            </li>
                            <li>
                                <a href="/admin/exam"
                                    class="{{ getActiveClass(request()->segment(2), ['exams', 'exam']) }}">
                                    <i class="metismenu-icon"></i>
                                    Exam
                                </a>
                            </li>
                            <li class="{{ getActiveClass(request()->segment(2), ['dates', 'result']) }}">
                                <a href="javascript:void(0);"
                                    class="{{ getActiveClass(request()->segment(2), ['dates', 'result']) }}">Announcements<i
                                        class="metismenu-state-icon pe-7s-angle-down caret-left"></i></a>
                                <ul>
                                    <li>
                                        <a href="/admin/test-dates"
                                            class="{{ getActiveClass(request()->segment(2), ['dates']) }}">
                                            <i class="metismenu-icon"></i>
                                            Test Dates
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/admin/student-result"
                                            class="{{ getActiveClass(request()->segment(2), ['result']) }}">
                                            <i class="metismenu-icon"></i>
                                            Test Results
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                @endcan
                @can('apply-scholarship-list')
                    <li class="{{ getActiveClass(request()->segment(2), ['scoloarships', 'scoloarship']) }}">
                        <a href="javascript:void(0);"
                            class="{{ getActiveClass(request()->segment(2), ['scoloarships', 'scoloarship']) }}">
                            {{-- <i class="metismenu-icon pe-7s-study"></i> --}}
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
                            <li>
                                <a href="/admin/apply-for-scoloarships"
                                    class="{{ getActiveClass(request()->segment(2), ['apply']) }}">
                                    <i class="metismenu-icon"></i>
                                    Apply
                                    For Scholarship
                                </a>
                            </li>
                            @can('claim-scholarship-list')
                                <li>
                                    <a href="/admin/claim-for-scoloarships"
                                        class="{{ getActiveClass(request()->segment(2), ['claim']) }}">
                                        <i class="metismenu-icon">
                                        </i>Claim For Scholarship
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('notification-list')
                    <li class="{{ getActiveClass(request()->segment(2), ['notifications']) }}">
                        <a href="javascript:void(0);"
                            class="{{ getActiveClass(request()->segment(2), ['notifications']) }}">
                            <i class="metismenu-icon pe-7s-bell"  style="font-size: 1.8rem;color:#fff" ></i>
                            Notifications
                            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                        </a>
                        <ul>
                            <li>
                                <a href="/admin/notifications"
                                    class="{{ getActiveClass(request()->segment(2), ['notifications']) }}">
                                    <i class="metismenu-icon"></i>
                                    All Notifications
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan
                @can('web-content-management')
                    <li
                        class="@if (request()->segment(2) == 'gallery-video-list') {{ getActiveClass(request()->segment(2), ['video']) }} @endif
                        @if (request()->segment(2) == 'gallery-image-list') {{ getActiveClass(request()->segment(2), ['image']) }} @endif
                        @if (request()->segment(2) == 'high-potential-student') {{ getActiveClass(request()->segment(2), ['high']) }} @endif
                        @if (request()->segment(2) == 'achievers-student') {{ getActiveClass(request()->segment(2), ['achievers']) }} @endif
                        {{ getActiveClass(request()->segment(3), ['home', 'screening', 'process', 'story', 'contact', 'health', 'heroes', 'agriculture', 'university', 'about', 'education', 'hospital', 'agriculture', 'success', 'interviews', 'press', 'faq']) }}">
                        <a class="removePointerEvent @if (request()->segment(2) == 'gallery-video-list') {{ getActiveClass(request()->segment(2), ['video']) }} @endif
                            @if (request()->segment(2) == 'gallery-image-list') {{ getActiveClass(request()->segment(2), ['image']) }} @endif
                            @if (request()->segment(2) == 'high-potential-student') {{ getActiveClass(request()->segment(2), ['high']) }} @endif
                            @if (request()->segment(2) == 'achievers-student') {{ getActiveClass(request()->segment(2), ['achievers']) }} @endif
                            {{ getActiveClass(request()->segment(3), ['home', 'screening', 'process', 'story', 'contact', 'health', 'heroes', 'agriculture', 'university', 'about', 'education', 'hospital', 'agriculture', 'success', 'interviews', 'press', 'faq']) }}"
                            href="javascript:void(0);">
                            <i class="metismenu-icon pe-7s-photo-gallery"  style="font-size: 1.8rem;color:#fff" ></i>
                            CMS
                            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                        </a>
                        <ul>
                            <li
                                class="{{ getActiveClass(request()->segment(3), ['home', 'screening', 'process', 'story', 'contact', 'heroes', 'health', 'agriculture', 'university', 'about', 'education', 'hospital', 'agriculture', 'success', 'interviews', 'press', 'faq']) }}">
                                <a class="{{ getActiveClass(request()->segment(3), ['home', 'screening', 'process', 'story', 'contact', 'heroes', 'health', 'agriculture', 'university', 'about', 'education', 'hospital', 'agriculture', 'success', 'interviews', 'press', 'faq']) }}"
                                    href="javascript:void(0);">Pages
                                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                </a>
                                <ul>
                                    <li><a href="/admin/pages/agriculture-list/update/{{ \App\Models\CMSAgriculture::AGRICULTURE_ID }}"
                                            class="{{ getActiveClass(request()->segment(3), ['agriculture']) }}">Agriculture</a>
                                    </li>

                                    <li class="{{ getActiveClass(request()->segment(3), ['health']) }}">
                                        <a href="javascript:void(0);"
                                            class="{{ getActiveClass(request()->segment(3), ['health']) }}">
                                            Health
                                            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                        </a>
                                        <ul>
                                            <li>
                                                <a href="/admin/pages/health/main-update/{{ \App\Models\CMSHealth::HEALTH_ID }}"
                                                    class="{{ getActiveClass(request()->segment(4), ['main']) }}">
                                                    Main Page
                                                </a>
                                            </li>
                                            <li>
                                                <a href="/admin/pages/health/hospitals-list/{{ \App\Models\CMSHealth::HEALTH_ID }}"
                                                    class="{{ getActiveClass(request()->segment(4), ['hospitals']) }}">
                                                    Hospital
                                                </a>
                                            </li>

                                        </ul>
                                    </li>


                                    {{-- <li><a href="/admin/health-list/update/{{ \App\Models\CMSHealth::HEALTH_ID }}"
                                            class="{{ getActiveClass(request()->segment(2), ['health']) }}">Health</a>
                                    </li> --}}
                                    {{-- <li><a href="/admin/hospital-list"> Hospital</a></li> --}}
                                    <li class="{{ getActiveClass(request()->segment(3), ['education']) }}">
                                        <a href="javascript:void(0);"
                                            class="{{ getActiveClass(request()->segment(3), ['education']) }}">
                                            Education
                                            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                        </a>
                                        <ul>
                                            <li>
                                                <a href="/admin/pages/education/main-update/{{ \App\Models\CMSHome::HOME_ID }}"
                                                    class="{{ getActiveClass(request()->segment(4), ['main']) }}">
                                                    Main Page
                                                </a>
                                            </li>
                                            <li>
                                                <a href="/admin/pages/education/education-box-list/{{ \App\Models\CMSEducation::EDUCATION_ID }}"
                                                    class="{{ getActiveClass(request()->segment(4), ['education']) }}">
                                                    Boxes
                                                </a>
                                            </li>
                                            <li>
                                                <a href="/admin/pages/education/services-list/{{ \App\Models\CMSEducation::EDUCATION_ID }}"
                                                    class="{{ getActiveClass(request()->segment(4), ['services']) }}">
                                                    Services
                                                </a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li class="{{ getActiveClass(request()->segment(3), ['home', 'heroes']) }}">
                                        <a href="javascript:void(0);"
                                            class="{{ getActiveClass(request()->segment(3), ['home', 'heroes']) }}">
                                            Home
                                            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                        </a>
                                        <ul>
                                            <li>
                                                <a href="/admin/pages/home-update/{{ \App\Models\CMSHome::HOME_ID }}"
                                                    class="{{ getActiveClass(request()->segment(3), ['home']) }}">
                                                    Main Page
                                                </a>
                                            </li>
                                            <li>
                                                <a href="/admin/pages/heroes-list/{{ \App\Models\CMSHome::HOME_ID }}"
                                                    class="{{ getActiveClass(request()->segment(3), ['heroes']) }}">
                                                    Hero
                                                </a>
                                            </li>

                                        </ul>
                                    </li>




                                    {{-- <li><a href="/admin/pages/home-update/{{ \App\Models\CMSHome::HOME_ID }}"
                                            class="{{ getActiveClass(request()->segment(3), ['home']) }}"> Home</a></li> --}}
                                    <li><a href="/admin/pages/university-icons"
                                            class="{{ getActiveClass(request()->segment(3), ['university']) }}">
                                            University Icons</a></li>
                                    <li><a href="/admin/pages/about-update/{{ \App\Models\CMSAbout::ABOUT_ID }}"
                                            class="{{ getActiveClass(request()->segment(3), ['about']) }}"> About</a></li>
                                    <li><a  href="/admin/pages/update-contact/{{ \App\Models\CMSHome::HOME_ID }}"
                                            class="{{ getActiveClass(request()->segment(3), ['contact']) }}">
                                            Contact</a></li>
                                    <li><a  href="/admin/pages/screening-criteria/{{ \App\Models\CMSScreeningCriteria::SCREENING_CRITERIA_ID }}/edit"
                                        class="{{ getActiveClass(request()->segment(3), ['screening']) }}">
                                        Screening Criteria</a></li>
                                    <li><a  href="/admin/pages/process-to-apply/{{ \App\Models\ProcessToApply::PROCESS_TO_APPLY_ID }}/edit"
                                        class="{{ getActiveClass(request()->segment(3), ['process']) }}">
                                        Process To Apply</a></li>
                                        {{-- <li><a href="/admin/pages/story"
                                        class="{{ getActiveClass(request()->segment(3), ['story']) }}">Story</a></li> --}}
                                    {{-- <li><a href="/admin/pages/interviews"> Interviews</a></li> --}}
                                    {{-- <li><a href="/admin/pages/press-releases"> Press Releases</a></li> --}}
                                    {{-- <li><a href="/admin/pages/faq"> FAQ</a></li> --}}
                                </ul>
                            </li>
                            <li>
                                <a class="{{ getActiveClass(request()->segment(2), ['video']) }}"
                                    href="/admin/gallery-video-list">
                                    Videos
                                </a>
                            </li>
                            <li>
                                <a class="{{ getActiveClass(request()->segment(2), ['image']) }}"
                                    href="/admin/gallery-image-list">
                                    Image Gallery
                                </a>
                            </li>
                            <li>
                                <a class="{{ getActiveClass(request()->segment(2), ['high']) }}"
                                    href="/admin/high-potential-student">
                                    High Potential Students
                                </a>
                            </li>
                            <li>
                                <a class="{{ getActiveClass(request()->segment(2), ['achievers']) }}"
                                    href="/admin/achievers-student">
                                    High Achievers Students
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan
            </ul>
        </div>
    </div>
</div>
{{-- <div class="sidebar">
    <div class="site-width">
        <!-- START: Menu-->
        <ul id="side-menu" class="sidebar-menu">
            <li class="{{ getActiveClass(request()->segment(2),['dashboard']) }}">
                <a href="/admin/dashboard">
                    <i class="icon-rocket fa-fw"></i> Dashboard</a>
            </li>
            @can('user-list')
                <li class="dropdown {{ getActiveClass(request()->segment(2),['users','user','role']) }}"><a
                            class="removePointerEvent"
                            href="javascript:void(0);"><i class="fas fa-users fa-fw"></i></i> User Management</a>
                    <ul>
                        <li><a href="/admin/manage-users"><i class="fas fa-user fa-fw"></i> Users</a></li>
                        @can('role-list')
                            <li><a href="/admin/manage-roles"><i class="fas fa-user-tag fa-fw"></i> Roles</a></li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('apply-scholarship-list')
                <li class="dropdown {{ getActiveClass(request()->segment(2),['scoloarships','scoloarship']) }}"><a
                            class="removePointerEvent"
                            href="javascript:void(0);"><i class="fas fa-graduation-cap  fa-fw"></i> Scholarship Program</a>
                    <ul>
                        <li><a class="text-nowrap" href="/admin/apply-for-scoloarships"><i
                                        class="fas fa-book-open fa-fw"></i>
                                Apply
                                For Scholarship</a></li>
                        @can('claim-scholarship-list')
                            <li><a class="text-nowrap" href="/admin/claim-for-scoloarships"><i
                                            class="fas fa-book-open fa-fw"></i>
                                    Claim For Scholarship</a></li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('upload-documents')
                <li class="dropdown {{ getActiveClass(request()->segment(2),['upload','eligibility','test','course','exam','result'])}}">
                    <a class="removePointerEvent" href="javascript:void(0);"><i class="fas fa-file-alt fa-fw"></i>
                        Uploads</a>
                    <ul>
                        <li><a class="text-nowrap" href="/admin/upload-documents"><i class="fas fa-paste fa-fw"></i>
                                Uploaded Documents</a></li>
                        <li><a class="text-nowrap" href="/admin/add-upload-document"><i class="fas fa-file fa-fw"></i>
                                Upload Document</a></li>
                        <li><a class="text-nowrap" href="/admin/eligibility-criteria"><i class="fas fa-file fa-fw"></i>
                                Eligibility Criteria</a></li>
                        <li><a class="text-nowrap" href="/admin/test-schedule"><i class="fas fa-file fa-fw"></i>
                                Test Schedule</a></li>
                        <li><a class="text-nowrap" href="/admin/course-offering"><i class="fas fa-file fa-fw"></i>
                                Course Offering</a></li>
                        <li><a class="text-nowrap" href="/admin/exam"><i class="fas fa-file fa-fw"></i>
                                Exam</a></li>
                        <li class="dropdown {{ getActiveClass(request()->segment(2),['result','test']) }}"><a
                                    href="javascript:void(0);"><i class="fas fa-bullhorn fa-fw"></i> Announcements</a>
                            <ul class="sub-menu">
                                <li><a href="/admin/test-dates"><i class="fas fa-bullhorn fa-fw"></i> Test Dates </a>
                                </li>
                                <li><a href="/admin/student-result"><i class="fas fa-flag fa-fw"></i> Test Results
                                    </a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
            @endcan
            @can('web-content-management')
                <li class="dropdown {{ getActiveClass(request()->segment(2),['image','video','agriculture','hospital']) }}">
                    <a class="removePointerEvent"
                       href="javascript:void(0);"><i
                                class="icon-bag fa-fw"></i> Website Content
                        Management</a>
                    <ul>
                        <li class="dropdown {{ getActiveClass(request()->segment(2),['home','education','hospital','agriculture','success','interviews','press','faq']) }}">
                            <a
                                    href="javascript:void(0);"><i class="far fa-file-image fa-fw"></i> Pages</a>
                            <ul class="sub-menu">
                                <li><a href="/admin/agriculture-list"><i class="fab fa-canadian-maple-leaf fa-fw"></i>
                                        Agriculture
                                        List</a></li>
                                <li><a href="/admin/hospital-list"><i class="fas fa-hotel fa-fw"></i> Hospital
                                        List</a></li>
                                <li><a class="text-nowrap" href="/admin/education-list"><i
                                                class="fas fa-hotel fa-fw"></i> Education / Scholarships
                                        List</a></li>
                                <li><a href="/admin/pages/home"><i class="fas fa-home fa-fw"></i> Home
                                    </a></li>
                                <li><a href="/admin/pages/about"><i class="fas fa-info-circle fa-fw"></i> About
                                    </a></li>
                                <li><a href="/admin/pages/contact"><i class="fas fa-phone-square fa-fw"></i> Contact
                                    </a></li>
                                <li><a href="/admin/pages/success-story"><i class="far fa-check-circle fa-fw"></i>
                                        Success Stories
                                    </a></li>
                                <li><a href="/admin/pages/interviews"><i class="fas fa-band-aid fa-fw"></i> Interviews
                                    </a></li>
                                <li><a href="/admin/pages/press-releases"><i class="far fa-newspaper fa-fw"></i> Press
                                        Releases
                                    </a></li>
                                <li><a href="/admin/pages/faq"><i class="fas fa-question-circle fa-fw"></i> FAQ
                                    </a></li>
                            </ul>
                        </li>
                        <li class="dropdown {{ getActiveClass(request()->segment(2),['image','video']) }}">
                            <a
                                    href="javascript:void(0);"><i class="fas fa-photo-video fa-fw"></i> Gallery</a>
                            <ul class="sub-menu">
                                <li><a href="/admin/gallery-image-list"><i class="fas fa-crop-alt fa-fw"></i> Images
                                    </a></li>
                                <li><a href="/admin/gallery-video-list"><i class="fas fa-compact-disc fa-fw"></i> Videos
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown {{ getActiveClass(request()->segment(2),['blog']) }}">
                            <a
                                    href="javascript:void(0);"><i class="fas fa-blog fa-fw"></i> Blog</a>
                            <ul class="sub-menu">
                                <li><a href="/admin/blog/posts"><i class="fas fa-mail-bulk fa-fw"></i> Posts
                                    </a></li>
                                <li><a href="/admin/blog/tags"><i class="fas fa-tags fa-fw"></i> Tags </a>
                                </li>
                                <li><a href="/admin/blog/categories"><i class="fas fa-stream fa-fw"></i> Categories </a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown {{ getActiveClass(request()->segment(2),['blog','news']) }}">
                            <a
                                    href="javascript:void(0);"><i class="fas fa-blog fa-fw"></i> Media Center</a>
                            <ul class="sub-menu">
                                <li><a href="/admin/media-center/news"><i class="fas fa-newspaper fa-fw"></i> News
                                    </a></li>
                                <li><a href="/admin/media-center/hall-of-fame"><i class="fas fa-mail-bulk fa-fw"></i>
                                        Hall Of Fame
                                    </a></li>
                                <li><a href="/admin/media-center/volunteers"><i class="fas fa-tags fa-fw"></i>
                                        Volunteers </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            @endcan
            @can('notification-list')
                <li class="dropdown {{ getActiveClass(request()->segment(2),['notifications']) }} "><a
                            class="removePointerEvent"
                            href="javascript:void(0);"><i class="icon-bell fa-fw"></i> Notifications</a>
                    <ul>
                        <li><a href="/admin/notifications"><i class="icon-bell fa-fw"></i> All Notifications </a></li>
                    </ul>
                </li>
            @endcan
        </ul>
        <!-- END: Menu-->
    </div>
</div> --}}
