
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Fitmas - Gym & Fitness HTML Template</title>
    <meta name="description" content="Fitmas - Gym & Fitness HTML Template">
    <meta name="keywords" content="Fitmas - Gym & Fitness HTML Template">
    <meta name="robots" content="INDEX,FOLLOW">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{ asset('css/style3.css') }}">
    <!-- Favicons - Place favicon.ico in the root directory -->
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.min.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEJ03RbbkQgs2hhXAR5zV6b1usdfvI0r27OkSH9Yk0jA0p5TKw0e5MX0cBXwD" crossorigin="anonymous">

    <!-- Bootstrap JS (Optional, for interactive components like dropdowns, modals, etc.) -->


    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicons/favicon.png') }}">
    <link rel="manifest" href="{{ asset('assets/img/favicons/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('assets/img/favicons/ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">

    <!--==============================
    Google Fonts
    ============================== -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;600;700;800&amp;family=Kumbh+Sans:wght@300;400;500;600;700&amp;display=swap"
        rel="stylesheet">

    <!--==============================
    All CSS File
    ============================== -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>

    <!--********************************
    Code Start From Here
    ******************************** -->

    <!--==============================
    Preloader
    ==============================-->
    <div class="preloader ">
        <div class="preloader-inner">
            <span class="loader"></span>
        </div>
    </div>

    <div class="popup-search-box">
        <button class="searchClose"><i class="fal fa-times"></i></button>
        <form action="#">
            <input type="text" placeholder="Search Here..">
            <button type="submit"><i class="fal fa-search"></i></button>
        </form>
    </div>

    <div class="sidemenu-wrapper">
        <div class="sidemenu-content">
            <button class="closeButton sideMenuCls"><i class="far fa-times"></i></button>
            <div class="widget footer-widget">
                <div class="widget-about">
                    <div class="footer-logo">
                        <a href="index.html"><img src="{{ asset('assets/img/logo-white.svg') }}" alt="Fitmas"></a>
                    </div>
                    <p class="about-text">A gym, also known as a fitness center or health club, is a facility dedicated
                        to physical fitness and exercise gyms and typically offer a range</p>
                    <div class="social-btn style2">
                        <a href="https://www.facebook.com/"><i class="fab fa-facebook"></i></a>
                        <a href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
                        <a href="https://pinterest.com/"><i class="fab fa-pinterest-p"></i></a>
                        <a href="https://instagram.com/"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--==============================
    Mobile Menu
    ============================== -->
    <div class="mobile-menu-wrapper">
        <div class="mobile-menu-area text-center">
            <button class="menu-toggle"><i class="fal fa-times"></i></button>
            <div class="mobile-logo">
                <a href="index.html"><img src="{{ asset('assets/img/logo.svg') }}" alt="Fitmas"></a>
            </div>
            <div class="mobile-menu">
                <ul>
                    <li class="menu-item-has-children">
                        <a href="{{ route('home.index') }}">Home <i class="fa fa-house-user"></i></a>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="{{ route('products.index') }}">Gym Equipments <i class="fa fa-file"></i></a>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="#">Project <i class="fa fa-project-diagram"></i></a>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="#">Service <i class="fa fa-cogs"></i></a>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="#">Blog <i class="fa fa-blog"></i></a>
                    </li>
                    <li>
                        <a href="contact.html">Contact <i class="fa fa-phone-alt"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!--==============================
    Header Area
    ==============================-->
    <header class="nav-header header-layout1">
        <div class="header-top d-lg-block d-none">
            <div class="container-fluid">
                <div class="row justify-content-center justify-content-lg-between align-items-center gy-2">
                </div>
                <div class="col-auto">
                </div>
            </div>
        </div>
        <div class="sticky-wrapper">
            <!-- Main Menu Area -->
            <div class="menu-area">
                <div class="container-fluid">
                    <div class="row align-items-center justify-content-lg-start justify-content-between">
                        <div class="col-auto">
                            <div class="header-logo">
                                <a href="index.html"><img src="{{ asset('assets/img/logo.svg') }}"
                                        alt="logo"></a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <nav class="main-menu d-none d-lg-inline-block">
                                <ul>
                                    <li>
                                        <a href="{{ route('home.index') }}"><i class="fa fa-home"></i> Home</a>
                                    </li>
                                    <li>
                                        <a href="about.html"><i class="fa fa-info-circle"></i> About</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-cogs"></i> Service</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('products.index') }}"><i class="fa fa-file"></i> Gym Equipments</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('home.index') }}"><i class="fa fa-blog"></i> Blog</a>
                                    </li>
                                    <li>
                                        <a href="contact.html"><i class="fa fa-phone-alt"></i> Contact</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>


