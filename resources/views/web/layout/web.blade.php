<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from templates.hibotheme.com/irise/default/about-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Jun 2023 12:54:58 GMT -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrap Css-->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <!--Meanmenu Css-->
    <link rel="stylesheet" href="{{ asset('assets/css/meanmenu.css') }}">
    <!--Owl carousel-->
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <!--Owl Theme-->
    <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css') }}">
    <!--Magnific-popup-->
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <!--Flaticon-->
    <link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}">
    <!--Remixicon-->
    <link rel="stylesheet" href="{{ asset('assets/css/remixicon.css') }}">
    <!--Odometer-->
    <link rel="stylesheet" href="{{ asset('assets/css/odometer.min.css') }}">
    <!--Aos css-->
    <link rel="stylesheet" href="{{ asset('assets/css/aos.css') }}">
    <!--Style css-->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!--Dark css-->
    <link rel="stylesheet" href="{{ asset('assets/css/dark.css') }}">
    <!--Responsive css-->
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <title>@yield('title')</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}">
</head>

<body>

    <!--Mouce Cursor-->
    <div class="mouseCursor cursor-outer"></div>
    <div class="mouseCursor cursor-inner"><span>Drag</span></div>
    <!--Mouce Cursor-->

    <!-- Start Navbar Area -->
    <div class="navbar-area nav-style-3">
        <div class="mobile-responsive-nav">
            <div class="container">
                <div class="mobile-responsive-menu">
                    <div class="logo">
                        <a href="/">
                            <img src="{{ asset('assets/images/logo-icon-1.png') }}" class="logo-icon-1" alt="logo">
                            <img src="{{ asset('assets/images/logo-icon-2.png') }}" class="logo-icon-2" alt="logo">

                            <img src="{{ asset('assets/images/logo.png') }}" class="main-logo" alt="logo">
                            <img src="{{ asset('assets/images/white-logo.png') }}" class="white-logo" alt="logo">
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="desktop-nav">
            <div class="container">
                <nav class="navbar navbar-expand-md navbar-light">
                    <a class="navbar-brand" href="/">
                        <img src="{{ asset('img/logo-primary.png') }}" width="60px" class="main-logo rounded" alt="logo">
                        <img src="{{ asset('img/logo-primary.png') }}" width="60px" class="white-logo rounded" alt="logo">
                    </a>
                    <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                        <ul class="navbar-nav m-auto">
                            @foreach (\App\Models\Menu::where('level', 0)->orderBy('menu_order', 'asc')->get() as $menu)
                            @if ($menu->type == 'route')
                                <li class="nav-item">
                                    <a href="{{ route($menu->target) }}"
                                        class="nav-link {{ Route::is($menu->target) ? 'active' : '' }}">{{ $menu->name }}</a>
                                </li>
                            @elseif($menu->type == 'page')
                                <li class="nav-item">
                                    <a href="{{ route('web.page', \App\Models\Page::find($menu->target)->getRouteParam()) }}"
                                        class="nav-link {{ Route::is($menu->target) ? 'active' : '' }}">{{ $menu->name }}</a>
                                </li>
                            @elseif($menu->type == 'link')
                                <li class="nav-item">
                                    <a href="{{ $menu->target }}" class="nav-link {{ Route::is($menu->target) ? 'active' : '' }}" target="_blank">{{ $menu->name }}</a>
                                </li>
                            @elseif($menu->type == 'dropdown')
                                <li class="nav-item">
                                    <a href="#" class="nav-link dropdown-toggle">
                                        {{ $menu->name }}
                                    </a>
                                    <ul class="dropdown-menu">
                                        @foreach ($menu->child_menu()->orderBy('menu_order', 'asc')->get() as $child_menu)
                                            @if ($child_menu->type == 'route')
                                                <li class="nav-item">
                                                    <a href="{{ route($child_menu->target) }}"
                                                        class="nav-link {{ Route::is($menu->target) ? 'active' : '' }}">{{ $child_menu->name }}</a>
                                                </li>
                                            @elseif($child_menu->type == 'page')
                                                <li class="nav-item">
                                                    <a href="{{ route('web.page', \App\Models\Page::find($child_menu->target)->getRouteParam()) }}"
                                                        class="nav-link {{ Route::is($menu->target) ? 'active' : '' }}">{{ $child_menu->name }}</a>
                                                </li>
                                            @elseif($child_menu->type == 'link')
                                                <li class="nav-item">
                                                    <a href="{{ $child_menu->target }}" class="nav-link {{ Route::is($menu->target) ? 'active' : '' }}"
                                                        target="_blank">{{ $child_menu->name }}</a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>
                            @endif
                        @endforeach
                        </ul>

                        <div class="others-options ms-auto">
                            <div class="option-item">
                                <div class="switch-box">
                                    <label id="switch" class="switch">
                                        <input type="checkbox" onchange="toggleTheme()" id="slider">
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>

        <div class="others-option-for-responsive">
            <div class="container">
                <div class="dot-menu">
                    <div class="inner">
                        <div class="others-options ms-auto">
                            <div class="option-item">
                                <a href="contact-us.html" class="default-btn btn">Get Started</a>
                            </div>
                            <div class="option-item">
                                <div class="switch-box">
                                    <label id="switch2" class="switch">
                                        <input type="checkbox" onchange="toggleTheme()" id="slider2">
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Navbar Area -->

    @yield('content')

    <!--Start Footer Area-->
    <div class="start-footer-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="single-footer-widget footer-logo-area">
                        <a href="index.html"><img src="assets/images/white-logo.png" alt="Logo"></a>
                        <p>It is a long established fact that wo will
                            be distracted by the readable content as
                            when looking at its layout.</p>
                        <div class="social-content">
                            <ul>
                                <li>
                                    <span>Follow Us</span>
                                </li>
                                <li>
                                    <a href="https://www.facebook.com/" target="_blank"><i
                                            class="ri-facebook-line"></i></a>
                                </li>
                                <li>
                                    <a href="https://www.twitter.com/" target="_blank"><i
                                            class="ri-twitter-line"></i></a>
                                </li>
                                <li>
                                    <a href="https://instagram.com/?lang=en" target="_blank"><i
                                            class="ri-instagram-line"></i></a>
                                </li>
                                <li>
                                    <a href="https://linkedin.com/?lang=en" target="_blank"><i
                                            class="ri-linkedin-line"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-footer-widget footer-address-area">
                        <h3>Address Information</h3>
                        <ul>
                            <li>
                                <div class="icon">
                                    <i class="flaticon-phone-call-1"></i>
                                </div>
                                <p>Call Us Now</p>
                                <a href="tel:+0408886666">+040 888 6666</a>
                            </li>
                            <li>
                                <div class="icon">
                                    <i class="flaticon-mail"></i>
                                </div>
                                <p>Email Address</p>
                                <a
                                    href="https://templates.hibotheme.com/cdn-cgi/l/email-protection#4c24292020230c053e253f29622f2321"><span
                                        class="__cf_email__"
                                        data-cfemail="650d0009090a252c170c16004b060a08">[email&#160;protected]</span></a>
                            </li>
                            <li>
                                <div class="icon">
                                    <i class="flaticon-place"></i>
                                </div>
                                <p>Address</p>
                                <span>204 Protector Here, USA</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-footer-widget footer-useful-links-area">
                        <h3>Useful Links</h3>
                        <div class="link-list">
                            <ul>
                                <li>
                                    <i class="ri-arrow-right-s-line"></i>
                                    <a href="about-us.html">About Us</a>
                                </li>
                                <li>
                                    <i class="ri-arrow-right-s-line"></i>
                                    <a href="portfolio-style-one.html">Our Projects</a>
                                </li>
                                <li>
                                    <i class="ri-arrow-right-s-line"></i>
                                    <a href="team.html">Our Team</a>
                                </li>
                                <li>
                                    <i class="ri-arrow-right-s-line"></i>
                                    <a href="services-style-one.html">Services</a>
                                </li>
                                <li>
                                    <i class="ri-arrow-right-s-line"></i>
                                    <a href="blog-grid.html">News & Blog</a>
                                </li>
                                <li>
                                    <i class="ri-arrow-right-s-line"></i>
                                    <a href="testimonials.html">Testimonials</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-footer-widget footer-instagram-area">
                        <h3>Instagram</h3>
                        <div class="row">
                            <div class="col-4">
                                <div class="instagram-img">
                                    <img src="assets/images/instagram/instagram-img-1.jpg" alt="Image">
                                    <div class="icon">
                                        <a href="https://instagram.com/?lang=en" target="_blank"><i
                                                class="flaticon-instagram-1"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="instagram-img">
                                    <img src="assets/images/instagram/instagram-img-2.jpg" alt="Image">
                                    <div class="icon">
                                        <a href="https://instagram.com/?lang=en" target="_blank"><i
                                                class="flaticon-instagram-1"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="instagram-img">
                                    <img src="assets/images/instagram/instagram-img-3.jpg" alt="Image">
                                    <div class="icon">
                                        <a href="https://instagram.com/?lang=en" target="_blank"><i
                                                class="flaticon-instagram-1"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="instagram-img">
                                    <img src="assets/images/instagram/instagram-img-4.jpg" alt="Image">
                                    <div class="icon">
                                        <a href="https://instagram.com/?lang=en" target="_blank"><i
                                                class="flaticon-instagram-1"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="instagram-img">
                                    <img src="assets/images/instagram/instagram-img-5.jpg" alt="Image">
                                    <div class="icon">
                                        <a href="https://instagram.com/?lang=en" target="_blank"><i
                                                class="flaticon-instagram-1"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="instagram-img">
                                    <img src="assets/images/instagram/instagram-img-6.jpg" alt="Image">
                                    <div class="icon">
                                        <a href="https://instagram.com/?lang=en" target="_blank"><i
                                                class="flaticon-instagram-1"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End Footer Area-->

    <!--Start Copy Right Area-->
    <div class="copy-right-area">
        <div class="container">
					<p>© <span></span> Proudly Owned by University of Dayanu Ikhsanuddin</p>
        </div>
    </div>
    <!--End Copy Right Area-->

    <!-- Start Go Top Area -->
    <div class="go-top">
        <i class="ri-rocket-line"></i>
        <i class="ri-rocket-line"></i>
    </div>
    <!-- End Go Top Area -->


    <!-- Jquery js -->
    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <!-- Bootstrap bundle js -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Meanmenu js -->
    <script src="{{ asset('assets/js/jquery.meanmenu.js') }}"></script>
    <!-- Owl Carosel js -->
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <!-- Magnific popup js -->
    <script src="{{ asset('assets/js/jquery.magnific-popup.js') }}"></script>
    <!-- Aos js -->
    <script src="{{ asset('assets/js/aos.js') }}"></script>
    <!-- Mixitup js -->
    <script src="{{ asset('assets/js/mixitup.min.js') }}"></script>
    <!-- Odometer js -->
    <script src="{{ asset('assets/js/odometer.min.js') }}"></script>
    <!-- Appear js -->
    <script src="{{ asset('assets/js/appear.min.js') }}"></script>
    <!-- Form Validator js -->
    <script src="{{ asset('assets/js/form-validator.min.js') }}"></script>
    <!-- Contact Form Script js -->
    <script src="{{ asset('assets/js/contact-form-script.js') }}"></script>
    <!-- Ajaxchimp js -->
    <script src="{{ asset('assets/js/ajaxchimp.min.js') }}"></script>
    <!--Custom js-->
    <script src="{{ asset('assets/js/custom.js') }}"></script>
</body>

<!-- Mirrored from templates.hibotheme.com/irise/default/about-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Jun 2023 12:54:59 GMT -->

</html>
