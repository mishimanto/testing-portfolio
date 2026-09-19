@php
    $siteName = $siteSetting?->site_name ?? 'Personal Portfolio';
    $metaTitle = $siteSetting?->meta_title ?: $siteName;
    $metaDescription = $siteSetting?->meta_description ?: 'Personal portfolio';
    $logoUrl = $siteSetting?->mediaUrl($siteSetting->logo, 'assets/images/logo/white-logo-reeni.png') ?? asset('assets/images/logo/white-logo-reeni.png');
    $darkLogoUrl = $siteSetting?->mediaUrl($siteSetting->dark_logo, 'assets/images/logo/logo-white.png') ?? asset('assets/images/logo/logo-white.png');
    $faviconUrl = $siteSetting?->mediaUrl($siteSetting->favicon, 'assets/images/favicon.svg') ?? asset('assets/images/favicon.svg');
    $sidebarImageUrl = $siteSetting?->mediaUrl($siteSetting->sidebar_image, 'assets/images/logo/man.png') ?? asset('assets/images/logo/man.png');
    $ogImageUrl = $siteSetting?->mediaUrl($siteSetting->og_image, 'assets/images/banner/banner-user-image-one.png') ?? asset('assets/images/banner/banner-user-image-one.png');
    $canonicalUrl = route('home');
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ $metaDescription }}">
    @if($siteSetting?->meta_keywords)<meta name="keywords" content="{{ $siteSetting->meta_keywords }}">@endif
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ $canonicalUrl }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ $faviconUrl }}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $metaTitle }}">
    <meta property="og:description" content="{{ $metaDescription }}">
    <meta property="og:url" content="{{ $canonicalUrl }}">
    <meta property="og:image" content="{{ $ogImageUrl }}">
    <meta property="og:site_name" content="{{ $siteName }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $metaTitle }}">
    <meta name="twitter:description" content="{{ $metaDescription }}">
    <meta name="twitter:image" content="{{ $ogImageUrl }}">
    <title>{{ $metaTitle }}</title>
    <!-- Bootstrap min css -->
    <link rel="stylesheet" href="assets/css/vendor/fontawesome.css">
    <link rel="stylesheet" href="assets/css/plugins/swiper.css">
    <link rel="stylesheet" href="assets/css/plugins/odometer.css">
    <link rel="stylesheet" href="assets/css/vendor/animate.min.css">
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
    <!-- custom css -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <!-- tpm-header-area start -->
    <header class="tmp-header-area-start header-one header--sticky header--transparent">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="header-content">
                        <div class="logo">
                            <a href="{{ route('home') }}">
                                <img class="logo-dark" src="{{ $logoUrl }}" alt="{{ $siteName }} logo">
                                <img class="logo-white" src="{{ $darkLogoUrl }}" alt="{{ $siteName }} logo">
                            </a>
                        </div>
                        <nav class="tmp-mainmenu-nav d-none d-xl-block">
                            <ul class="tmp-mainmenu">
                                @include('partials.navigation')
                            </ul>

                        </nav>
                        <div class="tmp-header-right">
                            <div class="social-share-wrapper d-none d-md-block">
                                <div class="social-link">
                                    @include('partials.social-links')
                                </div>
                            </div>
                            <div class="actions-area">
                                <div class="tmp-side-collups-area d-none d-xl-block">
                                    <button class="tmp-menu-bars tmp_button_active"><i class="fa-regular fa-bars-staggered"></i></button>
                                </div>
                                <div class="tmp-side-collups-area d-block d-xl-none">
                                    <button class="tmp-menu-bars humberger_menu_active"><i class="fa-regular fa-bars-staggered"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- tpm-header-area end -->

    <div class="d-none d-xl-block">
        <div class="tmp-sidebar-area tmp_side_bar">
            <div class="inner">
                <div class="top-area">
                    <a href="{{ route('home') }}" class="logo">
                        <img class="logo-dark" src="{{ $logoUrl }}" alt="{{ $siteName }} logo">
                        <img class="logo-white" src="{{ $darkLogoUrl }}" alt="{{ $siteName }} logo">
                    </a>
                    <div class="close-icon-area">
                        <button class="tmp-round-action-btn close_side_menu_active">
                            <i class="fa-sharp fa-light fa-xmark"></i>
                        </button>
                    </div>
                </div>
                <div class="content-wrapper">
                    <div class="image-area-feature">
                        <a href="{{ route('home') }}">
                            <img src="{{ $sidebarImageUrl }}" alt="{{ $siteName }} profile">
                        </a>
                    </div>
                    <h5 class="title mt--30">{{ $siteSetting?->sidebar_title ?? 'Freelancer delivering exceptional web solutions.' }}</h5>
                    <p class="disc">{{ $siteSetting?->sidebar_description ?? 'I create thoughtful, user-focused digital experiences.' }}</p>
                    <div class="short-contact-area">
                        <!-- single contact information -->
                        <div class="single-contact">
                            <i class="fa-solid fa-phone"></i>
                            <div class="information tmp-link-animation">
                                <span>Call Now</span>
                                <a href="tel:{{ preg_replace('/[^+0-9]/', '', $siteSetting?->phone ?? '') }}" class="number">{{ $siteSetting?->phone ?? 'Not provided' }}</a>
                            </div>
                        </div>
                        <!-- single contact information end -->

                        <!-- single contact information -->
                        <div class="single-contact">
                            <i class="fa-solid fa-envelope"></i>
                            <div class="information tmp-link-animation">
                                <span>Mail Us</span>
                                <a href="mailto:{{ $siteSetting?->email }}" class="number">{{ $siteSetting?->email ?? 'Not provided' }}</a>
                            </div>
                        </div>
                        <!-- single contact information end -->

                        <!-- single contact information -->
                        <div class="single-contact">
                            <i class="fa-solid fa-location-crosshairs"></i>
                            <div class="information tmp-link-animation">
                                <span>My Address</span>
                                <span class="number">{{ $siteSetting?->address ?? 'Not provided' }}</span>
                            </div>
                        </div>
                        <!-- single contact information end -->
                    </div>
                    <!-- social area start -->
                    <div class="social-wrapper mt--20">
                        <span class="subtitle">find with me</span>
                        <div class="social-link">
                            @include('partials.social-links')
                        </div>
                    </div>
                    <!-- social area end -->
                </div>
            </div>
        </div>
        <a class="overlay_close_side_menu close_side_menu_active" href="javascript:void(0);"></a>
    </div>

    <div class="d-block d-xl-none">
        <div class="tmp-popup-mobile-menu">
            <div class="inner">
                <div class="header-top">
                    <div class="logo">
                        <a href="{{ route('home') }}" class="logo-area">
                            <img class="logo-dark" src="{{ $logoUrl }}" alt="{{ $siteName }} logo">
                            <img class="logo-white" src="{{ $darkLogoUrl }}" alt="{{ $siteName }} logo">
                        </a>

                    </div>
                    <div class="close-menu">
                        <button class="close-button tmp-round-action-btn">
                            <i class="fa-sharp fa-light fa-xmark"></i>
                        </button>
                    </div>
                </div>
                <ul class="tmp-mainmenu">
                    @include('partials.navigation')
                </ul>


                <div class="social-wrapper mt--40">
                    <span class="subtitle">find with me</span>
                    <div class="social-link">
                        @include('partials.social-links')
                    </div>
                </div>
                <!-- social area end -->



            </div>
        </div>
    </div>



    <!-- tmp banner area start -->
    <div class="tmp-banner-one-area" id="home">
        <div class="container">
            <div class="banner-one-main-wrapper">
                <div class="row align-items-center">
                    <div class="col-lg-6 order-lg-2">
                        <div class="banner-right-content">
                            <img class="tmp-scroll-trigger tmp-zoom-in animation-order-1" src="{{ asset($hero?->image ?? 'assets/images/banner/banner-user-image-one.png') }}" alt="{{ $hero?->name ?? 'Portfolio owner' }}">
                            <h2 class="banner-big-text-1 up-down">{{ strtoupper($hero?->roles[0] ?? 'WEB DESIGNER') }}</h2>
                            <h2 class="banner-big-text-2 up-down-2">{{ strtoupper($hero?->roles[0] ?? 'WEB DESIGNER') }}</h2>
                        </div>
                    </div>
                    <div class="col-lg-6 order-lg-1">
                        <div class="inner">
                            <span class="sub-title tmp-scroll-trigger tmp-fade-in animation-order-1">{{ $hero?->eyebrow ?? 'Hello' }}</span>
                            <h1 class="title tmp-scroll-trigger tmp-fade-in animation-order-2 mt--5">i’m
                                {{ $hero?->name ?? 'Jane Cooper' }} a <br>
                                <span class="header-caption">
                                    <span class="cd-headline clip is-full-width">
                                        <span class="cd-words-wrapper">
                                            @foreach(($hero?->roles ?? ['Web Designer.']) as $role)
                                                <b class="{{ $loop->first ? 'is-visible' : 'is-hidden' }} theme-gradient">{{ $role }}</b>
                                            @endforeach
                                        </span>
                                </span>
                                </span>
                            </h1>
                            <p class="disc tmp-scroll-trigger tmp-fade-in animation-order-3">{{ $hero?->description }}</p>
                            <div class="button-area-banner-one tmp-scroll-trigger tmp-fade-in animation-order-4">
                                <a class="tmp-btn hover-icon-reverse radius-round" href="{{ $hero?->primary_button_url ?? '#portfolio' }}">
                                    <span class="icon-reverse-wrapper">
                                        <span class="btn-text">{{ $hero?->primary_button_label ?? 'View Portfolio' }}</span>
                                    <span class="btn-icon"><i class="fa-sharp fa-regular fa-arrow-right"></i></span>
                                    <span class="btn-icon"><i class="fa-sharp fa-regular fa-arrow-right"></i></span>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- tmp banner area end -->


    <!-- Tpm Service Area Start -->
    <section class="service-area tmp-section-gap" id="services">
        <div class="container">
            <div class="row justify-content-center">
                @foreach($services as $service)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="service-card-v1 tmp-scroll-trigger tmp-fade-in animation-order-{{ ($loop->index % 4) + 1 }} tmp-link-animation">
                            <div class="service-card-icon"><i class="{{ $service->icon ?: 'fa-light fa-pen-ruler' }}"></i></div>
                            <h4 class="service-title"><a href="{{ $service->url ?: '#contact' }}">{{ $service->title }}</a></h4>
                            <p class="service-para">{{ $service->description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Tpm Service Area End -->


    <!-- Tpm Counter Area Start -->
    <section class="counter-area">
        <div class="container">
            <div class="row g-5">
                <div class="col-12 col-lg-6 col-xl-6 col-xxl-6">
                    <div class="year-of-expariance-wrapper bg-blur-style-one tmp-scroll-trigger tmp-fade-in animation-order-1">
                        <div class="year-expariance-wrap">
                            <!-- <h2 class="year-number"><span class="counter">25 </span> </h2> -->
                            <h2 class="counter year-number"><span class="odometer" data-count="25">00</span>
                            </h2>
                            <h3 class="year-title">Years Of <br> experience</h3>
                        </div>
                        <p class="year-para">Business consulting consultants provide expert advice and guida the a
                            businesses to help theme their performance efficiency</p>
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-xl-6 col-xxl-6">
                    <div class="counter-area-right-content">
                        <div class="row g-5">
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="counter-card tmponhover tmp-scroll-trigger tmp-fade-in animation-order-1">
                                    <h3 class="counter counter-title"><span class="odometer" data-count="20">00</span>k+
                                    </h3>
                                    <p class="counter-para">Our Project Complete</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="counter-card tmponhover tmp-scroll-trigger tmp-fade-in animation-order-2">
                                    <h3 class="counter counter-title"><span class="odometer" data-count="10">00</span>k+
                                    </h3>
                                    <p class="counter-para">Our Natural Products</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="counter-card tmponhover tmp-scroll-trigger tmp-fade-in animation-order-3">
                                    <h3 class="counter counter-title"><span class="odometer" data-count="200">00</span>+
                                    </h3>
                                    <p class="counter-para">Clients Reviews</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="counter-card tmponhover tmp-scroll-trigger tmp-fade-in animation-order-4">
                                    <h3 class="counter counter-title"><span class="odometer" data-count="1000">00</span>+
                                    </h3>
                                    <p class="counter-para">our Satisfied Clientd</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Tpm Counter Area End -->

    <!-- tmp skill area start -->
    <div class="tmp-skill-area tmp-section-gapTop">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6">
                    <div class="progress-wrapper">
                        <div class="content">
                            <h2 class="custom-title mb--30 tmp-scroll-trigger tmp-fade-in animation-order-1">
                                Design Skill <span><img src="assets/images/custom-line/custom-line.png" alt="custom-line"></span>
                            </h2>
                            <!-- Start Single Progress Charts -->
                            <div class="progress-charts">
                                <h6 class="heading heading-h6">
                                    PHOTOSHOT</h6>
                                <div class="progress">
                                    <div class="progress-bar wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay=".3s" role="progressbar" style="width: 100%; visibility: visible; animation-duration: 0.5s; animation-delay: 0.3s; animation-name: fadeInLeft;" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                                        <span class="percent-label">100%</span>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Progress Charts -->

                            <!-- Start Single Progress Charts -->
                            <div class="progress-charts">
                                <h6 class="heading heading-h6">
                                    FIGMA</h6>
                                <div class="progress">
                                    <div class="progress-bar wow fadeInLeft" data-wow-duration="0.6s" data-wow-delay=".4s" role="progressbar" style="width: 95%; visibility: visible; animation-duration: 0.6s; animation-delay: 0.4s; animation-name: fadeInLeft;" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                                        <span class="percent-label">95%</span>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Progress Charts -->

                            <!-- Start Single Progress Charts -->
                            <div class="progress-charts">
                                <h6 class="heading heading-h6">
                                    ADOBE XD</h6>
                                <div class="progress">
                                    <div class="progress-bar wow fadeInLeft" data-wow-duration="0.7s" data-wow-delay=".5s" role="progressbar" style="width: 60%; visibility: visible; animation-duration: 0.7s; animation-delay: 0.5s; animation-name: fadeInLeft;" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                                        <span class="percent-label">60%</span>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Progress Charts -->

                            <!-- Start Single Progress Charts -->
                            <div class="progress-charts">
                                <h6 class="heading heading-h6">
                                    ADOBE ILLUSTRATOR</h6>
                                <div class="progress">
                                    <div class="progress-bar wow fadeInLeft" data-wow-duration="0.8s" data-wow-delay=".6s" role="progressbar" style="width: 70%; visibility: visible; animation-duration: 0.8s; animation-delay: 0.6s; animation-name: fadeInLeft;" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                                        <span class="percent-label">70%</span>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Progress Charts -->

                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="progress-wrapper">
                        <div class="content">
                            <h2 class="custom-title mb--30 tmp-scroll-trigger tmp-fade-in animation-order-1">
                                Development Skill <span><img src="assets/images/custom-line/custom-line.png" alt="custom-line"></span>
                            </h2>
                            <!-- Start Single Progress Charts -->
                            <div class="progress-charts">
                                <h6 class="heading heading-h6">
                                    HTML</h6>
                                <div class="progress">
                                    <div class="progress-bar wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay=".3s" role="progressbar" style="width: 100%; visibility: visible; animation-duration: 0.5s; animation-delay: 0.3s; animation-name: fadeInLeft;" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                                        <span class="percent-label">100%</span>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Progress Charts -->

                            <!-- Start Single Progress Charts -->
                            <div class="progress-charts">
                                <h6 class="heading heading-h6">
                                    CSS</h6>
                                <div class="progress">
                                    <div class="progress-bar wow fadeInLeft" data-wow-duration="0.6s" data-wow-delay=".4s" role="progressbar" style="width: 95%; visibility: visible; animation-duration: 0.6s; animation-delay: 0.4s; animation-name: fadeInLeft;" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                                        <span class="percent-label">95%</span>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Progress Charts -->

                            <!-- Start Single Progress Charts -->
                            <div class="progress-charts">
                                <h6 class="heading heading-h6">
                                    Javascript</h6>
                                <div class="progress">
                                    <div class="progress-bar wow fadeInLeft" data-wow-duration="0.7s" data-wow-delay=".5s" role="progressbar" style="width: 60%; visibility: visible; animation-duration: 0.7s; animation-delay: 0.5s; animation-name: fadeInLeft;" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                                        <span class="percent-label">60%</span>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Progress Charts -->

                            <!-- Start Single Progress Charts -->
                            <div class="progress-charts">
                                <h6 class="heading heading-h6">
                                    Wordpress</h6>
                                <div class="progress">
                                    <div class="progress-bar wow fadeInLeft" data-wow-duration="0.8s" data-wow-delay=".6s" role="progressbar" style="width: 70%; visibility: visible; animation-duration: 0.8s; animation-delay: 0.6s; animation-name: fadeInLeft;" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                                        <span class="percent-label">70%</span>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Progress Charts -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- tmp skill area end -->

    <!-- Tpm Latest Service Area Start -->
    <section class="latest-service-area tmp-section-gapTop" id="about">
        <div class="container">
            <div class="section-head mb--50">
                <div class="section-sub-title center-title tmp-scroll-trigger tmp-fade-in animation-order-1">
                    <span class="subtitle">Latest Service</span>
                </div>
                <h2 class="title split-collab tmp-scroll-trigger tmp-fade-in animation-order-2">Inspiring The World One
                    <br> Project
                </h2>
                <p class="description section-sm tmp-scroll-trigger tmp-fade-in animation-order-3"> Business consulting
                    consultants provide expert advice and guida
                    businesses to help them improve their performance, efficiency, and organizational </p>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="service-card-v2 tmponhover tmp-scroll-trigger tmp-fade-in animation-order-1">
                        <h2 class="service-card-num"><span>01.</span>A Portfolio of Creativity</h2>
                        <p class="service-para">Business consulting consultants provide expert advice and guida the a
                            businesses to help theme their performance efficiency</p>
                    </div>
                    <div class="service-card-v2 tmponhover tmp-scroll-trigger tmp-fade-in animation-order-2">
                        <h2 class="service-card-num"><span>02.</span>My Portfolio of Innovation</h2>
                        <p class="service-para">My work is driven by the belief that thoughtful design and strategic planning can empower brands, transform businesses</p>
                    </div>
                    <div class="service-card-v2 tmponhover tmp-scroll-trigger tmp-fade-in animation-order-3">
                        <h2 class="service-card-num"><span>03.</span>A Showcase of My Projects</h2>
                        <p class="service-para">In this portfolio, you’ll find a curated selection of projects that highlight my skills in [Main Areas, e.g., responsive web design</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="service-card-user-image">
                        <img class="tmp-scroll-trigger tmp-zoom-in animation-order-1" src="assets/images/services/latest-services-user-image.png" alt="latest-user-image">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Tpm Latest Service Area End -->

    <!-- Tpm Education Experience Area Start -->
    <section class="education-experience tmp-section-gapTop">
        <div class="container">
            <div class="section-head mb--50">
                <div class="section-sub-title center-title tmp-scroll-trigger tmp-fade-in animation-order-1">
                    <span class="subtitle">Education & Experience</span>
                </div>
                <h2 class="title split-collab tmp-scroll-trigger tmp-fade-in animation-order-2">Empowering Creativity
                    <br> through
                </h2>
                <p class="description section-sm tmp-scroll-trigger tmp-fade-in animation-order-3">Business consulting
                    consultants provide expert advice and guida
                    businesses to help them improve their performance, efficiency, and organizational</p>
            </div>
            <h2 class="custom-title mb-32 tmp-scroll-trigger tmp-fade-in animation-order-1">Education <span><img
                        src="assets/images/custom-line/custom-line.png" alt="custom-line"></span>
            </h2>
            <div class="row g-5">
                <div class="col-lg-6 col-sm-6">
                    <div class="education-experience-card tmponhover tmp-scroll-trigger tmp-fade-in animation-order-1">
                        <h4 class="edu-sub-title">Trainer Marketing</h4>
                        <h2 class="edu-title">2005-2009</h2>
                        <p class="edu-para">A personal portfolio is a curated collection of an individual's professional
                            work, showcasing their skills, experience A personal portfolio.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6">
                    <div class="education-experience-card tmponhover tmp-scroll-trigger tmp-fade-in animation-order-2">
                        <h4 class="edu-sub-title">Assistant Director</h4>
                        <h2 class="edu-title">2010-2014</h2>
                        <p class="edu-para">Each project here showcases my commitment to excellence and adaptability, tailored to meet each client’s unique needs.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6">
                    <div class="education-experience-card tmponhover tmp-scroll-trigger tmp-fade-in animation-order-3">
                        <h4 class="edu-sub-title">Design Assistant</h4>
                        <h2 class="edu-title">2008-2012</h2>
                        <p class="edu-para">I’ve had the privilege of working with various clients, from startups to established companies, helping bring their visions to life.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6">
                    <div class="education-experience-card tmponhover tmp-scroll-trigger tmp-fade-in animation-order-4">
                        <h4 class="edu-sub-title">Design Assistant</h4>
                        <h2 class="edu-title">2008-2012</h2>
                        <p class="edu-para">Each project here showcases my commitment to excellence and adaptability, tailored to meet each client’s unique needs a personal.</p>
                    </div>
                </div>
            </div>
            <div class="experiences-wrapper">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="experiences-wrap-left-content">
                            <h2 class="custom-title mb-32 tmp-scroll-trigger tmp-fade-in animation-order-1">Experiences <span><img
                            src="assets/images/custom-line/custom-line.png" alt="custom-line"></span></h2>

                            <div class="experience-content tmp-scroll-trigger tmp-fade-in animation-order-1">
                                <p class="ex-subtitle">experience</p>
                                <h2 class="ex-name">Soft Tech (2 Years)</h2>
                                <h3 class="ex-title">UI/UX Designer</h3>
                                <p class="ex-para">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                                    desi dolore eu fugiat nulla pariatu Duis aute irure.</p>
                            </div>
                            <div class="experience-content tmp-scroll-trigger tmp-fade-in animation-order-2">
                                <p class="ex-subtitle">experience</p>
                                <h2 class="ex-name">ModernTech (3 Years)</h2>
                                <h3 class="ex-title">App Developer</h3>
                                <p class="ex-para">In this portfolio, you’ll find a curated selection of projects that highlight my skills in [Main Areas, e.g., responsive web design.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="experiences-wrap-right-content">
                            <img class="tmp-scroll-trigger tmp-zoom-in animation-order-1" src="assets/images/experiences/expert-img.jpg" alt="expert-img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Tpm Education Experience Area End -->

    <!-- Tpm Our Supported Company Area Start -->
    <div class="our-supported-company-area tmp-section-gapTop">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
                    <div class="support-company-logo tmp-scroll-trigger tmp-fade-in animation-order-1">
                        <img src="assets/images/our-supported-company/company-logo-1.svg" alt="Reeni - Personal Portfolio HTML Template">
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
                    <div class="support-company-logo tmp-scroll-trigger tmp-fade-in animation-order-2">
                        <img src="assets/images/our-supported-company/company-logo-2.svg" alt="Reeni - Personal Portfolio HTML Template">
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
                    <div class="support-company-logo tmp-scroll-trigger tmp-fade-in animation-order-3">
                        <img src="assets/images/our-supported-company/company-logo-3.svg" alt="Reeni - Personal Portfolio HTML Template">
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
                    <div class="support-company-logo tmp-scroll-trigger tmp-fade-in animation-order-4">
                        <img src="assets/images/our-supported-company/company-logo-4.svg" alt="Reeni - Personal Portfolio HTML Template">
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
                    <div class="support-company-logo tmp-scroll-trigger tmp-fade-in animation-order-5">
                        <img src="assets/images/our-supported-company/company-logo-5.svg" alt="Reeni - Personal Portfolio HTML Template">
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
                    <div class="support-company-logo tmp-scroll-trigger tmp-fade-in animation-order-6">
                        <img src="assets/images/our-supported-company/company-logo-6.svg" alt="Reeni - Personal Portfolio HTML Template">
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
                    <div class="support-company-logo tmp-scroll-trigger tmp-fade-in animation-order-7">
                        <img src="assets/images/our-supported-company/company-logo-7.svg" alt="Reeni - Personal Portfolio HTML Template">
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
                    <div class="support-company-logo tmp-scroll-trigger tmp-fade-in animation-order-8">
                        <img src="assets/images/our-supported-company/company-logo-8.svg" alt="Reeni - Personal Portfolio HTML Template">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Tpm Our Supported Company Area End -->

    <!-- Tpm Latest Portfolio Area Start -->
    <div class="latest-portfolio-area custom-column-grid tmp-section-gapTop" id="portfolio">
        <div class="container">
            <div class="section-head mb--60">
                <div class="section-sub-title center-title tmp-scroll-trigger tmp-fade-in animation-order-1">
                    <span class="subtitle">Latest Portfolio</span>
                </div>
                <h2 class="title split-collab tmp-scroll-trigger tmp-fade-in animation-order-2">Transforming Ideas into
                    <br> Exceptional
                </h2>
                <p class="description section-sm tmp-scroll-trigger tmp-fade-in animation-order-3">Business consulting
                    consultants provide expert advice and guida
                    businesses to help them improve their performance, efficiency, and organizational</p>
            </div>
            <div class="row">
                <div class="col-lg-6 col-sm-6">
                    <div class="latest-portfolio-card tmp-hover-link tmp-scroll-trigger tmp-fade-in animation-order-1">
                        <div class="portfoli-card-img">
                            <div class="img-box v2">
                                <a class="tmp-scroll-trigger tmp-zoom-in animation-order-1" href="project-details.php">
                                    <img class="w-100" src="{{ asset($projects->get(0)?->image ?? 'assets/images/latest-portfolio/portfoli-img-1.jpg') }}" alt="Thumbnail">
                                </a>
                            </div>
                        </div>
                        <div class="portfolio-card-content-wrap">
                            <div class="content-left">
                                <h3 class="portfolio-card-title"><a class="link" href="{{ $projects->get(0)?->url ?? '#' }}">{{ $projects->get(0)?->title ?? 'Digital Transformation Advisors' }}</a></h3>
                                <p class="portfoli-card-para">{{ $projects->get(0)?->category ?? 'Development Coaches' }}</p>
                            </div>
                            <a href="project-details.php" class="tmp-arrow-icon-btn">
                                <div class="btn-inner">
                                    <i class="tmp-icon fa-solid fa-arrow-up-right"></i>
                                    <i class="tmp-icon-bottom fa-solid fa-arrow-up-right"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-sm-6">
                    <div class="latest-portfolio-card tmp-hover-link tmp-scroll-trigger tmp-fade-in animation-order-2">
                        <div class="portfoli-card-img">
                            <div class="img-box v2">
                                <a class="tmp-scroll-trigger tmp-zoom-in animation-order-1" href="project-details.php">
                                    <img class="w-100" src="{{ asset($projects->get(1)?->image ?? 'assets/images/latest-portfolio/portfoli-img-2.jpg') }}" alt="Thumbnail">
                                </a>
                            </div>
                        </div>
                        <div class="portfolio-card-content-wrap">
                            <div class="content-left">
                                <h3 class="portfolio-card-title"><a class="link" href="{{ $projects->get(1)?->url ?? '#' }}">{{ $projects->get(1)?->title ?? 'Thoughtful Product Experience' }}</a></h3>
                                <p class="portfoli-card-para">{{ $projects->get(1)?->category ?? 'Development App' }}</p>
                            </div>
                            <a href="project-details.php" class="tmp-arrow-icon-btn">
                                <div class="btn-inner">
                                    <i class="tmp-icon fa-solid fa-arrow-up-right"></i>
                                    <i class="tmp-icon-bottom fa-solid fa-arrow-up-right"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-sm-6">
                    <div class="latest-portfolio-card tmp-hover-link tmp-scroll-trigger tmp-fade-in animation-order-3">
                        <div class="portfoli-card-img">
                            <div class="img-box v2">
                                <a class="tmp-scroll-trigger tmp-zoom-in animation-order-1" href="project-details.php">
                                    <img class="w-100" src="{{ asset($projects->get(2)?->image ?? 'assets/images/latest-portfolio/portfoli-img-3.jpg') }}" alt="Thumbnail">
                                </a>
                            </div>
                        </div>
                        <div class="portfolio-card-content-wrap">
                            <div class="content-left">
                                <h3 class="portfolio-card-title"><a class="link" href="project-details.php">In this portfolio, you’ll find a curated selection</a></h3>
                                <p class="portfoli-card-para">Web Design</p>
                            </div>
                            <a href="project-details.php" class="tmp-arrow-icon-btn">
                                <div class="btn-inner">
                                    <i class="tmp-icon fa-solid fa-arrow-up-right"></i>
                                    <i class="tmp-icon-bottom fa-solid fa-arrow-up-right"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-sm-6">
                    <div class="latest-portfolio-card tmp-hover-link tmp-scroll-trigger tmp-fade-in animation-order-4">
                        <div class="portfoli-card-img">
                            <div class="img-box v2">
                                <a class="tmp-scroll-trigger tmp-zoom-in animation-order-1" href="project-details.php">
                                    <img class="w-100" src="{{ asset($projects->get(3)?->image ?? 'assets/images/latest-portfolio/portfoli-img-4.jpg') }}" alt="Thumbnail">
                                </a>
                            </div>
                        </div>
                        <div class="portfolio-card-content-wrap">
                            <div class="content-left">
                                <h3 class="portfolio-card-title"><a class="link" href="project-details.php">I’ve had the privilege of working with various</a></h3>
                                <p class="portfoli-card-para">{{ $projects->get(3)?->category ?? 'App Development' }}</p>
                            </div>
                            <a href="project-details.php" class="tmp-arrow-icon-btn">
                                <div class="btn-inner">
                                    <i class="tmp-icon fa-solid fa-arrow-up-right"></i>
                                    <i class="tmp-icon-bottom fa-solid fa-arrow-up-right"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Tpm Latest Portfolio Area End -->

    <!-- Tpm My Skill Area Start -->
    <section class="my-skill tmp-section-gapTop">
        <div class="container">
            <div class="section-head text-align-left mb--50">
                <div class="section-sub-title tmp-scroll-trigger tmp-fade-in animation-order-1">
                    <span class="subtitle">My Skill</span>
                </div>
                <h2 class="title split-collab tmp-scroll-trigger tmp-fade-in animation-order-2">Elevated Designs
                    Personalized <br> the best Experiences</h2>
            </div>
            <div class="services-widget v1">
                <div class="service-item current tmp-scroll-trigger tmp-fade-in animation-order-1">
                    <div class="my-skill-card">
                        <div class="card-icon">
                            <i class="fa-light fa-building-columns"></i>
                        </div>
                        <div class="card-title">
                            <h3 class="main-title">Ui/visual Design</h3>
                            <p class="sub-title">21 Done</p>
                        </div>
                        <p class="card-para">My work is driven by the belief that thoughtful design and strategic planning can empower brands strategic planning can empower brands</p>
                        <a href="#" class="read-more-btn">Read More <span class="read-more-icon"><i
                        class="fa-solid fa-angle-right"></i></span></a>
                    </div>
                    <button class="service-link modal-popup"></button>
                </div>
                <div class="service-item tmp-scroll-trigger tmp-fade-in animation-order-2">
                    <div class="my-skill-card">
                        <div class="card-icon">
                            <i class="fa-light fa-calendar"></i>
                        </div>
                        <div class="card-title">
                            <h3 class="main-title">Ui/visual Design</h3>
                            <p class="sub-title">21 Done</p>
                        </div>
                        <p class="card-para">In this portfolio, you’ll find a curated selection of projects that highlight my skills in [Main Areas, e.g., responsive web design</p>
                        <a href="#" class="read-more-btn">Read More <span class="read-more-icon"><i
                        class="fa-solid fa-angle-right"></i></span></a>
                    </div>
                    <button class="service-link modal-popup"></button>
                </div>
                <div class="service-item tmp-scroll-trigger tmp-fade-in animation-order-3">
                    <div class="my-skill-card">
                        <div class="card-icon">
                            <i class="fa-light fa-pen-nib"></i>
                        </div>
                        <div class="card-title">
                            <h3 class="main-title">Motion Design</h3>
                            <p class="sub-title">20 Done</p>
                        </div>
                        <p class="card-para">Each project here showcases my commitment to excellence and adaptability, tailored to meet each client’s unique needs</p>
                        <a href="#" class="read-more-btn">Read More <span class="read-more-icon"><i
                        class="fa-solid fa-angle-right"></i></span></a>
                    </div>
                    <button class="service-link modal-popup"></button>
                </div>
                <div class="active-bg wow fadeInUp mleave"></div>
            </div>
        </div>
    </section>
    <!-- Tpm My Skill Area End -->

    <!-- Tpm Testimonial Area Start -->
    <section class="testimonial tmp-section-gapTop">
        <div class="testimonial-wrapper">
            <div class="container">
                <div class="swiper testimonial-swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="testimonial-card">
                                <div class="card-content-wrap">
                                    <h2 class="text-doc">Working with themespark was an absolute pleasure! They understood my vision immediately and brought it to life even better than I’d imagined.</h2>
                                    <h3 class="card-title">Cameron Williamson</h3>
                                    <p class="card-para">Ui/Ux Designer</p>
                                    <div class="testimonital-icon">
                                        <img src="assets/images/testimonial/testimonial-icon.svg" alt="testimonial-icon">
                                    </div>
                                </div>
                                <div class="testimonial-card-img">
                                    <img class="tmp-scroll-trigger tmp-zoom-in animation-order-1" src="assets/images/testimonial/bg-image-1png.png" alt="bg-image">
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="testimonial-card">
                                <div class="card-content-wrap">
                                    <h2 class="text-doc">ThemesPark is incredibly talented and detail-oriented. They took the time to understand my brand and created something truly unique</h2>
                                    <h3 class="card-title">Cameron Williamson</h3>
                                    <p class="card-para">Ui/Ux Designer</p>
                                    <div class="testimonital-icon">
                                        <img src="assets/images/testimonial/testimonial-icon.svg" alt="testimonial-icon">
                                    </div>
                                </div>
                                <div class="testimonial-card-img">
                                    <img class="tmp-scroll-trigger tmp-zoom-in animation-order-2" src="assets/images/testimonial/bg-image-2.png" alt="bg-image">
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="testimonial-card">
                                <div class="card-content-wrap">
                                    <h2 class="text-doc">A personal portfolio is a curated collection of an individual's
                                        professional work, showcasing their skills, experience, and achievements</h2>
                                    <h3 class="card-title">Cameron Williamson</h3>
                                    <p class="card-para">Ui/Ux Designer</p>
                                    <div class="testimonital-icon">
                                        <img src="assets/images/testimonial/testimonial-icon.svg" alt="testimonial-icon">
                                    </div>
                                </div>
                                <div class="testimonial-card-img">
                                    <img class="tmp-scroll-trigger tmp-zoom-in animation-order-3" src="assets/images/testimonial/bg-image-1png.png" alt="bg-image">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- </div> -->
                <div class="testimonial-btn-next-prev">
                    <div class="swiper-button-next"><i class="fa-solid fa-arrow-right"></i></div>
                    <div class="swiper-button-prev"><i class="fa-solid fa-arrow-left"></i></div>
                </div>
            </div>
        </div>
    </section>
    <!-- Tpm Testimonial Area End -->

    <!-- Tpm Get In touch start -->
    <section class="get-in-touch-area tmp-section-gapTop">
        <div class="container">
            <div class="contact-get-in-touch-wrap" id="contact">
                <div class="get-in-touch-wrapper tmponhover">
                    <div class="row g-5 align-items-center">
                        <div class="col-lg-5">
                            <div class="section-head text-align-left">
                                <div class="section-sub-title tmp-scroll-trigger tmp-fade-in animation-order-1">
                                    <span class="subtitle">GET IN TOUCH</span>
                                </div>
                                <h2 class="title split-collab tmp-scroll-trigger tmp-fade-in animation-order-2">Elevate your brand with Me </h2>
                                <p class="description tmp-scroll-trigger tmp-fade-in animation-order-3">ished fact that a reader will be
                                    distrol acted bioiiy desig
                                    ished fact that a reader will acted ished fact that a reader will be distrol
                                    acted </p>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="contact-inner">
                                <div class="contact-form">
                                    <div id="form-messages" class="error"></div>
                                    @if(session('contact_success'))
                                        <div class="alert alert-success">{{ session('contact_success') }}</div>
                                    @endif
                                    @if($errors->any())
                                        <div class="alert alert-danger">Please check the form and try again.</div>
                                    @endif
                                    <form class="tmp-dynamic-form" id="contact-form" method="POST" action="{{ route('contact.store') }}">
                                        @csrf
                                        <div class="contact-form-wrapper row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <input class="input-field" name="name" id="contact-name" value="{{ old('name') }}" placeholder="Your Name" type="text" required>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <input class="input-field" name="phone" id="contact-phone" value="{{ old('phone') }}" placeholder="Phone Number" type="tel">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <input class="input-field" id="contact-email" name="email" value="{{ old('email') }}" placeholder="Your Email" type="email" required>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <input class="input-field" type="text" id="subject" name="subject" value="{{ old('subject') }}" placeholder="Subject">
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <textarea class="input-field" placeholder="Your Message" name="message" id="contact-message" required>{{ old('message') }}</textarea>
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="tmp-button-here">
                                                    <button class="tmp-btn hover-icon-reverse radius-round w-100" name="submit" type="submit" id="submit">
                                                        <span class="icon-reverse-wrapper">
                                        <span class="btn-text">Appointment Now</span>
                                                        <span class="btn-icon"><i class="fa-sharp fa-regular fa-arrow-right"></i></span>
                                                        <span class="btn-icon"><i class="fa-sharp fa-regular fa-arrow-right"></i></span>
                                                        </span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Tpm Get In touch End -->



    <!-- Tpm Blog and news Area Start -->
    <section class="blog-and-news-are tmp-section-gap" id="blog">
        <div class="container">
            <div class="section-head mb--60">
                <div class="section-sub-title center-title tmp-scroll-trigger tmp-fade-in animation-order-1">
                    <span class="subtitle">Blog and news</span>
                </div>
                <h2 class="title split-collab tmp-scroll-trigger tmp-fade-in animation-order-2">Elevating Personal
                    Branding the <br> through Powerful Portfolios</h2>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog-card tmp-hover-link image-box-hover tmp-scroll-trigger tmp-fade-in animation-order-1">
                        <div class="img-box">
                            <a href="blog-details.php">
                                <img class="w-100" src="{{ asset($blogPosts->get(0)?->image ?? 'assets/images/blog/blog-img-1.jpg') }}" alt="Blog Thumbnail">
                            </a>
                            <ul class="blog-tags">
                                <li><span class="tag-icon"><i class="fa-regular fa-user"></i></span>{{ $blogPosts->get(0)?->author ?? 'Admin' }}</li>
                                <li><span class="tag-icon"><i class="fa-solid fa-calendar-days"></i></span>April 10</li>
                            </ul>
                        </div>
                        <div class="blog-content-wrap">
                            <h3 class="blog-title"><a class="link" href="blog-details.php">Inspiring the World, One
                                    Project at a
                                    Time for the
                                    man</a></h3>
                            <div class="more-btn tmp-link-animation">
                                <a href="blog-details.php" class="read-more-btn">Read More <span class="read-more-icon"><i
                            class="fa-solid fa-angle-right"></i></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog-card tmp-hover-link image-box-hover tmp-scroll-trigger tmp-fade-in animation-order-2">
                        <div class="img-box">
                            <a href="blog-details.php">
                                <img class="w-100" src="{{ asset($blogPosts->get(1)?->image ?? 'assets/images/blog/blog-img-2.jpg') }}" alt="Blog Thumbnail">
                            </a>
                            <ul class="blog-tags">
                                <li><span class="tag-icon"><i class="fa-regular fa-user"></i></span>Mesbah</li>
                                <li><span class="tag-icon"><i class="fa-solid fa-calendar-days"></i></span>April 10</li>
                            </ul>
                        </div>
                        <div class="blog-content-wrap">
                            <h3 class="blog-title"><a class="link" href="blog-details.php">Let’s bring your ideas to life! Contact me, and let’s</a></h3>
                            <div class="more-btn tmp-link-animation">
                                <a href="blog-details.php" class="read-more-btn">Read More <span class="read-more-icon"><i
                            class="fa-solid fa-angle-right"></i></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog-card tmp-hover-link image-box-hover tmp-scroll-trigger tmp-fade-in animation-order-3">
                        <div class="img-box">
                            <a href="blog-details.php">
                                <img class="w-100" src="{{ asset($blogPosts->get(2)?->image ?? 'assets/images/blog/blog-img-3.jpg') }}" alt="Blog Thumbnail">
                            </a>
                            <ul class="blog-tags">
                                <li><span class="tag-icon"><i class="fa-regular fa-user"></i></span>Mesbah</li>
                                <li><span class="tag-icon"><i class="fa-solid fa-calendar-days"></i></span>April 10</li>
                            </ul>
                        </div>
                        <div class="blog-content-wrap">
                            <h3 class="blog-title"><a class="link" href="#">{{ $blogPosts->get(2)?->title ?? 'Each one showcases my approach and dedication' }}</a></h3>
                            <div class="more-btn tmp-link-animation">
                                <a href="blog-details.php" class="read-more-btn">Read More <span class="read-more-icon"><i
                            class="fa-solid fa-angle-right"></i></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Tpm Blog and news Area End -->





    <!-- Start Footer Area  -->
    <!-- Start Footer Area  -->
    <footer class="footer-area footer-style-one-wrapper bg-color-footer bg_images tmp-section-gap">
        <div class="container">
            <div class="footer-main footer-style-one">
                <div class="row g-5">
                    <div class="col-lg-5 col-md-6">
                        <div class="single-footer-wrapper border-right mr--20">
                            <div class="logo">
                                <a href="{{ route('home') }}">
                                    <img src="{{ $logoUrl }}" alt="{{ $siteName }} logo">
                                </a>
                            </div>
                            <p class="description">{{ $siteSetting?->footer_text ?? 'Get Ready To Create Great' }}</p>
                            <form action="#" class="newsletter-form-1 mt--40">
                                <input type="email" placeholder="Email Adress">
                                <span class="form-icon"><i class="fa-regular fa-envelope"></i></span>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-footer-wrapper quick-link-wrap">
                            <h5 class="ft-title">Quick Link</h5>
                            <ul class="ft-link tmp-link-animation">
                                @foreach($navigationItems as $item)
                                    <li><a href="{{ $item->url }}" target="{{ $item->target }}" @if($item->target === '_blank') rel="noopener noreferrer" @endif>{{ $item->label }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="single-footer-wrapper contact-wrap">
                            <h5 class="ft-title">Contact </h5>
                            <ul class="ft-link tmp-link-animation">
                                <li><span class="ft-icon"><i class="fa-solid fa-envelope"></i></span><a href="mailto:{{ $siteSetting?->email }}">{{ $siteSetting?->email ?? 'Not provided' }}</a></li>
                                <li><span class="ft-icon"><i class="fa-solid fa-location-dot"></i></span>{{ $siteSetting?->address ?? 'Not provided' }}</li>
                                <li><span class="ft-icon"><i class="fa-solid fa-phone"></i></span><a href="tel:{{ preg_replace('/[^+0-9]/', '', $siteSetting?->phone ?? '') }}">{{ $siteSetting?->phone ?? 'Not provided' }}</a></li>
                            </ul>
                            <div class="social-link footer">
                                @include('partials.social-links')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div class="copyright-area-one">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-wrapper">
                        <p class="copy-right-para tmp-link-animation"> ©<a href="https://themeforest.net/user/inversweb/portfolio" target="_blank">InversWeb </a>
                            <script>
                                document.write(new Date().getFullYear())
                            </script> | All Rights Reserved
                        </p>
                        <ul class="tmp-link-animation">
                            <li><a href="#">Trams & Condition</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#contact">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer Area  -->
    <!-- End Footer Area  -->


    <!-- ready chatting option via email -->
    <div class="ready-chatting-option tmp-ready-chat">
        <input type="checkbox" id="click">
        <label for="click">
            <i class="fab fa-facebook-messenger"></i>
            <i class="fas fa-times"></i>
        </label>
        <div class="wrapper">
            <div class="head-text">
                Let's chat with me? - Online
            </div>
            <div class="chat-box">
                <div class="desc-text">
                    Please fill out the form below to start chatting with me directly.
                </div>
                <form class="tmp-dynamic-form" action="#">
                    <div class="field">
                        <input class="input-field" name="name" placeholder="Your Name" type="text" required>
                    </div>
                    <div class="field">
                        <input class="input-field" name="email" placeholder="Your Email" type="email" required>
                    </div>
                    <div class="field textarea">
                        <textarea class="input-field" placeholder="Your Message" name="message" required></textarea>
                    </div>
                    <div class="field">
                        <button name="submit" type="submit">Send Message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- ready chatting option via email end -->
    <!-- progress area start -->
    <div class="scrollToTop" style="display: block;">
        <div class="arrowUp">
            <i class="fa-light fa-arrow-up"></i>
        </div>
        <div class="water" style="transform: translate(0px, 87%);">
            <svg viewBox="0 0 560 20" class="water_wave water_wave_back">
                <use xlink:href="#wave"></use>
            </svg>
            <svg viewBox="0 0 560 20" class="water_wave water_wave_front">
                <use xlink:href="#wave"></use>
            </svg>
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 560 20" style="display: none;">
                <symbol id="wave">
                    <path d="M420,20c21.5-0.4,38.8-2.5,51.1-4.5c13.4-2.2,26.5-5.2,27.3-5.4C514,6.5,518,4.7,528.5,2.7c7.1-1.3,17.9-2.8,31.5-2.7c0,0,0,0,0,0v20H420z" fill="#"></path>
                    <path d="M420,20c-21.5-0.4-38.8-2.5-51.1-4.5c-13.4-2.2-26.5-5.2-27.3-5.4C326,6.5,322,4.7,311.5,2.7C304.3,1.4,293.6-0.1,280,0c0,0,0,0,0,0v20H420z" fill="#"></path>
                    <path d="M140,20c21.5-0.4,38.8-2.5,51.1-4.5c13.4-2.2,26.5-5.2,27.3-5.4C234,6.5,238,4.7,248.5,2.7c7.1-1.3,17.9-2.8,31.5-2.7c0,0,0,0,0,0v20H140z" fill="#"></path>
                    <path d="M140,20c-21.5-0.4-38.8-2.5-51.1-4.5c-13.4-2.2-26.5-5.2-27.3-5.4C46,6.5,42,4.7,31.5,2.7C24.3,1.4,13.6-0.1,0,0c0,0,0,0,0,0l0,20H140z" fill="#"></path>
                </symbol>
            </svg>

        </div>
    </div>
    <!-- progress area end -->
    <!-- <div class="tmp-right-demo">
    <button class="demo-button">
        <p class="mb--0">48</p>
        <span class="text">Demos</span>
    </button>
</div> -->






                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/vendor/jquery.js"></script>
    <script src="assets/js/vendor/jquery-ui.min.js"></script>
    <script src="assets/js/vendor/waypoints.min.js"></script>

    <script src="assets/js/plugins/odometer.js"></script>
    <script src="assets/js/vendor/appear.js"></script>


    <script src="assets/js/vendor/jquery-one-page-nav.js"></script>
    <script src="assets/js/plugins/swiper.js"></script>

    <script src="assets/js/plugins/gsap.js"></script>
    <script src="assets/js/plugins/splittext.js"></script>
    <script src="assets/js/plugins/scrolltigger.js"></script>
    <script src="assets/js/plugins/scrolltoplugins.js"></script>
    <script src="assets/js/plugins/smoothscroll.js"></script>
    <!-- bootstrap Js-->
    <script src="assets/js/vendor/bootstrap.min.js"></script>
    <script src="assets/js/vendor/waw.js"></script>
    <script src="assets/js/plugins/isotop.js"></script>
    <script src="assets/js/plugins/animation.js"></script>
    <script src="assets/js/plugins/contact.form.js"></script>
    <script src="assets/js/vendor/backtop.js"></script>
    <script src="assets/js/plugins/text-type.js"></script>
    <!-- custom Js -->
    <script src="assets/js/main.js"></script>
</body>
</html>
