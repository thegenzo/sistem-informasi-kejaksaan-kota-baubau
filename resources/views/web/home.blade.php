@extends('web.layout.app')

@section('title', 'Beranda - Sistem Informasi Kejaksaan Kota Baubau')

@section('content')
    <!--Start banner Area-->
    <div class="banner-area">
        <div class="hero-slider owl-carousel owl-theme">
			@foreach ($carousels as $carousel)
				<div class="slider-item" style="background-image: url('{{ $carousel->banner_image }}')">
					<div class="container-fluid">
						<div class="banner-content">
							{!! $carousel->banner_html !!}
							<div class="banner-btn">
								<a href="{{ $carousel->link }}" class="default-btn btn active mr-20">{{ $carousel->link_title }} <i class="ri-arrow-right-line"></i></a>
							</div>
						</div>
					</div>
				</div>
			@endforeach
        </div>
    </div>
    <!--End banner Area-->

    <!--Start About Area-->
    <div class="about-area ptb-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="about-content pl-15">
                        <div class="about-title text-center">
                            <span>Tentang Kami</span>
                            <h2>Sambutan Kepala Kejaksaan Kota Baubau</h2>
                            {!! CMSHelper::site_config('site_welcome') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End About Area-->

    @if (CMSHelper::site_config('media_home_video'))
    <!--Start Watch Video Area-->
    <div class="watch-video-area">
        <div class="container">
            <div class="video-img">
                <img src="{{ asset('assets/images/video-img/video-img-1.jpg') }}" alt="Image">
                <div class="video-content">
                    <h3>Watch Our Working Video</h3>
                    <div class="play-btn">
                        <a class="popup-youtube play-btn" href="https://www.youtube.com/watch?v=6WQCJx_vEX4">
                            <img src="assets/images/icon/icon-1.png" alt="Icon">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End Watch Video Area-->
    @endif


    <!--Start Blog Area-->
    <div class="blog-area pt-100 pb-70">
        <div class="container">
            <div class="section-title">
                <span>Informasi</span>
                <h2>Berita Terbaru</h2>
            </div>
            <div class="row justify-content-center">
                @forelse ($allNews as $news)
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
                    <div class="single-blog-card">
                        <div class="blog-img">
                            <a href="{{ route('web.news', $news->getRouteParam()) }}"><img src="{{ $news->cover_image }}" alt="Image"></a>
                            <div class="date">
                                <p>{{ date('d M', strtotime($news->created_at)) }}</p>
                                <span>{{ date('Y', strtotime($news->created_at)) }}</span>
                            </div>
                        </div>
                        <div class="blog-content">
                            <ul>
                                <li>
                                    <i class="ri-user-heart-line"></i>
                                    Oleh <a href="#">{{ $news->user->name }}</a>
                                </li>
                            </ul>
                            <h3><a href="{{ route('web.news', $news->getRouteParam()) }}">{{ $news->title }}</a></h3>
                            <p>{!! \Str::limit($news->content, 50) !!}</p>
                            <a href="{{ route('web.news', $news->getRouteParam()) }}" class="default-btn btn for-card">Baca Selengkapnya <i
                                    class="ri-arrow-right-line"></i></a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-lg-12 col-md-12" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
                    <h3 class="text-center">Maaf, berita belum tersedia!</h3>
                </div>
                @endforelse
            </div>
        </div>
    </div>
    <!--End Blog Area-->
@endsection
