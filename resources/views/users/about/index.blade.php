@include ('components.layout3')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

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
                    <a href="index.html"><img src="{{ asset('assets/img/logo-white.svg') }}" alt="Golden Fitness"></a>
                </div>
                <p class="about-text">A gym, also known as a fitness center or health club, is a facility dedicated to
                    physical fitness and exercise gyms and typically offer a range</p>
                <div class="social-btn style2">
                    <a href="https://www.facebook.com/"><i class="fab fa-facebook"></i></a>
                    <a href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
                    <a href="https://pinterest.com/"><i class="fab fa-pinterest-p"></i></a>
                    <a href="https://instagram.com/"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="widget widget_nav_menu footer-widget">
            <h3 class="widget_title">Quick Links</h3>
            <ul class="menu">
                <li><a href="about.html">About Us</a></li>
                <li><a href="project-details.html">Our Mission</a></li>
                <li><a href="team.html">Meet The Teams</a></li>
                <li><a href="project.html">Our Projects</a></li>
                <li><a href="contact.html">Contact Us</a></li>
            </ul>
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
            <a href="index.html"><img src="{{ asset('assets/img/logo.svg') }}" alt="Golden Fitness"></a>
        </div>
        <div class="mobile-menu">
            <ul>
                <li class="menu-item-has-children">
                    <a href="#">Home</a>
                    <ul class="sub-menu">
                        <li>
                            <a href="index.html">Home 01</a>
                        </li>
                        <li>
                            <a href="home-2.html">Home 02</a>
                        </li>
                        <li>
                            <a href="home-3.html">Home 03</a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item-has-children">
                    <a href="#">Pages</a>
                    <ul class="sub-menu">
                        <li><a href="team.html">Team Page</a></li>
                        <li><a href="team-2.html">Team Page 02</a></li>
                        <li><a href="team-details.html">Team Details</a></li>
                        <li><a href="gallery.html">Gallery Page</a></li>
                        <li><a href="gallery-2.html">Gallery Page 02</a></li>
                        <li><a href="project.html">Project Page</a></li>
                        <li><a href="project-details.html">Project Details</a></li>
                        <li><a href="shop.html">Shop Page</a></li>
                        <li><a href="shop-details.html">Shop Details</a></li>
                        <li><a href="pricing.html">Pricing Page</a></li>
                        <li><a href="error.html">Error Page</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children">
                    <a href="#">Project</a>
                    <ul class="sub-menu">
                        <li><a href="project.html">Projects</a></li>
                        <li><a href="project-details.html">Project Details</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children">
                    <a href="#">Service</a>
                    <ul class="sub-menu">
                        <li><a href="service.html">Service</a></li>
                        <li><a href="service-details.html">Service Details</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children">
                    <a href="#">Blog</a>
                    <ul class="sub-menu">
                        <li><a href="blog.html">Blog</a></li>
                        <li><a href="blog-2.html">Blog 02</a></li>
                        <li><a href="blog-details.html">Blog Details</a></li>
                    </ul>
                </li>
                <li>
                    <a href="contact.html">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!--==============================
 Header Area
    ==============================-->


<!--==============================
    Breadcumb
    ============================== -->
<div class="breadcumb-wrapper" data-bg-src="{{ asset('assets/img/bg/breadcrumb-bg.png') }}">
    <!-- bg animated image/ -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcumb-content">
                    <h1 class="breadcumb-title">About Us</h1>
                    <ul class="breadcumb-menu">
                        <li><a href="index.html">HOME</a></li>
                        <li class="active">ABOUT US</li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>

<!--==============================
    About Area
    ==============================-->
