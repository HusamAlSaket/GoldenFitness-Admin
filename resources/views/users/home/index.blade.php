@include('components.layout3')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<!--==============================
    Hero Area
    ==============================-->
<div class="hero-wrapper hero-1" id="hero">
    <div class="global-carousel" id="heroSlider1" data-fade="true" data-slide-show="1" data-lg-slide-show="1"
        data-md-slide-show="1" data-sm-slide-show="1" data-xs-slide-show="1" data-arrows="true" data-xl-arrows="true"
        data-ml-arrows="true">
        <div class="hero-slider" data-bg-src="{{ asset('assets/img/hero/hero_bg_1_1.png') }}">
            <div class="hero-shape1 shape-mockup movingX" data-bottom="165px" data-right="0">
                <img src="{{ asset('assets/img/hero/hero_shape_1.png') }}" alt="img">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-7 col-md-9">
                        <div class="hero-style1">
                            <span class="hero-subtitle" data-ani="slideinup" data-ani-delay="0s">Welcome To Our
                                Company</span>
                            <h1 class="hero-title text-white" data-ani="slideinup" data-ani-delay="0.1s">The Best
                                <span>Fitness</span> Gym
                                In Town
                            </h1>
                            <div class="btn-group" data-ani="slideinup" data-ani-delay="0.2s">
                                <a href="{{ route('user.subscriptions.create') }}" class="btn style2">Unlock Your
                                    Fitness Potential now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-slider" data-bg-src="{{ asset('assets/img/hero/hero_bg_1_2.png') }}">
            <div class="hero-shape1 shape-mockup movingX" data-bottom="165px" data-right="0">
                <img src="{{ asset('assets/img/hero/hero_shape_1.png') }}" alt="img">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-7 col-md-9">
                        <div class="hero-style1">
                            <span class="hero-subtitle" data-ani="slideinup" data-ani-delay="0s">Welcome To Our
                                Company</span>
                            <h1 class="hero-title text-white" data-ani="slideinup" data-ani-delay="0.1s">The Best
                                <span>Fitness</span> Gym
                                In Town
                            </h1>
                            <div class="btn-group" data-ani="slideinup" data-ani-delay="0.2s">
                                <a href="{{ route('user.subscriptions.create') }}" class="btn style2">Unlock Your
                                    Fitness Potential now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="hero-arrow">
        <button data-slick-prev="#heroSlider1" class="slick-arrow slick-prev">PREV</button>
        <button data-slick-next="#heroSlider1" class="slick-arrow slick-next">NEXT</button>
    </div>
</div>
<!--======== / Hero Section ========-->

<!--==============================
    feature Area
    ==============================-->
<div class="space">
    <div class="container">
        <div class="feature-area">
            <div class="row gx-0">
                <div class="col-lg-4">
                    <div class="feature-card">
                        <div class="feature-card_bg">
                            <img src="{{ asset('assets/img/bg/feature-card_bg1.png') }}" alt="img">
                        </div>
                        <div class="feature-card_icon">
                            <img src="{{ asset('assets/img/icon/feature-icon1-1.svg') }}" alt="img">
                        </div>
                        <h6 class="feature-card_subtitle">Fitness Transformation</h6>
                        <h4 class="feature-card_title"><a href="{{route('products.index')}}">Achieve Your Fitness Goals</a></h4>
                        <p class="feature-card_text">At our gym, we provide top-quality equipment to help you reach your fitness potential. Whether you’re lifting, stretching, or running, we’ve got the tools to support your success.</p>
                        <a href="{{route('products.index')}}" class="btn style2">Explore Equipment</a>
                    </div>
                </div>
                
                <div class="col-lg-4">
                    <div class="feature-card feature-card-active">
                        <div class="feature-card_bg">
                            <img src="{{ asset('assets/img/bg/feature-card_bg1.png') }}" alt="img">
                        </div>
                        <div class="feature-card_icon">
                            <img src="{{ asset('assets/img/icon/feature-icon1-2.svg') }}" alt="img">
                        </div>
                        <h6 class="feature-card_subtitle">Certified Excellence</h6>
                        <h4 class="feature-card_title"><a href="{{route('about.index')}}">Best Institute Certificate</a></h4>
                        <p class="feature-card_text">We are more than just a gym. Our certified trainers and comprehensive programs ensure that you’re getting the best fitness education. Join us and become a part of our success story.</p>
                        <a href="{{route('about.index')}}" class="btn style2">Learn More About Us</a>
                    </div>
                </div>
                
                <div class="col-lg-4">
                    <div class="feature-card">
                        <div class="feature-card_bg">
                            <img src="{{ asset('assets/img/bg/feature-card_bg1.png') }}" alt="img">
                        </div>
                        <div class="feature-card_icon">
                            <img src="{{ asset('assets/img/icon/feature-icon1-3.svg') }}" alt="img">
                        </div>
                        <h6 class="feature-card_subtitle">Anytime, Anywhere Workouts</h6>
                        <h4 class="feature-card_title"><a href="{{route('users.videos.index')}}">Train Day and Night</a></h4>
                        <p class="feature-card_text">Access our comprehensive workout library anytime, anywhere. Whether you're at home or on the go, our videos are designed to guide you to peak fitness no matter your schedule.</p>
                        <a href="{{route('users.videos.index')}}" class="btn style2">Start Your Workout</a>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>

