<section class="nav-section">
    <nav
            class="navbar MainnavbarMenu navbar-expand-xl navbar-light"
            id="navbar"
    >
        <a class="navbar-brand" href="/"
        ><img src="/assets/website/images/logo.png" class="img-fluid" alt=""
            /></a>
        <button
                class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav m-auto">
                <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
                    <a class="nav-link" href="/"
                    >Home</a
                    >
                </li>
                <li class="nav-item {{ request()->routeIs('about') ? 'active' : '' }}">
                    <a class="nav-link" href="/about"
                    >About</a
                    >
                </li>
                <li class="nav-item {{ request()->routeIs('education') ? 'active' : '' }}">
                    <a class="nav-link" href="/education">Education/Scholarship</a>
                </li>
                <li class="nav-item {{ request()->routeIs('health-care') ? 'active' : '' }}">
                    <a class="nav-link" href="/health-care">Health Care</a>
                </li>
                <li class="nav-item {{ request()->routeIs('agriculture') ? 'active' : '' }}">
                    <a class="nav-link" href="/agriculture">Agriculture</a>
                </li>
                <li class="nav-item {{ request()->routeIs('donate') ? 'active' : '' }}">
                    <a class="nav-link" href="/donate">Donate Us</a>
                </li>
                <li class="nav-item dropdown">
                    <a
                            class="nav-link dropdown-toggle"
                            href="#"
                            id="navbarDropdown"
                            role="button"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                    >
                        Media Center
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item {{request()->is('media/*') ? 'active' : '' }}"
                           href="/media/gallery">Gallery</a>
                        <a class="dropdown-item {{request()->is('news/*') ? 'active' : '' }}"
                           href="/news">News</a>
                        <a class="dropdown-item {{request()->is('blog/*') ? 'active' : '' }}"
                           href="/blog/posts">Blog</a>
                        <a class="dropdown-item {{request()->is('hall-of-fame/*') ? 'active' : '' }}"
                           href="/hall-of-fame">Hall of Fame</a>
                        <a class="dropdown-item {{request()->is('volunteers/*') ? 'active' : '' }}"
                           href="/volunteers">Volunteers</a>
                    </div>
                </li>
                <li class="nav-item {{ request()->routeIs('contact') ? 'active' : '' }}">
                    <a class="nav-link" href="/contact">Contact Us</a>
                </li>
                <li class="nav-item {{ request()->routeIs('faq') ? 'active' : '' }}">
                    <a class="nav-link" href="/faq">FAQ</a>
                </li>
            </ul>
            <a class="nav-link" href="#"
            ><img
                        src="/assets/website/images/nav-iocn.png"
                        class="img-fluid navBtnIcon"
                        alt=""
                /></a>
        </div>
    </nav>
</section>
