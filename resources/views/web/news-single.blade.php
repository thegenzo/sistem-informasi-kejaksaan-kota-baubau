@extends('web.layout.web')

@section('title', $news->title . ' - Sistem Informasi Kejaksaan Kota Baubau')

@section('content')
<!--Start Page Header Area-->
<div class="page-header-area bg-f4fbf6">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-6 col-md-6">
				<div class="page-header-content">
					<h1>{{ $news->title }}</h1>
					<ul>
						<li><a href="/">Home</a></li>
						<li><a href="/berita">Berita</a></li>
						<li>{{ $news->title }}</li>
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

<!--Start Blog Details Area-->
<div class="blog-details-area pt-100 pb-70">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<div class="blog-details">
					<div class="top-img">
						<img src="{{ $news->cover_image }}" alt="Image">
					</div>
					<div class="blog-details-content">
						<div class="user-and-date">
							<ul>
								<li>
									<i class="ri-user-heart-line"></i>
									Oleh <a href="#">{{ $news->user->name }}</a>
								</li>
								<li>
									<i class="ri-calendar-check-line"></i>
									{{ \Carbon\Carbon::parse($news->created_at)->locale('id')->isoFormat('LL') }}
								</li>
							</ul>
						</div>
						<h3>{{ $news->title }}</h3>
						
						{!! $news->content !!}

					</div>
				</div>
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
<!--End Blog Details Area-->
@endsection