<!--==============================
    About Area
    ==============================-->
{{-- <div class="space-bottom">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="about-thumb mb-5 mb-lg-0">
                    <img class="about-img-1" src="{{ asset('assets/img/normal/about_1-1.png') }}" alt="img">
                    <img class="about-img-2 jump" src="{{ asset('assets/img/normal/about_1-2.png') }}"
                        alt="img">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-content-wrap">
                    <div class="title-area mb-0">
                        <span class="sub-title">More About Us</span>
                        <h2 class="sec-title">Unlock Your Full Potential,
                            Achieve Your Goals.</h2>
                        <p class="sec-text">Welcome to Fitmas. your ultimate destination for achieving your fitness
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
                        <a href="{{ route('user.subscriptions.create') }}" class="btn">Unlock Your Fitness
                            Potential now</a>
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
</div> --}}



<!--==============================
    Service Area 02
    ==============================-->
<div class="service-area-2 space overflow-hidden">
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
    Counter Area
    ==============================-->
{{-- <div class="counter-area-1" data-bg-src="assets/img/bg/counter-bg1.png">
    <div class="counter-sec-shape-top">
        <img src="{{ asset('assets/img/bg/sec-shape-top.png') }}" alt="img">
    </div>
    <div class="counter-wrap1 space">
        <div class="container">
            <div class="row gy-40 justify-content-between">
                <div class="col-sm-6 col-xl-auto">
                    <div class="counter-card">
                        <div class="counter-card_icon">
                            <img src="{{ asset('assets/img/icon/counter-icon_1-1.svg') }}" alt="icon">
                        </div>
                        <div class="media-body">
                            <h2 class="counter-card_number"><span class="counter-number">4.8</span>K</h2>
                            <p class="counter-card_text">JOBS COMPLETED</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-auto">
                    <div class="counter-card">
                        <div class="counter-card_icon">
                            <img src="{{ asset('assets/img/icon/counter-icon_1-2.svg') }}" alt="icon">
                        </div>
                        <div class="media-body">
                            <h2 class="counter-card_number"><span class="counter-number">325</span></h2>
                            <p class="counter-card_text">MEDIA ACTIVITIES</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-auto">
                    <div class="counter-card">
                        <div class="counter-card_icon">
                            <img src="{{ asset('assets/img/icon/counter-icon_1-3.svg') }}" alt="icon">
                        </div>
                        <div class="media-body">
                            <h2 class="counter-card_number"><span class="counter-number">598</span></h2>
                            <p class="counter-card_text">SKILLED EXPERTS</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-auto">
                    <div class="counter-card">
                        <div class="counter-card_icon">
                            <img src="{{ asset('assets/img/icon/counter-icon_1-4.svg') }}" alt="icon">
                        </div>
                        <div class="media-body">
                            <h2 class="counter-card_number"><span class="counter-number">36</span>K</h2>
                            <p class="counter-card_text">HAPPY CLIENTS</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="counter-sec-shape-bottom">
        <img src="{{ asset('assets/img/bg/sec-shape-bottom.png') }}" alt="img">
    </div>
</div> --}}

