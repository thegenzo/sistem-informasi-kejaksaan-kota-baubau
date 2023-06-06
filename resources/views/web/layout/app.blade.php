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
                <p>© <span>Irise</span> is Proudly Owned by University of Dayanu Ikhsanuddin</p>
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