<div class="space">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 order-lg-2 text-lg-end">
                <div class="about-thumb mb-5 mb-lg-0">
                    <img class="about-img-1" src="{{ asset('assets/img/hero/hero_bg_5_5.jpg') }}" alt="img">
                    <img class="about-img-2 jump" src="{{ asset('assets/img/normal/about_1-2.png') }}"
                        alt="img">
                </div>
            </div>
            <div class="col-lg-6 order-lg-1">
                <div class="about-content-wrap">
                    <div class="title-area mb-0">
                        <span class="sub-title">More About Us</span>
                        <h2 class="sec-title">Unlock Your Full Potential,
                            Achieve Your Goals.</h2>
                        <p class="sec-text">Welcome to Golden Fitness. your ultimate destination for achieving your
                            fitness
                            goals. We understand the importance of leading a healthy lifestyle and provide a top-notch
                            fitness facility to support you in your fitness journey.
                        </p>
                        <div class="about-tab-1">
                            <div class="filter-menu-active">
                                <button data-filter=".cat1" class="active" type="button">Our Mission</button>
                                <button data-filter=".cat2" type="button">Our Vision</button>
                                <button data-filter=".cat3" type="button">Our Goal</button>
                            </div>
                            <div class="filter-active-cat1">
                                <div class="filter-item cat1">
                                    <div class="about-tab-icon">
                                        <img src="{{ asset('assets/img/icon/about-icon.svg') }}" alt="img">
                                    </div>
                                    <p class="about-tab-text">Gyms play a vital role in promoting an active and healthy
                                        lifestyle. They provide a supportive and motivating environment for individuals
                                        to engage in regular physical activity.</p>
                                </div>
                                <div class="filter-item cat2">
                                    <div class="about-tab-icon">
                                        <img src="{{ asset('assets/img/icon/about-icon.svg') }}" alt="img">
                                    </div>
                                    <p class="about-tab-text">Gyms play a vital role in promoting an active and healthy
                                        lifestyle. They provide a supportive and motivating environment for individuals
                                        to engage in regular physical activity.</p>
                                </div>
                                <div class="filter-item cat3">
                                    <div class="about-tab-icon">
                                        <img src="{{ asset('assets/img/icon/about-icon.svg') }}" alt="img">
                                    </div>
                                    <p class="about-tab-text">Gyms play a vital role in promoting an active and healthy
                                        lifestyle. They provide a supportive and motivating environment for individuals
                                        to engage in regular physical activity.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="btn-wrap mt-40">
                        <a href="about.html" class="btn">Make Appointment</a>
                        <div class="about-info-wrap">
                            <div class="icon"><i class="fas fa-phone-volume"></i></div>
                            <div class="details">
                                <p class="about-info-title">Need Help?</p>
                                <a class="about-info-link" href="tel:+25825692582">(+258) 2569 2582</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--==============================
    Service Area 02
    ==============================-->