<!--==============================
    Team Area
    ==============================-->
{{-- <div class="team-area-1 space">
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
</div> --}}

<!--==============================
    Testimonial Area
    ==============================-->
{{-- <div class="testimonial-area-1 overflow-hidden">
    <div class="testimonial-bg-thumb1">
        <div class="thumb">
            <img src="{{ asset('assets/img/testimonial/testi_bg1.png') }}" alt="img">
        </div>
    </div>
    <div class="space">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-xl-8 col-lg-9">
                    <div class="testi-box-wrap1 text-center"
                        data-bg-src="{{ asset('assets/img/testimonial/testi_box-bg.png') }}">
                        <div class="title-area">
                            <span class="sub-title">Feedbacks</span>
                            <h2 class="sec-title text-white">Trusted Testimonials</h2>
                        </div>
                        <div class="row global-carousel testi-slider-1" data-slide-show="1">
                            <div class="col-lg-6">
                                <div class="testi-box">
                                    <div class="testi-box_thumb">
                                        <img src="{{ asset('assets/img/testimonial/testi_1_1.png') }}"
                                            alt="img">
                                        <div class="block-quote">
                                            <i class="fas fa-quote-right"></i>
                                        </div>
                                    </div>
                                    <div class="testi-box_content">
                                        <p class="testi-box_text">“I have been a member of Fitmas for over a year now,
                                            and it has been a game-changer for my fitness journey. The gym has a
                                            fantastic range of equipment that caters to all my workout needs....”</p>
                                        <div class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="testi-box">
                                    <div class="testi-box_thumb">
                                        <img src="{{ asset('assets/img/testimonial/testi_1_2.png') }}"
                                            alt="img">
                                        <div class="block-quote">
                                            <i class="fas fa-quote-right"></i>
                                        </div>
                                    </div>
                                    <div class="testi-box_content">
                                        <p class="testi-box_text">“I have been a member of Fitmas for over a year now,
                                            and it has been a game-changer for my fitness journey. The gym has a
                                            fantastic range of equipment that caters to all my workout needs....”</p>
                                        <div class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="testi-box">
                                    <div class="testi-box_thumb">
                                        <img src="{{ asset('assets/img/testimonial/testi_1_3.png') }}"
                                            alt="img">
                                        <div class="block-quote">
                                            <i class="fas fa-quote-right"></i>
                                        </div>
                                    </div>
                                    <div class="testi-box_content">
                                        <p class="testi-box_text">“I have been a member of Fitmas for over a year now,
                                            and it has been a game-changer for my fitness journey. The gym has a
                                            fantastic range of equipment that caters to all my workout needs....”</p>
                                        <div class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="testi-slider-controller" data-sliderNavfor=".testi-slider-1">
                            <a class="indicatior-btn active">
                                <div class="testi-box_profile">
                                    <h4 class="testi-box_name">Andrew Daniel</h4>
                                    <span class="testi-box_desig">Gym Student</span>
                                </div>
                            </a>
                            <a class="indicatior-btn">
                                <div class="testi-box_profile">
                                    <h4 class="testi-box_name">Mike Harison</h4>
                                    <span class="testi-box_desig">Gym Student</span>
                                </div>
                            </a>
                            <a class="indicatior-btn">
                                <div class="testi-box_profile">
                                    <h4 class="testi-box_name">William Henry</h4>
                                    <span class="testi-box_desig">Gym Student</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<!--==============================
    Pricing plan Area
    ==============================-->
{{-- <div class="pricing-area">
    <div class="container">
        <div class="title-area text-center">
            <h3 class="sub-title">Pricing Plan</h3>
            <h2 class="sec-title">Our Pricing Plan</h2>
        </div>
        <div class="row gy-4 justify-content-center">
            <div class="col-lg-4 col-md-6">
                <div class="pricing-card">
                    <div class="pricing-card_bg">
                        <img src="{{ asset('assets/img/bg/pricing-card1-bg.png') }}" alt="img">
                    </div>
                    <div class="pricing-card_icon">
                        <img src="{{ asset('assets/img/icon/picing-icon_1-1.svg') }}" alt="img">
                    </div>
                    <h3 class="pricing-card_title">Basic Membership</h3>
                    <h4 class="pricing-card_price"><span class="currency">$</span>19<span
                            class="duration">/month</span>
                    </h4>
                    <p class="pricing-card_content">This category typically offers access to the gym's facilities and
                        equipment. </p>
                    <div class="checklist">
                        <ul>
                            <li><i class="far fa-check-circle"></i>12 trainings</li>
                            <li><i class="far fa-check-circle"></i>Free shower & lockers</li>
                            <li><i class="far fa-check-circle"></i>Personal yoga mat</li>
                            <li><i class="far fa-check-circle"></i>Free parking</li>
                        </ul>
                    </div>
                    <a class="btn style2" href="priing.html">Choose This Plan</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="pricing-card pricing-card_active">
                    <div class="pricing-card_bg">
                        <img src="{{ asset('assets/img/bg/pricing-card1-bg.png') }}" alt="img">
                    </div>
                    <div class="pricing-card_icon">
                        <img src="{{ asset('assets/img/icon/picing-icon_1-2.svg') }}" alt="img">
                    </div>
                    <h3 class="pricing-card_title">Standard Membeship</h3>
                    <h4 class="pricing-card_price"><span class="currency">$</span>39<span
                            class="duration">/month</span>
                    </h4>
                    <p class="pricing-card_content">This category typically offers access to the gym's facilities and
                        equipment. </p>
                    <div class="checklist">
                        <ul>
                            <li><i class="far fa-check-circle"></i>12 trainings</li>
                            <li><i class="far fa-check-circle"></i>Free shower & lockers</li>
                            <li><i class="far fa-check-circle"></i>Personal yoga mat</li>
                            <li><i class="far fa-check-circle"></i>Free parking</li>
                        </ul>
                    </div>
                    <a class="btn style2" href="priing.html">Choose This Plan</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="pricing-card">
                    <div class="pricing-card_bg">
                        <img src="{{ asset('assets/img/bg/pricing-card1-bg.png') }}" alt="img">
                    </div>
                    <div class="pricing-card_icon">
                        <img src="{{ asset('assets/img/icon/picing-icon_1-3.svg') }}" alt="img">
                    </div>
                    <h3 class="pricing-card_title">Ultimate Membership</h3>
                    <h4 class="pricing-card_price"><span class="currency">$</span>69<span
                            class="duration">/month</span>
                    </h4>
                    <p class="pricing-card_content">This category typically offers access to the gym's facilities and
                        equipment. </p>
                    <div class="checklist">
                        <ul>
                            <li><i class="far fa-check-circle"></i>12 trainings</li>
                            <li><i class="far fa-check-circle"></i>Free shower & lockers</li>
                            <li><i class="far fa-check-circle"></i>Personal yoga mat</li>
                            <li><i class="far fa-check-circle"></i>Free parking</li>
                        </ul>
                    </div>
                    <a class="btn style2" href="priing.html">Choose This Plan</a>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<!--==============================
    Goal Area
    ==============================-->
<section class="goal-area space">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 order-lg-2 text-lg-end">
                <div class="goal-thumb-1 mb-40 mb-lg-0">
                    <img src="{{ asset('assets/img/normal/goal_1-1.png') }}" alt="img">
                    <div class="goal-badge-wrap">
                        <div class="goal-badge">We Have Trained More Than <span class="counter-number">2000</span>+
                            Members</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 order-lg-1">
                <div class="title-area">
                    <span class="sub-title">Fitmas Goal
                    </span>
                    <h2 class="sec-title">Unlock Your Full
                        Potential, Achieve Your
                        Fitness Goals.</h2>
                </div>
                <div class="about-grid">
                    <div class="about-grid_icon">
                        <img src="{{ asset('assets/img/icon/goal-icon_1-1.svg') }}" alt="img">
                    </div>
                    <div class="about-grid_content">
                        <h4 class="about-grid_title">Free Fitness Training</h4>
                        <p class="about-grid_text">Ignite your fitness journey with our exclusive cycling sessions, where energy meets endurance. Our state-of-the-art stationary bikes offer a dynamic workout experience that pushes your limits while keeping you motivated and engaged.</p>
                    </div>
                </div>
                <div class="about-grid">
                    <div class="about-grid_icon">
                        <img src="{{ asset('assets/img/icon/goal-icon_1-2.svg') }}" alt="img">
                    </div>
                    <div class="about-grid_content">
                        <h4 class="about-grid_title">Cardio and Strength</h4>
                        <p class="about-grid_text">Experience the perfect blend of cardio and strength training in our gym. Whether you're pushing through intense cycling sessions or building muscle with strength exercises, we provide the ultimate environment to elevate your fitness game.</p>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section>

<!-- Blogs Structure -->

{{-- <section class="blogSection-area">
    <div class="blogSection-container">
        <div class="blogSection-title-area">
            <span class="blogSection-sub-title">Blog Posts</span>
            <h2 class="blogSection-sec-title">Read Our Latest Articles</h2>
        </div>
        <div class="blogSection-slider-container">
            <div class="blogSection-slider" id="blogSectionSlider">
                @foreach($blogs as $blog)
                <div class="blogSection-card">
                    <div class="blogSection-img">
                        @if ($blog->image_url)
                            <img src="{{ asset('storage/' . $blog->image_url) }}" alt="{{ $blog->title }}">
                        @else
                            <img src="https://via.placeholder.com/450x300" alt="Placeholder Image">
                        @endif
                    </div>
                    <div class="blogSection-content">
                        <div class="blogSection-meta">
                            <a href="blog.html"><i class="fal fa-calendar"></i>{{ $blog->created_at->format('d M Y') }}</a>
                            <a href="blog.html"><i class="far fa-user"></i>by Admin</a>
                        </div>
                        <h3 class="blogSection-title">
                            <a href="{{ route('users.blogs.show', $blog->id) }}">{{ $blog->title }}</a>
                        </h3>
                        <p class="blogSection-text">{{ \Illuminate\Support\Str::limit($blog->description, 100) }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section> --}}

<style>
.blogSection-area {
    padding: 80px 0;
}

.blogSection-title-area {
    text-align: center;
    margin-bottom: 50px;
}

.blogSection-sub-title {
    color: #ff0000;
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 10px;
    display: block;
    text-transform: uppercase;
}

.blogSection-sec-title {
    font-size: 36px;
    margin: 0;
}

.blogSection-slider-container {
    position: relative;
    overflow: hidden;
}

.blogSection-slider {
    display: flex;
    transition: transform 0.5s ease;
    gap: 30px;
}

.blogSection-card {
    flex: 0 0 calc(33.333% - 20px);
    background: #ffffff;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    overflow: hidden;
}

.blogSection-img {
    position: relative;
    overflow: hidden;
    height: 250px;
}

.blogSection-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.blogSection-content {
    padding: 25px;
}

.blogSection-meta a {
    color: #ff0000;
    margin-right: 20px;
    font-size: 14px;
    text-decoration: none;
}

.blogSection-meta i {
    margin-right: 5px;
}
.blogSection-title a {
    color: black;
    font-size: 22px;
    text-decoration: none;
    transition: color 0.3s ease, background-color 0.3s ease;
}

.blogSection-title a:hover {
    color: #ff0000;
    background-color: transparent;
}

.blogSection-text {
    font-size: 15px;
    line-height: 1.6;
    margin: 0;
}

@media (max-width: 991px) {
    .blogSection-card {
        flex: 0 0 calc(50% - 15px);
    }
}

@media (max-width: 767px) {
    .blogSection-card {
        flex: 0 0 100%;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const slider = document.getElementById('blogSectionSlider');
    let currentSlide = 0;
    const slidesPerView = 2;
    const totalSlides = slider.children.length;

    function slideNext() {
        currentSlide = (currentSlide + 1) % (totalSlides - slidesPerView + 1);
        updateSliderPosition();
    }

    function updateSliderPosition() {
        const slideWidth = slider.children[0].offsetWidth + 30; // Including gap
        slider.style.transform = `translateX(-${currentSlide * slideWidth}px)`;
    }

    // Auto slide every 3 seconds
    setInterval(slideNext, 3000);

    // Update slider position on window resize
    window.addEventListener('resize', updateSliderPosition);
});
</script>

@include('components.layout4')
