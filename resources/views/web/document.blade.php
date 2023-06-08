@extends('web.layout.web')

@section('title', 'Dokumen - Sistem Informasi Kejaksaan Kota Baubau')

@section('content')
    <!--Start Page Header Area-->
    <div class="page-header-area bg-f4fbf6">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="page-header-content">
                        <h1>Dokumen</h1>
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li>Dokumen</li>
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

    <!--Start FAQ Area-->
    <div class="faq-area pt-100 pb-70">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="faq-content">
                        <div class="faq-accordion">
                            <div class="accordion">
								@forelse ($documents as $document)
								<div class="accordion-item">
                                    <div class="accordion-title">
                                        <i class='flaticon-plus'></i>
                                        {{ $document->name }}
                                    </div>

                                    <div class="accordion-content show">
                                        <p>{{ $document->description }}</p>
										<br>
										Unduh : <a href="{{ $document->url }}">{{ $document->filename }}</a>
                                    </div>
                                </div>
								@empty
								<div class="accordion-item active">
                                    <div class="accordion-title">
                                        <i class='flaticon-plus'></i>
                                        Maaf, dokumen sedang tidak tersedia!
                                    </div>
                                </div>
								@endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End FAQ Area-->
@endsection
