        <!--Start Top Header-->
        <div class="tob-header-area">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-4">
                        <div class="heder-left-content">
                            <div class="content">
                                <i class="ri-user-voice-line"></i>
                                <p>{{ CMSHelper::site_config('site_name') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8">
                        <div class="heder-right-content">
                            <div class="row align-items-center">
                                <div class="col-lg-9 col-md-7">
                                    <div class="time-content">
                                        <i class="ri-time-line"></i>
                                        <p>{{ CMSHelper::site_config('site_workdays') }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-5">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Top Header-->

        <!--Start Middle Header-->
        <div class="middle-header-area">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-2">
                        <div class="middle-header-logo">
                            <img src="{{ asset('/img/logo-primary.png') }}" width="60px" class="logo-1 rounded"
                                alt="Logo">
                            <img src="{{ asset('/img/logo-primary.png') }}" width="60px" class="logo-2 rounded"
                                alt="Logo">
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="middle-header-right-content">
                            <ul>
                                <li>
                                    <div class="header-contact-box">
                                        <div class="icon">
                                            <i class="flaticon-phone-call-1"></i>
                                        </div>
                                        <p>Telpon</p>
                                        <a href="#">{{ CMSHelper::site_config('contact_phone') ?? '-' }}</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="header-contact-box">
                                        <div class="icon">
                                            <i class="flaticon-mail"></i>
                                        </div>
                                        <p>Email</p>
                                        <a href="#">{{ CMSHelper::site_config('contact_email') ?? '-' }}</span></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="header-contact-box">
                                        <div class="icon">
                                            <i class="flaticon-place"></i>
                                        </div>
                                        <p>Alamat</p>
                                        <span>{{ CMSHelper::site_config('contact_address') ?? '-' }}</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Middle Header-->
