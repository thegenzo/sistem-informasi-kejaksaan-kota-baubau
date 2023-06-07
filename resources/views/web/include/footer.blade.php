<!--Start Footer Area-->
<div class="start-footer-area pt-100 pb-70">
	<div class="container">
			<div class="row">
					<div class="col-lg-4 col-sm-4">
							<div class="single-footer-widget footer-logo-area">
									<a href="index.html"><img src="{{ asset('img/logo-primary.png') }}" width="60px" class="rounded" alt="Logo"></a>
									<p>{{ CMSHelper::site_config('site_name') }}</p>
									<div class="social-content">
											<ul>
													<li>
															<span>Follow Us</span>
													</li>
													<li>
															<a href="https://www.facebook.com/" target="_blank"><i class="ri-facebook-line"></i></a>
													</li>
													<li>
															<a href="https://www.twitter.com/" target="_blank"><i class="ri-twitter-line"></i></a>
													</li>
													<li>
															<a href="https://instagram.com/?lang=en" target="_blank"><i class="ri-instagram-line"></i></a>
													</li>
													<li>
															<a href="https://linkedin.com/?lang=en" target="_blank"><i class="ri-linkedin-line"></i></a>
													</li>
											</ul>
									</div>
							</div>
					</div>
					<div class="col-lg-4 col-sm-4">
							<div class="single-footer-widget footer-address-area">
									<h3>Informasi Alamat</h3>
									<ul>
											<li>
													<div class="icon">
															<i class="flaticon-phone-call-1"></i>
													</div>
													<p>Telpon</p>
													<a href="#">{{ CMSHelper::site_config('contact_phone') ?? '-' }}</a>
											</li>
											<li>
													<div class="icon">
															<i class="flaticon-mail"></i>
													</div>
													<p>Email Address</p>
													<a href="#"><span class="">{{ CMSHelper::site_config('contact_email') ?? '-' }}</span></a>
											</li>
											<li>
													<div class="icon">
															<i class="flaticon-place"></i>
													</div>
													<p>Alamat</p>
													<span>{{ CMSHelper::site_config('contact_address') ?? '-' }}</span>
											</li>
									</ul>
							</div>
					</div>
					<div class="col-lg-4 col-sm-4">
							<div class="single-footer-widget footer-useful-links-area pl-20">
									<h3>Tautan Terkait</h3>
									<div class="link-list">
											<ul>
													@foreach (\App\Models\FooterLink::all() as $footer)
													<li>
															<i class="ri-arrow-right-s-line"></i>
															<a href="{{ $footer->url }}" target="_blank">{{ $footer->name }}</a>
													</li>
													@endforeach
											</ul>
									</div>
							</div>
					</div>
			</div>
	</div>
</div>
<!--End Footer Area-->