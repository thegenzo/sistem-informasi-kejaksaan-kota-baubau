@extends('web.layout.web')

@section('title', 'Berita - Sistem Informasi Kejaksaan Kota Baubau')

@section('content')
<!--Start Page Header Area-->
<div class="page-header-area bg-f4fbf6">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-6 col-md-6">
				<div class="page-header-content">
					<h1>Berita</h1>
					<ul>
						<li><a href="/">Home</a></li>
						<li>Berita</li>
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

<!--Start Blog Right Sidebar Area-->
<div class="blog-right-sidebar-area pt-100 pb-70">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<div class="row justify-content-center">
					@forelse ($newses as $news)
					<div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
						<div class="single-blog-card style3">
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
										Diupload oleh<a href="blog-grid.html"> {{ $news->user->name }}</a>
									</li>
								</ul>
								<h3><a href="{{ route('web.news', $news->getRouteParam()) }}">{{ $news->title }}</a></h3>
								<p>{!! \Str::limit($news->content, 50) !!}</p>
								<a href="{{ route('web.news', $news->getRouteParam()) }}" class="default-btn btn for-card">Baca Selengkapnya <i class="ri-arrow-right-line"></i></a>
							</div>
						</div>
					</div>
					@empty
					<div class="col-lg-12 col-md-12" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
						<h2>Maaf, berita sedang tidak tersedia!</h2>
					</div>
					@endforelse
				</div>
				{{ $newses->withQueryString()->links() }}
			</div>
			<div class="col-lg-4">
				<div class="blog-details-sidebar">
					<div class="sidebar-widget">
						<h3>Cari Berita</h3>
						<div class="search-bar">
							<form action="{{ route('web.news') }}" method="GET">
								<div class="form-group">
									<input type="text" class="form-control" name="keyword" placeholder="Cari Berita...">
									<button class="default-btn active" type="submit">
										<i class="ri-file-search-line"></i>
									</button>
								</div>
							</form>
						</div>
					</div>
					<div class="sidebar-widget widget-peru-posts-thumb">
						<h3>Berita Terbaru</h3>
						<div class="post-wrap">
							@foreach ($newestNewses as $news)
								<article class="item">
									<a href="{{ route('web.news', $news->getRouteParam()) }}" class="thumb">
										<span class="" role="img"></span>
									</a>
									<div class="info">
										<time datetime="{{ date($news->created_at) }}">{{ \Carbon\Carbon::parse($news->created_at)->locale('id')->isoFormat('LL') }}</time>
										<h4 class="title usmall">
											<a href="{{ route('web.news', $news->getRouteParam()) }}">
												{{ $news->title }}
											</a>
										</h4>
									</div>

									<div class="clear"></div>
								</article>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--End Blog Right Sidebar Area-->
@endsection
