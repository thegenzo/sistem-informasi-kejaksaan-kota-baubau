<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from templates.hibotheme.com/irise/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Jun 2023 12:54:21 GMT -->
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

				@include('web.include.style')
        <title>@yield('title')</title>
        <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}">
        <style>
          /* Additional CSS styles */
          @media (max-width: 991px) {
              .middle-header-logo {
                  text-align: center;
                  margin-bottom: 20px;
              }
              .middle-header-logo .logo-2 {
                  display: none;
              }
          }
  
          @media (max-width: 767px) {
              .middle-header-logo .logo-1 {
                  display: none;
              }
              .navbar-area.nav-style-1 .desktop-nav .navbar-collapse.mean-menu ul.navbar-nav li {
                  width: 100%;
                  text-align: center;
              }
              .navbar-area.nav-style-1 .desktop-nav .navbar-collapse.mean-menu ul.navbar-nav li a {
                  display: block;
                  padding: 15px;
              }
              .navbar-area.nav-style-1 .desktop-nav .others-options.ms-auto .option-item {
                  margin-left: 0;
                  margin-right: 10px;
              }
              .blog-area.pt-100.pb-70 .single-blog-card .blog-img .date p {
                  font-size: 14px;
              }
          }
      </style>
    </head>
    <body>

        <!--Mouce Cursor-->
        <div class="mouseCursor cursor-outer"></div>
        <div class="mouseCursor cursor-inner"><span>Drag</span></div>
        <!--Mouce Cursor-->

				@include('web.include.header')

				@include('web.include.navbar')

				@yield('content')

        @include('web.include.footer')
        
        <!--Start Copy Right Area-->
        <div class="copy-right-area">
            <div class="container">
                <p>© <span></span>Proudly Owned by University of Dayanu Ikhsanuddin</p>
            </div>
        </div>
        <!--End Copy Right Area-->

        <!-- Start Go Top Area -->
        <div class="go-top">
            <i class="ri-rocket-line"></i>
            <i class="ri-rocket-line"></i>
        </div>
        <!-- End Go Top Area -->


		@include('web.include.script')
    </body>

<!-- Mirrored from templates.hibotheme.com/irise/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Jun 2023 12:54:38 GMT -->
</html>