<div class="service-area-2 space-bottom overflow-hidden">
    <div class="container">
        <div class="title-area text-center">
            <span class="sub-title">Our Services</span>
            <h2 class="sec-title">Service We Provide</h2>
        </div>
    </div>
    <div class="container">
        <div class="row global-carousel service-slider-2 slider-shadow" data-slide-show="3" data-ml-slide-show="3"
            data-lg-slide-show="3" data-md-slide-show="2" data-sm-slide-show="1" data-xs-slide-show="1"
            data-dots="false">
            <div class="col-lg-4 col-md-6">
                <div class="service-card style2">
                    <div class="service-card_icon">
                        <img src="{{ asset('assets/img/icon/service-icon_2-1.svg') }}" alt="img">
                    </div>
                    <div class="service-card_content">
                        <h4 class="service-card_title h5"><a href="service-details.html">Gym Fitness Class</a></h4>
                        <p class="service-card_text">High-intensity workouts that alternate between intense bursts of
                            exercise and
                            short recovery periods...</p>
                        <a href="service-details.html" class="link-btn" tabindex="0"><i
                                class="fas fa-arrow-right"></i> Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="service-card style2">
                    <div class="service-card_icon">
                        <img src="{{ asset('assets/img/icon/service-icon_2-2.svg') }}" alt="img">
                    </div>
                    <div class="service-card_content">
                        <h4 class="service-card_title h5"><a href="service-details.html">Power Lifting</a></h4>
                        <p class="service-card_text">High-intensity workouts that alternate between intense bursts of
                            exercise and
                            short recovery periods...</p>
                        <a href="service-details.html" class="link-btn" tabindex="0"><i
                                class="fas fa-arrow-right"></i> Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="service-card style2">
                    <div class="service-card_icon">
                        <img src="{{ asset('assets/img/icon/service-icon_2-3.svg') }}" alt="img">
                    </div>
                    <div class="service-card_content">
                        <h4 class="service-card_title h5"><a href="service-details.html">Body Building</a></h4>
                        <p class="service-card_text">High-intensity workouts that alternate between intense bursts of
                            exercise and
                            short recovery periods...</p>
                        <a href="service-details.html" class="link-btn" tabindex="0"><i
                                class="fas fa-arrow-right"></i> Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="service-card style2">
                    <div class="service-card_icon">
                        <img src="{{ asset('assets/img/icon/service-icon_2-1.svg') }}" alt="img">
                    </div>
                    <div class="service-card_content">
                        <h4 class="service-card_title h5"><a href="service-details.html">Gym Fitness Class</a></h4>
                        <p class="service-card_text">High-intensity workouts that alternate between intense bursts of
                            exercise and
                            short recovery periods...</p>
                        <a href="service-details.html" class="link-btn" tabindex="0"><i
                                class="fas fa-arrow-right"></i> Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="service-card style2">
                    <div class="service-card_icon">
                        <img src="{{ asset('assets/img/icon/service-icon_2-2.svg') }}" alt="img">
                    </div>
                    <div class="service-card_content">
                        <h4 class="service-card_title h5"><a href="service-details.html">Power Lifting</a></h4>
                        <p class="service-card_text">High-intensity workouts that alternate between intense bursts of
                            exercise and
                            short recovery periods...</p>
                        <a href="service-details.html" class="link-btn" tabindex="0"><i
                                class="fas fa-arrow-right"></i> Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="service-card style2">
                    <div class="service-card_icon">
                        <img src="{{ asset('assets/img/icon/service-icon_2-3.svg') }}" alt="img">
                    </div>
                    <div class="service-card_content">
                        <h4 class="service-card_title h5"><a href="service-details.html">Body Building</a></h4>
                        <p class="service-card_text">High-intensity workouts that alternate between intense bursts of
                            exercise and
                            short recovery periods...</p>
                        <a href="service-details.html" class="link-btn" tabindex="0"><i
                                class="fas fa-arrow-right"></i> Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--==============================
    Cta Area
    ==============================-->
<section class="cta-area space" data-bg-src="{{ asset('assets/img/bg/cta-bg1.png') }}">
    <div class="container">
        <div class="row justify-content-lg-end justify-content-center">
            <div class="col-xl-6 col-lg-8 col-md-10">
                <div class="cta-wrap text-center text-lg-start">
                    <div class="title-area">
                        <span class="sub-title">Make An Appointment</span>
                        <h2 class="sec-title text-white">Get a Free Consultancy
                            Right Now Here!</h2>
                    </div>
                    <div class="btn-wrap mt-40">
                        <a href="about.html" class="btn style2">Make Appointment</a>
                        <div class="about-info-wrap style3">
                            <div class="icon"><i class="fas fa-phone-volume"></i></div>
                            <div class="details">
                                <p class="about-info-title text-white">Need Help?</p>
                                <a class="about-info-link" href="tel:+25825692582">(+258) 2569 2582</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--==============================
    Team Area
    ==============================-->
