<div class="app-header header-shadow header-text-dark">
    <div class="app-header__logo">
        <div class="logo-src ">
            <a href="/"><img src="/assets/images/dalda_logo.png"></a>
        </div>
        <div class="header__pane ml-auto">
            <div class="web-ham">
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
        <div class="logo-src ">
            <a href="/"><img src="/assets/images/dalda_logo.png"></a>
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
    </div>

    <div class="app-header__content">
        <div class="app-header-left">
            <div class="header-btn-lg pr-0">
                <div class="widget-content p-0">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="btn-group top-profile-logo" >
                                <a href="/admin/manage-profile" class="p-0 btn">
                                    <img class="profile-hat" src="/assets/images/hat.png" alt="Hat">
                                    <img class="profile-image"
                                        src="{{ auth()->user()->profile_picture }}" alt="">
                                    {{-- <i class="fa fa-angle-down ml-2 opacity-8"></i> --}}
                                </a>
                                {{-- <div tabindex="-1" role="menu" aria-hidden="true"
                                    class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item px-2 text-green align-self-center d-flex"
                                        href="/student/manage-profile"><i class="metismenu-icon pe-7s-user mr-2 h6 mb-0"></i> Edit
                                        Profile</a>
                                        <div tabindex="-1" class="dropdown-divider"></div>
                                    <a href="/student/logout"
                                        class="dropdown-item px-2 text-danger align-self-center d-flex">
                                        <i class="metismenu-icon pe-7s-power mr-2 h6 mb-0"></i> Sign Out</a>
                                </div> --}}
                            </div>
                        </div>
                        <div class="widget-content-left  ml-3 header-user-info">
                            <div class="widget-heading text-dark">
                                WELCOME BACK, <a href="/admin/manage-profile" class="user-name">{{ Auth::user()->full_name }}</a>
                            </div>
                            <div class="widget-subheading">
                                {{ Auth::user()->roles()->pluck('name')->first() == 'super-admin'? 'Admin': ucfirst(Auth::user()->roles()->pluck('name')->first()) }}
                            </div>
                        </div>
                        {{-- <div class="widget-content-right header-user-info ml-3">
                            <button type="button" class="btn-shadow p-1 btn btn-primary btn-sm show-toastr-example">
                                <i class="fa text-white fa-calendar pr-1 pl-1"></i>
                            </button>
                        </div> --}}
                    </div>
                </div>
            </div>

        </div>
        <div class="app-header-right">
            <ul class="header-menu nav">
                <li class="dropdown nav-item">
                    <a href="/admin/logout" class="nav-link">
                        <i class="nav-link-icon metismenu-icon pe-7s-power"></i>
                        Sign Out
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
{{-- <div id="header-fix" class="header fixed-top">
    <div class="site-width">
        <nav class="navbar navbar-expand-lg  p-0">
            <div class="navbar-header  h-100 h4 mb-0 align-self-center logo-bar text-left">
                <a href="/student/dashboard" class="horizontal-logo text-left">
                    <img src="/assets/images/dalda.png" alt="" width="70pt">
                </a>
            </div>
            <div class="navbar-right ml-auto h-100">
                <ul class="ml-auto p-0 m-0 list-unstyled d-flex top-icon h-100">
                    <li class="dropdown align-self-center d-inline-block">
                        <a href="#" class="nav-link" data-toggle="dropdown" aria-expanded="false"><i class="icon-bell h4"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right border py-0" id="statusNotification">
                            @include('partials.notifications.student')
                            <li><a class="dropdown-item text-center py-2" href="/student/notifications"> Read All Message
                                    <i class="icon-arrow-right pl-2 small"></i></a></li>
                        </ul>
                    </li>

                    <li class="dropdown user-profile align-self-center d-inline-block">
                        <a href="javascript:void(0)" class="nav-link py-0" data-toggle="dropdown" aria-expanded="false">
                            <div class="media">
                                <img src="{{ auth()->user()->profile_picture }}" alt=""
                                     class="d-flex img-fluid rounded-circle" style="width: 35px; height: 35px; object-fit: fill;">
                            </div>
                        </a>

                        <div class="dropdown-menu border dropdown-menu-right p-0">
                            <a class="dropdown-item px-2 text-green align-self-center d-flex"
                               href="javascript:void(0)"><i class="fas fa-user fa-fw mr-1 h6 mb-0"></i> {{Auth::user()->full_name}} ( {{ ucfirst(Auth::user()->roles()->pluck('name')->first()) }} ) </a>
                            <a class="dropdown-item px-2 text-green align-self-center d-flex"
                               href="/student/manage-profile"><i class="fas fa-user-edit mr-1 h6 mb-0"></i> Edit
                                Profile</a>
                            <a href="/student/logout" class="dropdown-item px-2 text-danger align-self-center d-flex">
                                <i class="fas fa-sign-out-alt mr-2 h6 mb-0"></i> Sign Out</a>
                        </div>

                    </li>

                    <div class="navbar-header h4 mb-0 text-center h-100 collapse-menu-bar">
                        <a href="#" class="sidebarCollapse" id="collapse"><i class="icon-menu"></i></a>
                    </div>

                </ul>
            </div>
        </nav>
    </div>
</div> --}}
