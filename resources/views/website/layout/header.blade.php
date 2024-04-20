<header>
    <div class="container">
        <a href="/" class="logo">
            <img src="/assets/frontend/img/logo.png" alt="logo" /></a>

        <nav class="navigation desktop-nav">
            <ul>
                <li class="item {{ request()->routeIs('home') ? 'active' : '' }}"><a class="" href="/">HOME</a>
                </li>
                <li class="item {{ request()->routeIs('about') ? 'active' : '' }}"><a href="/about">ABOUT US</a></li>
                <li class="item {{ request()->routeIs('education') ? 'active' : '' }}"><a
                        href="/education">EDUCATION</a></li>
                <li class="item {{ request()->routeIs('agriculture') ? 'active' : '' }}"><a
                        href="{{ route('agriculture') }}">AGRICULTURE</a></li>
                <li class="item {{ request()->routeIs('health') ? 'active' : '' }}"><a
                        href="{{ route('health') }}">HEALTH</a></li>
                <li class="item {{ request()->routeIs('story') ? 'active' : '' }}"><a
                        href="{{ route('story') }}">STORIES</a></li>
                <li class="item {{ request()->routeIs('contact') ? 'active' : '' }}"><a
                        href="{{ route('contact') }}">CONTACT</a></li>
            </ul>
        </nav>
        <div class="buttonContainer">
            <div class="menu-icon" id="menu-icon">
                <i class="fa fa-bars fa-2x"></i>
                <nav class="navigation mobile-nav">
                    <ul>
                        <li class="item {{ request()->routeIs('home') ? 'active' : '' }}"><a class=""
                                href="/">HOME</a></li>
                        <li class="item {{ request()->routeIs('about') ? 'active' : '' }}"><a href="/about">ABOUT
                                US</a></li>
                        <li class="item {{ request()->routeIs('education') ? 'active' : '' }}"><a
                                href="/education">EDUCATION</a></li>
                        <li class="item {{ request()->routeIs('agriculture') ? 'active' : '' }}"><a
                                href="{{ route('agriculture') }}">AGRICULTURE</a></li>
                        <li class="item {{ request()->routeIs('health') ? 'active' : '' }}"><a
                                href="{{ route('health') }}">HEALTH</a></li>
                        <li class="item {{ request()->routeIs('story') ? 'active' : '' }}"><a
                                href="{{ route('story') }}">STORIES</a></li>
                        <li class="item {{ request()->routeIs('contact') ? 'active' : '' }}"><a
                                href="{{ route('contact') }}">CONTACT</a></li>
                        {{-- <li class="item"><a href="/confirm-student">SIGNUP</a></li>
                        <li class="item"><a href="/login">LOGIN</a></li> --}}
                        @guest
                            <li class="item">
                                <a href="/confirm-student" style="font-size: 16px" class="signupLink">
                                    SIGN UP NOW
                                </a>
                            </li>
                            <li class="item">

                                <a href="./login" style="background-color: transparent;font-size: 18px"
                                    class="btn btn-primary">Log In</a>
                            </li>
                        @endguest
                        @auth
                            @if (auth()->user()->roles()->pluck('name')->first() == 'super-admin')
                                <li class="item">
                                    <a href="/admin/dashboard" style="font-size: 16px" class="signupLink">Dashboard</a>
                                </li>
                                <li class="item">

                                    <a href="/admin/logout" class="btn btn-primary"
                                        style="background-color: transparent; color:#DC0B1E;font-size: 18px">Log Out</a>
                                </li>
                            @else
                                <li class="item">
                                    <a href="/student/dashboard" style="font-size: 16px" class="signupLink">Dashboard</a>
                                </li>
                                <li class="item">
                                    <a href="/student/logout" class="btn btn-primary"
                                        style="background-color: transparent; color:#DC0B1E;font-size: 18px">Log Out</a>
                                </li>
                            @endif
                        @endauth
                    </ul>
                </nav>
            </div>
            @guest
                <a href="/confirm-student" class="signupLink">
                    SIGN UP NOW
                </a>
                <a href="./login" class="btn btn-primary">Log In</a>
            @endguest
            @auth
                @if (auth()->user()->roles()->pluck('name')->first() == 'super-admin')
                    <a href="/admin/dashboard" class="signupLink">Dashboard</a>
                    <a href="/admin/logout" class="btn btn-primary" style="background-color: #DC0B1E; color:white">Log
                        Out</a>
                @else
                    <a href="/student/dashboard" class="signupLink">Dashboard</a>
                    <a href="/student/logout" class="btn btn-primary" style="background-color: #DC0B1E; color:white">Log
                        Out</a>
                @endif
            @endauth
        </div>
    </div>
</header>
