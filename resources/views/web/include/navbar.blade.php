<!-- Start Navbar Area -->
<div class="navbar-area nav-style-1">
    <div class="mobile-responsive-nav">
        <div class="container">
            <div class="mobile-responsive-menu">
                <div class="logo">
                    <a href="index.html">
                        <img src="{{ asset('assets/images/logo-icon-2.png') }}" class="logo-icon-1" alt="logo">
                        <img src="{{ asset('assets/images/logo-icon-2.png') }}" class="logo-icon-2" alt="logo">

                        <img src="{{ asset('assets/images/white-logo.png') }}" class="main-logo" alt="logo">
                        <img src="{{ asset('assets/images/white-logo.png') }}" class="white-logo" alt="logo">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="desktop-nav">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-md navbar-light">

                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav">
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
                            <a href="contact-us.html" class="default-btn btn style-2">Get Started Now <i
                                    class="ri-arrow-right-line"></i></a>
                        </div>
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
                    <div class="others-options">
                        <div class="option-item">
                            <a href="contact-us.html" class="default-btn btn style-2">Get Started</a>
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
