@extends('web.layout.web')

@section('title', 'Halaman - Sistem Informasi Kejaksaan Kota Baubau')

@section('content')
    <!--Start Page Header Area-->
    <div class="page-header-area bg-f4fbf6">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="page-header-content">
                        <h1>{{ $page->title }}</h1>
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li>{{ $page->title }}</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="page-header-image">
                        <img src="{{ asset('assets/images/banner/banner-img-3.png') }}" alt="Image">
                    </div>
                </div>
            </div>

            <div class="page-header-shape">
                <img src="{{ asset('assets/images/shape/shape-8.png') }}" alt="Image">
                <img src="{{ asset('assets/images/shape/shape-9.png') }}" alt="Image">
                <img src="{{ asset('assets/images/shape/shape-10.png') }}" alt="Image">
            </div>
        </div>
    </div>
    <!--End Page Header Area-->
	
    <!--Start What We Do Area-->
    <div class="what-we-do-area ptb-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    {!! $page->page_content !!}
                </div>
            </div>
        </div>
    </div>
    <!--End What We Do Area-->
@endsection
