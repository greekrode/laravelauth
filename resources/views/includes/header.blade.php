<header class="header header-menu-fullw">

    <!-- Header Top Bar -->
    <div class="header-top">
        <div class="container">
            <div class="header-top-left">
                <button class="btn btn-sm btn-default menu-link menu-link__secondary">
                    <i class="fa fa-list"></i>
                </button>
                <div class="menu-container">
                    <ul class="header-top-nav header-top-nav__secondary">
                        <li><a href="features-pricing-tables.html">Pricing</a></li>
                        <li><a href="#">Sitemap</a></li>
                        <li><a href="pages-faqs.html">FAQs</a></li>
                    </ul>
                </div>
            </div>
            <div class="header-top-right">
                <button class="btn btn-sm btn-default menu-link menu-link__tertiary">
                    <i class="fa fa-user"></i>
                </button>
                <div class="menu-container">
                    <ul class="header-top-nav header-top-nav__tertiary">
                        @if(Auth::guest())
                            <li><a href="/register"><i class="fa-pencil-square-o fa"></i> Register</a></li>
                            <li><a href="/login"><i class="fa-lock fa"></i> Login</a></li>
                        @else
                            <li><a href="{{ url('/home') }}">Bid Status</a></li>
                            <li><a class="{{ Request::is('profile/'.Auth::user()->name, 'profile/'.Auth::user()->name . '/edit') ? 'active' : null }}" href="{{ url('/profile/'.Auth::user()->name) }}">
                                @lang('titles.profile')
                            </a></li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                 {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Header Top Bar / End -->

    <div class="header-main">
        <div class="container">
            <!-- Logo -->
            <div class="logo">
                <a href="/"><img src=' {{ asset('images/logo.png') }}' alt="PetSitter" width="50%"></a>
                <!-- <h1><a href="index.html"><span>Pet</span>Sitter</a></h1>
                <p class="tagline">Find an Awesome PetSitter</p> -->
            </div>
            <!-- Logo / End -->

            <button type="button" class="navbar-toggle">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Banner -->
          <div class="head-info">
              <ul class="head-info-list">
                  <li><span>Call us on:</span> +62818 0280 3970</li>
                  <li><span>Email:</span> <a href="mailto:roderickhalim@gmail.com">roderickhalim@gmail.com</a></li>
              </ul>
              <ul class="social-links">
                      <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                </ul>
          </div>
          <!-- Banner / End -->
        </div>
    </div>

    <!-- Navigation -->
    <nav class="nav-main">
        <div class="container">
            <ul data-breakpoint="992" class="flexnav">
                @if (Route::is('/'))
                    <li class="active"><a href="/">Home</a></li>
                    <li><a href="#">Pages</a>
                        <ul>
                            <li><a href="page-about.html">About Us</a></li>
                            <li><a href="page-services.html">Services</a></li>
                            <li><a href="page-faqs.html">FAQs</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Features</a>
                        <ul>
                            <li><a href="features-pricing-tables.html">Pricing Tables</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Influencers</a>
                        <ul>
                            <li><a href="/post_profile">Post a Profile</a></li>
                            <li><a href="job-list.html">Influencers List</a></li>
                            <li><a href="job-dashboard.html">Dashboard</a></li>
                            <li><a href="job-profile.html">Profile</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Business Owners</a>
                        <ul>
                            <li><a href="/job/create">Post an Endorsement</a></li>
                            <li><a href="job-list.html">Endorsement List</a></li>
                            <li><a href="job-dashboard.html">Dashboard</a></li>
                            {{-- <li><a href="job-profile.html">Profile</a></li> --}}
                        </ul>
                    </li>
                    <li><a href="blog-right-sidebar.html">Blog</a>
                        <ul>
                            <li><a href="blog-right-sidebar.html">Blog Right Sidebar</a></li>
                            <li><a href="blog-left-sidebar.html">Blog Left Sidebar</a></li>
                            <li><a href="blog-fullwidth.html">Blog Full Width</a></li>
                            <li><a href="blog-post.html">Single Post</a></li>
                        </ul>
                    </li>
                    <li><a href="contacts.html">Contacts</a></li>
                @else (Route::currentRouteName() == "login" )
                <li><a href="/">Home</a></li>
                <li class="active"><a href="#">Pages</a>
                    <ul>
                        <li><a href="page-about.html">About Us</a></li>
                        <li><a href="page-services.html">Services</a></li>
                        <li><a href="page-faqs.html">FAQs</a></li>
                    </ul>
                </li>
                <li><a href="#">Features</a>
                    <ul>
                        <li><a href="features-pricing-tables.html">Pricing Tables</a></li>
                    </ul>
                </li>
                <li><a href="#">Influencers</a>
                    <ul>
                        <li><a href="/post_profile">Post a Profile</a></li>
                        <li><a href="job-list.html">Influencers List</a></li>
                        <li><a href="job-dashboard.html">Dashboard</a></li>
                        <li><a href="job-profile.html">Profile</a></li>
                    </ul>
                </li>
                <li><a href="#">Business Owners</a>
                    <ul>
                        <li><a href="/job/create">Post an Endorsement</a></li>
                        <li><a href="/job">Endorsement List</a></li>
                        <li><a href="/bid">Dashboard</a></li>
                    </ul>
                </li>
                <li><a href="blog-right-sidebar.html">Blog</a>
                    <ul>
                        <li><a href="blog-right-sidebar.html">Blog Right Sidebar</a></li>
                        <li><a href="blog-left-sidebar.html">Blog Left Sidebar</a></li>
                        <li><a href="blog-fullwidth.html">Blog Full Width</a></li>
                        <li><a href="blog-post.html">Single Post</a></li>
                    </ul>
                </li>
                <li><a href="contacts.html">Contacts</a></li>
                @endif
            </ul>
        </div>
    </nav>
    <!-- Navigation / End -->

</header>