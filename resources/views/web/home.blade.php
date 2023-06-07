@extends('web.layout.app')

@section('title', 'Beranda - Sistem Informasi Kejaksaan Kota Baubau')

@section('content')
    <!--Start banner Area-->
    <div class="banner-area">
        <div class="hero-slider owl-carousel owl-theme">
			@foreach ($carousels as $carousel)
				<style>
					.slider-item.bg-{{ $loop->iteration }} {
						background-image: url('{{ $carousel->banner_image }}');
					}
				</style>
				<div class="slider-item bg-{{ $loop->iteration }}">
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

            {{-- <div class="slider-item bg-2">
                <div class="container-fluid">
                    <div class="banner-content">
                        <h1>The Smartest Way Serve Digital Marketing</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi lacus, dignissim vitae risus non,
                            imperdiet pharetra lorem. Sed ut lacus aliquet, volutpat sem pellentesque, egestas nisl.</p>
                        <div class="banner-btn">
                            <a href="contact-us.html" class="default-btn btn active mr-20">Contact Us <i
                                    class="ri-arrow-right-line"></i></a>
                            <a href="contact-us.html" class="default-btn btn style-2">Explore More <i
                                    class="ri-arrow-right-line"></i></a>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
    <!--End banner Area-->

    <!--Start About Area-->
    <div class="about-area ptb-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-image-content pr-15">
                        <img src="{{ asset('assets/images/about/about-img-1.png') }}" alt="Image">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-content pl-15">
                        <div class="about-title">
                            <span>About The Company</span>
                            <h2>We Are The Administration's Best Marketing Team</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi lacus, dignissim phareta
                                lorem. Sed ut lacus aliquet, volutpat sem pellentesque, egestas.</p>
                        </div>

                        <div class="about-features">
                            <ul>
                                <li>
                                    <div class="icon">
                                        <i class="ri-check-double-line"></i>
                                    </div>
                                    <h3>We Provide The Most Reasonable Cost</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi lacus,
                                        lorem. Sed ut lacus aliquet, volutpat egestas.</p>
                                </li>
                                <li>
                                    <div class="icon">
                                        <i class="ri-check-double-line"></i>
                                    </div>
                                    <h3>Support Portal Refelts Business</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi lacus,
                                        lorem. Sed ut lacus aliquet, volutpat egestas.</p>
                                </li>
                                <li>
                                    <div class="icon">
                                        <i class="ri-check-double-line"></i>
                                    </div>
                                    <h3>Listen & Engage With Followers</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi lacus,
                                        lorem. Sed ut lacus aliquet, volutpat egestas.</p>
                                </li>
                            </ul>
                        </div>
                        <a href="about-us.html" class="default-btn btn">Explore More <i class="ri-arrow-right-line"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End About Area-->

    <!--Start Services Area-->
    <div class="services-area bg-f4fbf6 pt-100 pb-70">
        <div class="container">
            <div class="section-title">
                <span>Our Services</span>
                <h2>Discover The Services We Offer</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi lacus, dignissim phareta lorem. Sed ut
                    lacus aliquet, volutpat sem pellentesque, egestas nisl.</p>
            </div>

            <div class="row">
                <div class="col-lg-3 col-sm-6" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
                    <div class="single-services-card">
                        <div class="services-img">
                            <img src="{{ asset('assets/images/services/services-img-1.png') }}" alt="Image">
                        </div>
                        <div class="services-content">
                            <h3>Product Analysis</h3>
                            <p>Lorem ipsum dolor consectet adipisci elit. Morbi lacus, Sed ut lacus aliquet, egestas.</p>
                            <a href="services-style-one.html" class="default-btn btn for-card">Explore More <i
                                    class="ri-arrow-right-line"></i></a>
                        </div>
                        <div class="number">
                            <span>01</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="400">
                    <div class="single-services-card">
                        <div class="services-img">
                            <img src="{{ asset('assets/images/services/services-img-2.png') }}" alt="Image">
                        </div>
                        <div class="services-content">
                            <h3>UI Design</h3>
                            <p>Lorem ipsum dolor consectet adipisci elit. Morbi lacus, Sed ut lacus aliquet, egestas.</p>
                            <a href="services-style-one.html" class="default-btn btn for-card">Explore More <i
                                    class="ri-arrow-right-line"></i></a>
                        </div>
                        <div class="number">
                            <span>02</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="600">
                    <div class="single-services-card">
                        <div class="services-img">
                            <img src="{{ asset('assets/images/services/services-img-3.png') }}" alt="Image">
                        </div>
                        <div class="services-content">
                            <h3>UX Recherche</h3>
                            <p>Lorem ipsum dolor consectet adipisci elit. Morbi lacus, Sed ut lacus aliquet, egestas.</p>
                            <a href="services-style-one.html" class="default-btn btn for-card">Explore More <i
                                    class="ri-arrow-right-line"></i></a>
                        </div>
                        <div class="number">
                            <span>03</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="800">
                    <div class="single-services-card">
                        <div class="services-img">
                            <img src="{{ asset('assets/images/services/services-img-4.png') }}" alt="Image">
                        </div>
                        <div class="services-content">
                            <h3>Branding Design</h3>
                            <p>Lorem ipsum dolor consectet adipisci elit. Morbi lacus, Sed ut lacus aliquet, egestas.</p>
                            <a href="services-style-one.html" class="default-btn btn for-card">Explore More <i
                                    class="ri-arrow-right-line"></i></a>
                        </div>
                        <div class="number">
                            <span>04</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End Services Area-->

    <!--Start Who We area-->
    <div class="who-we-are-area ptb-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="who-we-are-content pr-15">
                        <div class="who-we-are-title">
                            <span>Who We Are</span>
                            <h2>Our Professional Creative Digital Representation Team</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi lacus, dignissim phareta
                                lorem. Sed ut lacus aliquet, volutpat sem pellentesque, egestas nisl.</p>
                        </div>

                        <div class="who-we-are-features">
                            <ul>
                                <li>
                                    <div class="icon">
                                        <i class="ri-check-double-line"></i>
                                    </div>
                                    <h3>Inspired Design Decisions With Otto Storch Ideas</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi lacus,
                                        lorem. Sed ut lacus aliquet, volutpat egestas.</p>
                                </li>
                                <li>
                                    <div class="icon">
                                        <i class="ri-check-double-line"></i>
                                    </div>
                                    <h3>Announcing Smashing Online Workshops</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi lacus,
                                        lorem. Sed ut lacus aliquet, volutpat egestas.</p>
                                </li>
                                <li>
                                    <div class="icon">
                                        <i class="ri-check-double-line"></i>
                                    </div>
                                    <h3>How Should Designers Learn To Code Terminal</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi lacus,
                                        lorem. Sed ut lacus aliquet, volutpat egestas.</p>
                                </li>
                                <li>
                                    <div class="icon">
                                        <i class="ri-check-double-line"></i>
                                    </div>
                                    <h3>Easy Solutions To Your IT Problems</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi lacus,
                                        lorem. Sed ut lacus aliquet, volutpat egestas.</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="who-we-are-img pl-15">
                        <img src="{{ asset('assets/images/choose/choose-img-1.png') }}" alt="Image">
                        <div class="shape-1">
                            <img src="{{ asset('assets/images/shape/shape-1.png') }}" alt="Image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End Who We area-->

    <!--Start Projects Area-->
    <div class="project-area pt-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="project-slider owl-carousel owl-theme">
                        <div class="single-project-card">
                            <img src="{{ asset('assets/images/project/project-img-1.png') }}" alt="Image">
                            <div class="project-content">
                                <span>Business</span>
                                <h3>Staffing Solutions</h3>
                            </div>
                        </div>
                        <div class="single-project-card">
                            <img src="{{ asset('assets/images/project/project-img-2.png') }}" alt="Image">
                            <div class="project-content">
                                <span>Business</span>
                                <h3>Staffing Solutions</h3>
                            </div>
                        </div>
                        <div class="single-project-card">
                            <img src="{{ asset('assets/images/project/project-img-3.png') }}" alt="Image">
                            <div class="project-content">
                                <span>Business</span>
                                <h3>Staffing Solutions</h3>
                            </div>
                        </div>
                        <div class="single-project-card">
                            <img src="{{ asset('assets/images/project/project-img-4.png') }}" alt="Image">
                            <div class="project-content">
                                <span>Business</span>
                                <h3>Staffing Solutions</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="works-content">
                        <div class="works-title">
                            <span>Our Works</span>
                            <h2>We Have Newly Entire Many Projects</h2>
                            <p>Elit readablei content of a page when looking at it layout Sed ut lacus aliquet, volutpat
                                egestas nisl.</p>
                            <p>Lorem ipsum dolor site amet, consectetur adipiscing elit. readable content of a page when
                                looking at it layout Sed ut lacus aliquet, volutpat egestas nisl.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="project-shape-one">
                <img src="{{ asset('assets/images/shape/shape-2.png') }}" alt="Image">
            </div>
            <div class="project-shape-two">
                <img src="{{ asset('assets/images/shape/shape-3.png') }}" alt="Image">
            </div>
        </div>
    </div>
    <!--End Projects Area-->

    <!--Start Team area-->
    <div class="team-area pt-100 pb-70">
        <div class="container">
            <div class="section-title">
                <span>Meet The Team</span>
                <h2>Professional Creative Members</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi lacus, dignissim phareta lorem. Sed ut
                    lacus aliquet, volutpat sem pellentesque, egestas nisl.</p>
            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-6" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
                    <div class="single-team-card">
                        <div class="team-img">
                            <img src="{{ asset('assets/images/team/team-img-1.jpg') }}" alt="Image">
                            <div class="social-content">
                                <ul>
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
                        <div class="team-content">
                            <h3>Demond Feil</h3>
                            <span>CO Founder</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="400">
                    <div class="single-team-card">
                        <div class="team-img">
                            <img src="{{ asset('assets/images/team/team-img-2.jpg') }}" alt="Image">
                            <div class="social-content">
                                <ul>
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
                        <div class="team-content">
                            <h3>Gardner Mohr</h3>
                            <span>Chief Officer</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="600">
                    <div class="single-team-card">
                        <div class="team-img">
                            <img src="{{ asset('assets/images/team/team-img-3.jpg') }}" alt="Image">
                            <div class="social-content">
                                <ul>
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
                        <div class="team-content">
                            <h3>Kyra Bergnaum</h3>
                            <span>Creative Designer</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="800">
                    <div class="single-team-card">
                        <div class="team-img">
                            <img src="{{ asset('assets/images/team/team-img-4.jpg') }}" alt="Image">
                            <div class="social-content">
                                <ul>
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
                        <div class="team-content">
                            <h3>Joey Hilpert</h3>
                            <span>Web Designer</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End Team area-->

    <!--Start Skill Area-->
    <div class="skill-area bg-f4fbf6 pt-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="skill-content pr-20">
                        <div class="skill-title">
                            <span>Best Skills</span>
                            <h2>We Are A Very Experienced And Professional Team</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi lacus, dignissim phareta
                                lorem. Sed ut lacus aliquet, volutpat sem pellentesque, egestas nisl.</p>
                        </div>
                        <div class="skill-bar" data-percentage="80%">
                            <h4 class="progress-title-holder">
                                <span class="progress-title">Creative Design</span>
                                <span class="progress-number-wrapper">
                                    <span class="progress-number-mark">
                                        <span class="percent"></span>
                                        <span class="down-arrow"></span>
                                    </span>
                                </span>
                            </h4>

                            <div class="progress-content-outter">
                                <div class="progress-content"></div>
                            </div>
                        </div>

                        <div class="skill-bar" data-percentage="60%">
                            <h4 class="progress-title-holder clearfix">
                                <span class="progress-title">Product Engineering</span>
                                <span class="progress-number-wrapper">
                                    <span class="progress-number-mark">
                                        <span class="percent"></span>
                                        <span class="down-arrow"></span>
                                    </span>
                                </span>
                            </h4>

                            <div class="progress-content-outter">
                                <div class="progress-content"></div>
                            </div>
                        </div>

                        <div class="skill-bar" data-percentage="90%">
                            <h4 class="progress-title-holder clearfix">
                                <span class="progress-title">Support & Tips</span>
                                <span class="progress-number-wrapper">
                                    <span class="progress-number-mark">
                                        <span class="percent"></span>
                                        <span class="down-arrow"></span>
                                    </span>
                                </span>
                            </h4>

                            <div class="progress-content-outter">
                                <div class="progress-content"></div>
                            </div>
                        </div>
                        <div class="skill-bar" data-percentage="75%">
                            <h4 class="progress-title-holder clearfix">
                                <span class="progress-title">Marketing Strategy</span>
                                <span class="progress-number-wrapper">
                                    <span class="progress-number-mark">
                                        <span class="percent"></span>
                                        <span class="down-arrow"></span>
                                    </span>
                                </span>
                            </h4>

                            <div class="progress-content-outter">
                                <div class="progress-content"></div>
                            </div>
                        </div>
                        <div class="skill-bar mb-0" data-percentage="55%">
                            <h4 class="progress-title-holder clearfix">
                                <span class="progress-title">Recruitment</span>
                                <span class="progress-number-wrapper">
                                    <span class="progress-number-mark">
                                        <span class="percent"></span>
                                        <span class="down-arrow"></span>
                                    </span>
                                </span>
                            </h4>

                            <div class="progress-content-outter">
                                <div class="progress-content"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="skill-image">
                        <img src="{{ asset('assets/images/skill/skill-img-1.png') }}" alt="Image">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End Skill Area-->

    <!--Start Testimonials Area-->
    <div class="testimonials-area ptb-100">
        <div class="container">
            <div class="section-title">
                <span>Client Reviews</span>
                <h2>What People Say About Our Work</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi lacus, dignissim phareta lorem. Sed ut
                    lacus aliquet, volutpat sem pellentesque, egestas nisl.</p>
            </div>
            <div class="testimonials-slider owl-carousel owl-theme">
                <div class="single-testimonials-card">
                    <div class="row align-items-center">
                        <div class="col-lg-5 col-md-5">
                            <img src="assets/images/testimonials/testimonials-img-1.jpg" alt="Image">
                        </div>
                        <div class="col-lg-7 col-md-7">
                            <div class="testimonials-content">
                                <p>“Lorem ipsum dolor sit amet, consectetu
                                    adipiscing morbi lacus, dignissim pharea
                                    lorem. Sed lacus aliquet, volutpat sem
                                    pellentesque, egestas nisl.”</p>
                                <ul class="ratings-list">
                                    <li><i class="flaticon-star-3"></i></li>
                                    <li><i class="flaticon-star-3"></i></li>
                                    <li><i class="flaticon-star-3"></i></li>
                                    <li><i class="flaticon-star-3"></i></li>
                                    <li><i class="flaticon-star-3"></i></li>
                                </ul>
                                <h3>Madge Marvin</h3>
                                <span>Creative Designer</span>

                                <div class="icon">
                                    <i class="flaticon-left-quotes-sign"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-testimonials-card">
                    <div class="row align-items-center">
                        <div class="col-lg-5 col-md-5">
                            <img src="{{ asset('assets/images/testimonials/testimonials-img-2.jpg') }}" alt="Image">
                        </div>
                        <div class="col-lg-7 col-md-7">
                            <div class="testimonials-content">
                                <p>“Lorem ipsum dolor sit amet, consectetu
                                    adipiscing morbi lacus, dignissim pharea
                                    lorem. Sed lacus aliquet, volutpat sem
                                    pellentesque, egestas nisl.”</p>
                                <ul class="ratings-list">
                                    <li><i class="flaticon-star-3"></i></li>
                                    <li><i class="flaticon-star-3"></i></li>
                                    <li><i class="flaticon-star-3"></i></li>
                                    <li><i class="flaticon-star-3"></i></li>
                                    <li><i class="flaticon-star-3"></i></li>
                                </ul>
                                <h3>Ayden Stehr</h3>
                                <span>CEO & Founder</span>
                                <div class="icon">
                                    <i class="flaticon-left-quotes-sign"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-testimonials-card">
                    <div class="row align-items-center">
                        <div class="col-lg-5 col-md-5">
                            <img src="{{ asset('assets/images/testimonials/testimonials-img-1.jpg') }}" alt="Image">
                        </div>
                        <div class="col-lg-7 col-md-7">
                            <div class="testimonials-content">
                                <p>“Lorem ipsum dolor sit amet, consectetu
                                    adipiscing morbi lacus, dignissim pharea
                                    lorem. Sed lacus aliquet, volutpat sem
                                    pellentesque, egestas nisl.”</p>
                                <ul class="ratings-list">
                                    <li><i class="flaticon-star-3"></i></li>
                                    <li><i class="flaticon-star-3"></i></li>
                                    <li><i class="flaticon-star-3"></i></li>
                                    <li><i class="flaticon-star-3"></i></li>
                                    <li><i class="flaticon-star-3"></i></li>
                                </ul>
                                <h3>Madge Marvin</h3>
                                <span>Creative Designer</span>

                                <div class="icon">
                                    <i class="flaticon-left-quotes-sign"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-testimonials-card">
                    <div class="row align-items-center">
                        <div class="col-lg-5 col-md-5">
                            <img src="{{ asset('assets/images/testimonials/testimonials-img-2.jpg') }}" alt="Image">
                        </div>
                        <div class="col-lg-7 col-md-7">
                            <div class="testimonials-content">
                                <p>“Lorem ipsum dolor sit amet, consectetu
                                    adipiscing morbi lacus, dignissim pharea
                                    lorem. Sed lacus aliquet, volutpat sem
                                    pellentesque, egestas nisl.”</p>
                                <ul class="ratings-list">
                                    <li><i class="flaticon-star-3"></i></li>
                                    <li><i class="flaticon-star-3"></i></li>
                                    <li><i class="flaticon-star-3"></i></li>
                                    <li><i class="flaticon-star-3"></i></li>
                                    <li><i class="flaticon-star-3"></i></li>
                                </ul>
                                <h3>Ayden Stehr</h3>
                                <span>CEO & Founder</span>
                                <div class="icon">
                                    <i class="flaticon-left-quotes-sign"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End Testimonials Area-->

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

    <!--Start Blog Area-->
    <div class="blog-area pt-100 pb-70">
        <div class="container">
            <div class="section-title">
                <span>News & Blog</span>
                <h2>Check Out Our Latest Blog Post</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi lacus, dignissim phareta lorem. Sed ut
                    lacus aliquet, volutpat sem pellentesque, egestas nisl.</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
                    <div class="single-blog-card">
                        <div class="blog-img">
                            <a href="blog-details.html"><img src="assets/images/blog/blog-img-1.jpg" alt="Image"></a>
                            <div class="date">
                                <p>09</p>
                                <span>May</span>
                            </div>
                        </div>
                        <div class="blog-content">
                            <ul>
                                <li>
                                    <i class="ri-user-heart-line"></i>
                                    By <a href="blog-grid.html">Admin</a>
                                </li>
                                <li>
                                    <i class="ri-price-tag-3-line"></i>
                                    <a href="blog-grid.html">Latest News</a>
                                </li>
                            </ul>
                            <h3><a href="blog-details.html">The Standard Of Business Agency</a></h3>
                            <p>It is a long established fact that a reader will
                                be distracted by the readable content a page
                                when looking at its.</p>
                            <a href="blog-details.html" class="default-btn btn for-card">Explore More <i
                                    class="ri-arrow-right-line"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="400">
                    <div class="single-blog-card">
                        <div class="blog-img">
                            <a href="blog-details.html"><img src="assets/images/blog/blog-img-2.jpg" alt="Image"></a>
                            <div class="date">
                                <p>09</p>
                                <span>May</span>
                            </div>
                        </div>
                        <div class="blog-content">
                            <ul>
                                <li>
                                    <i class="ri-user-heart-line"></i>
                                    By <a href="blog-grid.html">Admin</a>
                                </li>
                                <li>
                                    <i class="ri-price-tag-3-line"></i>
                                    <a href="blog-grid.html">Latest News</a>
                                </li>
                            </ul>
                            <h3><a href="blog-details.html">Use Meta Benefit To Make Easier</a></h3>
                            <p>It is a long established fact that a reader will
                                be distracted by the readable content a page
                                when looking at its.</p>
                            <a href="blog-details.html" class="default-btn btn for-card">Explore More <i
                                    class="ri-arrow-right-line"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="600">
                    <div class="single-blog-card">
                        <div class="blog-img">
                            <a href="blog-details.html"><img src="assets/images/blog/blog-img-3.jpg" alt="Image"></a>
                            <div class="date">
                                <p>09</p>
                                <span>May</span>
                            </div>
                        </div>
                        <div class="blog-content">
                            <ul>
                                <li>
                                    <i class="ri-user-heart-line"></i>
                                    By <a href="blog-grid.html">Admin</a>
                                </li>
                                <li>
                                    <i class="ri-price-tag-3-line"></i>
                                    <a href="blog-grid.html">Latest News</a>
                                </li>
                            </ul>
                            <h3><a href="blog-details.html">Advertise Report That Make Your</a></h3>
                            <p>It is a long established fact that a reader will
                                be distracted by the readable content a page
                                when looking at its.</p>
                            <a href="blog-details.html" class="default-btn btn for-card">Explore More <i
                                    class="ri-arrow-right-line"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End Blog Area-->
@endsection