<div class="team-area-1 space">
    <div class="container">
        <div class="title-area text-center">
            <span class="sub-title">Our Trainer</span>
            <h2 class="sec-title">Meet Our Amazing Team</h2>
        </div>
        <div class="row global-carousel team-slider-1 slider-shadow" data-slide-show="4" data-ml-slide-show="4"
            data-lg-slide-show="3" data-md-slide-show="2" data-sm-slide-show="1" data-xs-slide-show="1"
            data-center-mode="true">
            <div class="col-lg-4 col-md-6">
                <div class="team-card">
                    <div class="team-card_img">
                        <img src="{{ asset('assets/img/team/team-1.png') }}" alt="img">
                    </div>
                    <div class="team-card_content">
                        <h4 class="team-card_title"><a href="team-details.html">George Thomas</a>
                        </h4>
                        <span class="team-card_desig">CEO/Founder</span>
                        <div class="social-btn">
                            <a href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
                            <a href="https://linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                            <a href="https://www.discord.com/"><i class="fab fa-discord"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="team-card">
                    <div class="team-card_img">
                        <img src="{{ asset('assets/img/team/team-2.png') }}" alt="img">
                    </div>
                    <div class="team-card_content">
                        <h4 class="team-card_title"><a href="team-details.html">Mike Johnson</a>
                        </h4>
                        <span class="team-card_desig">CEO/Founder</span>
                        <div class="social-btn">
                            <a href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
                            <a href="https://linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                            <a href="https://www.discord.com/"><i class="fab fa-discord"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="team-card">
                    <div class="team-card_img">
                        <img src="{{ asset('assets/img/team/team-3.png') }}" alt="img">
                    </div>
                    <div class="team-card_content">
                        <h4 class="team-card_title"><a href="team-details.html">Amelia Harper</a>
                        </h4>
                        <span class="team-card_desig">CEO/Founder</span>
                        <div class="social-btn">
                            <a href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
                            <a href="https://linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                            <a href="https://www.discord.com/"><i class="fab fa-discord"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="team-card">
                    <div class="team-card_img">
                        <img src="{{ asset('assets/img/team/team-4.png') }}" alt="img">
                    </div>
                    <div class="team-card_content">
                        <h4 class="team-card_title"><a href="team-details.html">Oliver Samuel</a>
                        </h4>
                        <span class="team-card_desig">CEO/Founder</span>
                        <div class="social-btn">
                            <a href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
                            <a href="https://linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                            <a href="https://www.discord.com/"><i class="fab fa-discord"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="team-card">
                    <div class="team-card_img">
                        <img src="{{ asset('assets/img/team/team-1.png') }}" alt="img">
                    </div>
                    <div class="team-card_content">
                        <h4 class="team-card_title"><a href="team-details.html">George Thomas</a>
                        </h4>
                        <span class="team-card_desig">CEO/Founder</span>
                        <div class="social-btn">
                            <a href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
                            <a href="https://linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                            <a href="https://www.discord.com/"><i class="fab fa-discord"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="team-card">
                    <div class="team-card_img">
                        <img src="{{ asset('assets/img/team/team-2.png') }}" alt="img">
                    </div>
                    <div class="team-card_content">
                        <h4 class="team-card_title"><a href="team-details.html">Mike Johnson</a>
                        </h4>
                        <span class="team-card_desig">CEO/Founder</span>
                        <div class="social-btn">
                            <a href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
                            <a href="https://linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                            <a href="https://www.discord.com/"><i class="fab fa-discord"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="team-card">
                    <div class="team-card_img">
                        <img src="{{ asset('assets/img/team/team-3.png') }}" alt="img">
                    </div>
                    <div class="team-card_content">
                        <h4 class="team-card_title"><a href="team-details.html">Amelia Harper</a>
                        </h4>
                        <span class="team-card_desig">CEO/Founder</span>
                        <div class="social-btn">
                            <a href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
                            <a href="https://linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                            <a href="https://www.discord.com/"><i class="fab fa-discord"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="team-card">
                    <div class="team-card_img">
                        <img src="{{ asset('assets/img/team/team-4.png') }}" alt="img">
                    </div>
                    <div class="team-card_content">
                        <h4 class="team-card_title"><a href="team-details.html">Oliver Samuel</a>
                        </h4>
                        <span class="team-card_desig">CEO/Founder</span>
                        <div class="social-btn">
                            <a href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
                            <a href="https://linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                            <a href="https://www.discord.com/"><i class="fab fa-discord"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@include('components.layout4')
