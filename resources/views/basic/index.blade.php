@extends('main/masteri')
@section('content')
    <!--app-content open-->
    <div class="background-wrapper">
        <div class="main-content mt-0 content-overlay">
            <div class="side-app">
                <!-- PAGE-HEADER -->
                <div class="main-container container-fluid">
                    <div class="page-header">
                        <h1 class="page-title"></h1>
                        <div class="d-flex justify-content-between align-items-center w-100">
                            <!-- دکمه‌ها و تماس‌ها -->
                            <div class="d-flex align-items-center gap-2">
                                <a href="{{ route('support') }}" class="btn-custom"><i class="fas fa-headset"></i> پشتیبانی ۲۴ ساعته</a>
                                <a href="{{ route('contact-button') }}" class="btn-custom"><i class="fas fa-phone-alt"></i> ۰۲۱۶۵</a>
                            </div>

                            <!-- breadcrumb -->
                            <ol class="breadcrumb d-flex align-items-center m-0 p-0">
                                <li class="breadcrumb-item"><a href="javascript:void(0)"></a></li>
                                <li class="breadcrumb-item active" aria-current="page"></li>
                            </ol>

                            <!-- ورود و ثبت‌نام -->
                            <div class="d-flex align-items-center gap-2">
                                <a href="{{ route('register') }}" class="btn-custom"><i class="fas fa-user-plus"></i> ثبت
                                    نام</a>
                                <a href="{{ route('login') }}" class="btn-custom"><i class="fas fa-sign-in-alt"></i>
                                    ورود</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Banner -->
                <div class="site-blocks-cover">
                    <div class="container">
                        <h1>همراه شما هستیم</h1>
                        <p class="mb-5"><span class="brand-name">آسایار</span> - ارائه جامع‌ترین خدمات آسانسور با گارانتی
                            معتبر و قیمت‌های رقابتی</p>
                    </div>
                </div>

                <!-- کارت سنجاق‌شده
                <div class="catalog-pin-wrapper">
                    <div class="pin pin-left"></div>
                    <div class="catalog-card">
                        <h3 class="catalog-title">عنوان کارت</h3>
                        <p class="catalog-text">
                            این یک متن نمونه طولانی است که کارت را بلندتر و طبیعی‌تر نشان می‌دهد...
                        </p>
                        <a href="#" class="catalog-cta">بیشتر بخوانید</a>
                    </div>
                </div>-->


                <!-- Promotional Marquee -->
                <div class="promo-marquee bg-primary d-flex align-items-center">
                    <div class="marquee-content text-white">
                        ✅ نصب آسانسور با بالاترین استانداردهای ایمنی
                        💡 تعمیرات تخصصی با تیم حرفه‌ای
                        🛠 بازسازی آسانسورهای قدیمی
                        🎯 ارائه مشاوره رایگان و بهینه‌سازی پروژه‌ها
                    </div>
                </div>

                <!-- Features / Services -->
                <div class="site-section bg-light" id="features-section">
                    <div class="container">
                        <h2 class="section-title text-center mb-4"></h2>
                        <div class="row align-items-stretch">

                            <!-- کارت‌ها -->
                            <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up">
                                <div class="unit-4 d-block service-card-primary h-100">
                                    <div class="icon-container">
                                        <div class="icon-circle"><i class="fas fa-elevator"></i></div>
                                    </div>
                                    <div class="text-center">
                                        <h3 class="text-dark">نصب حرفه‌ای آسانسور</h3>
                                        <p class="text-muted">نصب آسانسورهای مسکونی، تجاری و صنعتی با استانداردهای ایمنی</p>
                                        <p><a href="#" class="text-primary text-decoration-none">مشاهده جزئیات <i
                                                    class="fas fa-arrow-left me-2"></i></a></p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up">
                                <div class="unit-4 d-block service-card-secondary h-100">
                                    <div class="icon-container">
                                        <div class="icon-circle"><i class="fas fa-tools"></i></div>
                                    </div>
                                    <div class="text-center">
                                        <h3 class="text-dark">تعمیرات تخصصی</h3>
                                        <p class="text-muted">رفع عیوب فنی، تعویض قطعات فرسوده و سرویس دوره‌ای با تیم فنی
                                            مجرب</p>
                                        <p><a href="#" class="text-primary text-decoration-none">مشاهده جزئیات <i
                                                    class="fas fa-arrow-left me-2"></i></a></p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up">
                                <div class="unit-4 d-block service-card-primary h-100">
                                    <div class="icon-container">
                                        <div class="icon-circle"><i class="fas fa-hammer"></i></div>
                                    </div>
                                    <div class="text-center">
                                        <h3 class="text-dark">بازسازی و مدرنیزاسیون</h3>
                                        <p class="text-muted">بهینه‌سازی آسانسورهای قدیمی با جدیدترین فناوری‌ها</p>
                                        <p><a href="#" class="text-primary text-decoration-none">مشاهده جزئیات <i
                                                    class="fas fa-arrow-left me-2"></i></a></p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up">
                                <div class="unit-4 d-block service-card-secondary h-100">
                                    <div class="icon-container">
                                        <div class="icon-circle"><i class="fas fa-cog"></i></div>
                                    </div>
                                    <div class="text-center">
                                        <h3 class="text-dark">نگهداری و سرویس دوره‌ای</h3>
                                        <p class="text-muted">پکیج‌های متنوع سرویس‌دهی برای پیشگیری از خرابی‌های پرهزینه
                                        </p>
                                        <p><a href="#" class="text-primary text-decoration-none">مشاهده جزئیات <i
                                                    class="fas fa-arrow-left me-2"></i></a></p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up">
                                <div class="unit-4 d-block service-card-primary h-100">
                                    <div class="icon-container">
                                        <div class="icon-circle"><i class="fas fa-box-open"></i></div>
                                    </div>
                                    <div class="text-center">
                                        <h3 class="text-dark">فروش قطعات اورجینال</h3>
                                        <p class="text-muted">تأمین کلیه لوازم یدکی آسانسور با گارانتی معتبر از برندهای
                                            جهانی</p>
                                        <p><a href="#" class="text-primary text-decoration-none">مشاهده جزئیات <i
                                                    class="fas fa-arrow-left me-2"></i></a></p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up">
                                <div class="unit-4 d-block service-card-secondary h-100">
                                    <div class="icon-container">
                                        <div class="icon-circle"><i class="fas fa-headset"></i></div>
                                    </div>
                                    <div class="text-center">
                                        <h3 class="text-dark">مشاوره رایگان</h3>
                                        <p class="text-muted">کارشناسی رایگان پروژه و ارائه بهترین راهکار متناسب با نیاز و
                                            بودجه شما</p>
                                        <p><a href="#" class="text-primary text-decoration-none">درخواست مشاوره <i
                                                    class="fas fa-arrow-left me-2"></i></a></p>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- SVG Icons Row -->
                        <section class="elevator-icons py-5 text-center">
                            <div class="container d-flex justify-content-center gap-4 flex-wrap">

                                <svg class="icon icon-1" xmlns="http://www.w3.org/2000/svg" width="64"
                                    height="64" viewBox="0 0 14 14">
                                    <g>
                                        <rect class="bg" x="0.75" y="0.75" width="12.5" height="12.5"
                                            rx="3" />
                                        <rect class="door-left" x="3.5" y="4" width="3" height="7" />
                                        <rect class="door-right" x="7.5" y="4" width="3" height="7" />
                                    </g>
                                </svg>

                                <svg class="icon icon-2" xmlns="http://www.w3.org/2000/svg" width="64"
                                    height="64" viewBox="0 0 14 14">
                                    <g>
                                        <rect class="bg" x="0.75" y="0.75" width="12.5" height="12.5"
                                            rx="3" />
                                        <rect class="door" x="5" y="4" width="4" height="7" />
                                    </g>
                                </svg>

                                <svg class="icon icon-3" xmlns="http://www.w3.org/2000/svg" width="64"
                                    height="64" viewBox="0 0 14 14">
                                    <g>
                                        <rect class="bg" x="0.75" y="0.75" width="12.5" height="12.5"
                                            rx="3" />
                                        <rect class="door-left" x="2.5" y="4" width="2" height="7" />
                                        <rect class="door-right" x="9.5" y="4" width="2" height="7" />
                                    </g>
                                </svg>

                                <svg class="icon icon-4" xmlns="http://www.w3.org/2000/svg" width="64"
                                    height="64" viewBox="0 0 14 14">
                                    <g>
                                        <rect class="bg" x="0.75" y="0.75" width="12.5" height="12.5"
                                            rx="3" />
                                        <rect class="panel" x="4.5" y="9" width="5" height="2" />
                                    </g>
                                </svg>

                            </div>
                        </section>

                        <!-- CTA Section -->
                        <section class="cta-section py-5 text-center text-white">
                            <div class="container">
                                <h2 class="mb-3 fw-bold">همین حالا با آسایار تماس بگیرید!</h2>
                                <p class="mb-4 fs-5">مشاوره رایگان و ارائه بهترین راهکارهای آسانسوری با قیمت رقابتی</p>
                                <a href="{{ route('support') }}" class="cta-btn btn btn-lg text-white px-5 py-3">درخواست
                                    مشاوره</a>
                            </div>
                        </section>

                        <!-- Brand Logos Slider -->
                        <section class="brand-logos-slider py-5 bg-light">
                            <div class="container overflow-hidden">
                                <div class="logos-track d-flex gap-5">
                                    <img src="{{ asset('assets/image/logo1.png') }}" alt="Brand 1" style="height:50px;">
                                    <img src="{{ asset('assets/image/logo2.png') }}" alt="Brand 2" style="height:50px;">
                                    <img src="{{ asset('assets/image/logo3.png') }}" alt="Brand 3" style="height:50px;">
                                    <img src="{{ asset('assets/image/logo4.png') }}" alt="Brand 4" style="height:50px;">
                                    <img src="{{ asset('assets/image/logopng.png') }}" alt="Brand 5"
                                        style="height:50px;">
                                </div>
                            </div>
                        </section>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ================= CSS پس‌زمینه و شفافیت ================= -->
@endsection
