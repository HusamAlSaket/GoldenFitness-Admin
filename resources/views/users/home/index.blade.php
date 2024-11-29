@include('components.layout3')

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
                                <span>Fitness</span> Studio
                                In Town
                            </h1>
                            <div class="btn-group" data-ani="slideinup" data-ani-delay="0.2s">
                                <a href="contact.html" class="btn style2">Make Appointment</a>
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
                                <span>Fitness</span> Studio
                                In Town
                            </h1>
                            <div class="btn-group" data-ani="slideinup" data-ani-delay="0.2s">
                                <a href="contact.html" class="btn style2">Make Appointment</a>
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
                        <h6 class="feature-card_subtitle">Healthier Life</h6>
                        <h4 class="feature-card_title"><a href="service-detail.html">Achieve Your Goals</a></h4>
                        <p class="feature-card_text">We believe that with the right guidance, support, and mindset, you
                            can accomplish anything you set your mind to.</p>
                        <a href="contact.html" class="btn style2">View Class Schedule</a>
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
                        <h6 class="feature-card_subtitle">Healthier Life</h6>
                        <h4 class="feature-card_title"><a href="service-detail.html">Best Institute Certificate</a></h4>
                        <p class="feature-card_text">We believe that with the right guidance, support, and mindset, you
                            can accomplish anything you set your mind to.</p>
                        <a href="contact.html" class="btn style2">View Class Schedule</a>
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
                        <h6 class="feature-card_subtitle">Healthier Life</h6>
                        <h4 class="feature-card_title"><a href="service-detail.html">Train Day and Night</a></h4>
                        <p class="feature-card_text">We believe that with the right guidance, support, and mindset, you
                            can accomplish anything you set your mind to.</p>
                        <a href="contact.html" class="btn style2">View Class Schedule</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--==============================
    About Area
    ==============================-->
<div class="space-bottom">
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
    Service Area
    ==============================-->
<div class="service-bg-area" data-bg-src="{{ asset('assets/img/bg/service-bg.png') }}">
    <div class="sec-shape-top">
        <img src="{{ asset('assets/img/bg/sec-shape-top.png') }}" alt="img">
    </div>
    <!--==============================
        Service Area 01
        ==============================-->
    <div class="service-area-1 space overflow-hidden">
        <div class="container">
            <div class="title-area">
                <span class="sub-title">Our Features</span>
                <h2 class="sec-title text-white">Services We're Offering</h2>
            </div>
        </div>
        <div class="container-fluid p-0">
            <div class="row global-carousel service-slider-1" data-slide-show="4" data-ml-slide-show="3"
                data-lg-slide-show="3" data-md-slide-show="2" data-sm-slide-show="1" data-xs-slide-show="1"
                data-dots="false">
                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <div class="service-card_icon">
                            <img src="{{ asset('assets/img/icon/service-icon_1-1.svg') }}" alt="img">
                        </div>
                        <div class="service-card_content">
                            <h4 class="service-card_title h5"><a href="service-details.html">Tons of Equipment</a>
                            </h4>
                            <p class="service-card_text">Lacinia montes est odio tpor volutpat rhoncus quisque sagittis
                            </p>
                            <a href="service-details.html" class="link-btn" tabindex="0">Read More <i
                                    class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <div class="service-card_icon">
                            <img src="{{ asset('assets/img/icon/service-icon_1-2.svg') }}" alt="img">
                        </div>
                        <div class="service-card_content">
                            <h4 class="service-card_title h5"><a href="service-details.html">Rows of Cardio</a></h4>
                            <p class="service-card_text">Lacinia montes est odio tpor volutpat rhoncus quisque sagittis
                            </p>
                            <a href="service-details.html" class="link-btn" tabindex="0">Read More <i
                                    class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <div class="service-card_icon">
                            <img src="{{ asset('assets/img/icon/service-icon_1-3.svg') }}" alt="img">
                        </div>
                        <div class="service-card_content">
                            <h4 class="service-card_title h5"><a href="service-details.html">Heart Pumping</a></h4>
                            <p class="service-card_text">Lacinia montes est odio tpor volutpat rhoncus quisque sagittis
                            </p>
                            <a href="service-details.html" class="link-btn" tabindex="0">Read More <i
                                    class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <div class="service-card_icon">
                            <img src="{{ asset('assets/img/icon/service-icon_1-4.svg') }}" alt="img">
                        </div>
                        <div class="service-card_content">
                            <h4 class="service-card_title h5"><a href="service-details.html">Strength Training</a>
                            </h4>
                            <p class="service-card_text">Lacinia montes est odio tpor volutpat rhoncus quisque sagittis
                            </p>
                            <a href="service-details.html" class="link-btn" tabindex="0">Read More <i
                                    class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <div class="service-card_icon">
                            <img src="{{ asset('assets/img/icon/service-icon_1-1.svg') }}" alt="img">
                        </div>
                        <div class="service-card_content">
                            <h4 class="service-card_title h5"><a href="service-details.html">Tons of Equipment</a>
                            </h4>
                            <p class="service-card_text">Lacinia montes est odio tpor volutpat rhoncus quisque sagittis
                            </p>
                            <a href="service-details.html" class="link-btn" tabindex="0">Read More <i
                                    class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <div class="service-card_icon">
                            <img src="{{ asset('assets/img/icon/service-icon_1-2.svg') }}" alt="img">
                        </div>
                        <div class="service-card_content">
                            <h4 class="service-card_title h5"><a href="service-details.html">Rows of Cardio</a></h4>
                            <p class="service-card_text">Lacinia montes est odio tpor volutpat rhoncus quisque sagittis
                            </p>
                            <a href="service-details.html" class="link-btn" tabindex="0">Read More <i
                                    class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <div class="service-card_icon">
                            <img src="{{ asset('assets/img/icon/service-icon_1-3.svg') }}" alt="img">
                        </div>
                        <div class="service-card_content">
                            <h4 class="service-card_title h5"><a href="service-details.html">Heart Pumping</a></h4>
                            <p class="service-card_text">Lacinia montes est odio tpor volutpat rhoncus quisque sagittis
                            </p>
                            <a href="service-details.html" class="link-btn" tabindex="0">Read More <i
                                    class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <div class="service-card_icon">
                            <img src="{{ asset('assets/img/icon/service-icon_1-4.svg') }}" alt="img">
                        </div>
                        <div class="service-card_content">
                            <h4 class="service-card_title h5"><a href="service-details.html">Strength Training</a>
                            </h4>
                            <p class="service-card_text">Lacinia montes est odio tpor volutpat rhoncus quisque sagittis
                            </p>
                            <a href="service-details.html" class="link-btn" tabindex="0">Read More <i
                                    class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!--==============================
        Why-choose-us Area
        ==============================-->
    <div class="wcu-area-1 space-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="wcu-thumb">
                        <img class="img-1" src="{{ asset('assets/img/normal/wcu_1-2.png') }}" alt="img">
                        <div class="img-2 jump">
                            <img src="{{ asset('assets/img/normal/wcu_1-1.png') }}" alt="img">
                        </div>
                        <div class="wcu-grid jump2">
                            <div class="icon">
                                <img src="{{ asset('assets/img/icon/wcu-icon_1-1.svg') }}" alt="img">
                            </div>
                            <div class="details">
                                <h3 class="wcu-grid_year"><span class="counter-number">25</span>+</h3>
                                <span class="wcu-grid_text">Years Experience</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="wcu-wrap">
                        <div class="title-area mb-50">
                            <span class="sub-title">Why Choose Us?</span>
                            <h2 class="sec-title text-white">Why Choose Us?</h2>
                            <p class="sec-text text-white">Sed ut perspiciatis unde omnis iste natus voluptatem
                                accusantium dolore mque laudantium aperiam eaquecy inventore veritatis</p>
                        </div>
                        <div class="accordion-area accordion" id="faqAccordion">

                            <div class="accordion-card active">
                                <div class="accordion-header" id="collapse-item-1">
                                    <button class="accordion-button " type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse-1" aria-expanded="true" aria-controls="collapse-1">
                                        What are your gym's operating hours?</button>
                                </div>
                                <div id="collapse-1" class="accordion-collapse collapse show"
                                    aria-labelledby="collapse-item-1" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <p class="faq-text">Our standard membership provides access to our gym
                                            facilities during regular operating hours. This option is ideal for
                                            individuals who prefer independent workouts and want to make use of our
                                            state</p>
                                    </div>
                                </div>
                            </div>


                            <div class="accordion-card ">
                                <div class="accordion-header" id="collapse-item-2">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapse-2" aria-expanded="false"
                                        aria-controls="collapse-2"> What amenities and facilities does your gym
                                        offer?</button>
                                </div>
                                <div id="collapse-2" class="accordion-collapse collapse "
                                    aria-labelledby="collapse-item-2" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <p class="faq-text">Professionally are many variations of passages the majority
                                            have suffered alteration in some fo injected humour, or randomised words
                                            believable.</p>
                                    </div>
                                </div>
                            </div>


                            <div class="accordion-card ">
                                <div class="accordion-header" id="collapse-item-3">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapse-3" aria-expanded="false"
                                        aria-controls="collapse-3"> Do you provide personal training services?</button>
                                </div>
                                <div id="collapse-3" class="accordion-collapse collapse "
                                    aria-labelledby="collapse-item-3" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <p class="faq-text">Contributors are many variations of passages the majority
                                            have suffered alteration in some fo injected humour, or randomised words
                                            believable.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="sec-shape-bottom">
        <img src="{{ asset('assets/img/bg/sec-shape-bottom.png') }}" alt="img">
    </div>
</div>

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
<div class="counter-area-1" data-bg-src="assets/img/bg/counter-bg1.png">
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
</div>

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

<!--==============================
    Testimonial Area
    ==============================-->
<div class="testimonial-area-1 overflow-hidden">
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
</div>

<!--==============================
    Pricing plan Area
    ==============================-->
<div class="pricing-area">
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
</div>

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
                        <div class="goal-badge">We Have Train More Than <span class="counter-number">1580</span>+
                            Students</div>
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
                        <p class="about-grid_text">Pedal your way to fitness in our specialized indoor cycling studio.
                            Equipped with stationary bikes...</p>
                    </div>
                </div>
                <div class="about-grid">
                    <div class="about-grid_icon">
                        <img src="{{ asset('assets/img/icon/goal-icon_1-2.svg') }}" alt="img">
                    </div>
                    <div class="about-grid_content">
                        <h4 class="about-grid_title">Cardio and Strength</h4>
                        <p class="about-grid_text">Pedal your way to fitness in our specialized indoor cycling studio.
                            Equipped with stationary bikes...</p>
                    </div>
                </div>
                <a class="btn btn-border2" href="service-details.html">Read Details</a>
            </div>
        </div>
    </div>
</section>

<!--==============================
    Blog Area
    ==============================-->
<section class="blog-area space bg-smoke3">
    <div class="container">
        <div class="title-area text-center">
            <span class="sub-title">Blog Posts
            </span>
            <h2 class="sec-title">Read Our Latest Articles</h2>
        </div>
        <div class="row global-carousel blog-slider" data-slide-show="3" data-lg-slide-show="2"
            data-md-slide-show="2" data-sm-slide-show="1" data-xs-slide-show="1" data-dots="false"
            data-md-dots="true">
            <div class="col-md-6 col-lg-4">
                <div class="blog-card">
                    <div class="blog-img">
                        <img src="{{ asset('assets/img/blog/blog_1_1.png') }}" alt="blog image">
                    </div>
                    <div class="blog-content" data-bg-src="{{ asset('assets/img/blog/blog_card1_bg.png') }}">
                        <div class="blog-meta">
                            <a href="blog.html"><i class="fal fa-calendar"></i>15 Dec 2023</a>
                            <a href="blog.html"><i class="far fa-user"></i>by Andrew</a>
                        </div>
                        <h3 class="blog-title box-title"><a href="blog-details.html">Nutrition Tips and Advice for Gym
                                Goers</a></h3>
                        <p class="blog-text">These specialized memberships are designed to make fitness accessible and
                            affordable for these specific...</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="blog-card">
                    <div class="blog-img">
                        <img src="{{ asset('assets/img/blog/blog_1_2.png" alt="blog image') }}">
                    </div>
                    <div class="blog-content" data-bg-src="{{ asset('assets/img/blog/blog_card1_bg.png') }}">
                        <div class="blog-meta">
                            <a href="blog.html"><i class="fal fa-calendar"></i>15 Dec 2023</a>
                            <a href="blog.html"><i class="far fa-user"></i>by Andrew</a>
                        </div>
                        <h3 class="blog-title box-title"><a href="blog-details.html">Uncover Your True Potential at
                                Fitmas</a></h3>
                        <p class="blog-text">If you're visiting the area or want to bring a friend along for a workout,
                            we offer day passes and guest passes...</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="blog-card">
                    <div class="blog-img">
                        <img src="{{ asset('assets/img/blog/blog_1_3.png') }}" alt="blog image">
                    </div>
                    <div class="blog-content" data-bg-src="{{ asset('assets/img/blog/blog_card1_bg.png') }}">
                        <div class="blog-meta">
                            <a href="blog.html"><i class="fal fa-calendar"></i>15 Dec 2023</a>
                            <a href="blog.html"><i class="far fa-user"></i>by Andrew</a>
                        </div>
                        <h3 class="blog-title box-title"><a href="blog-details.html">Offer discounted options for
                                students seniors</a></h3>
                        <p class="blog-text">We understand the importance of fitness for the whole family. Our family
                            option allows multiple family...</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="blog-card">
                    <div class="blog-img">
                        <img src="{{ asset('assets/img/blog/blog_1_1.png') }}" alt="blog image">
                    </div>
                    <div class="blog-content" data-bg-src="{{ asset('assets/img/blog/blog_card1_bg.png') }}">
                        <div class="blog-meta">
                            <a href="blog.html"><i class="fal fa-calendar"></i>15 Dec 2023</a>
                            <a href="blog.html"><i class="far fa-user"></i>by Andrew</a>
                        </div>
                        <h3 class="blog-title box-title"><a href="blog-details.html">Nutrition Tips and Advice for Gym
                                Goers</a></h3>
                        <p class="blog-text">These specialized memberships are designed to make fitness accessible and
                            affordable for these specific...</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="blog-card">
                    <div class="blog-img">
                        <img src="{{ asset('assets/img/blog/blog_1_2.png') }}" alt="blog image">
                    </div>
                    <div class="blog-content" data-bg-src="{{ asset('assets/img/blog/blog_card1_bg.png') }}">
                        <div class="blog-meta">
                            <a href="blog.html"><i class="fal fa-calendar"></i>15 Dec 2023</a>
                            <a href="blog.html"><i class="far fa-user"></i>by Andrew</a>
                        </div>
                        <h3 class="blog-title box-title"><a href="blog-details.html">Uncover Your True Potential at
                                Fitmas</a></h3>
                        <p class="blog-text">If you're visiting the area or want to bring a friend along for a workout,
                            we offer day passes and guest passes...</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="blog-card">
                    <div class="blog-img">
                        <img src="{{ asset('assets/img/blog/blog_1_3.png') }}" alt="blog image">
                    </div>
                    <div class="blog-content" data-bg-src="{{ asset('assets/img/blog/blog_card1_bg.png') }}">
                        <div class="blog-meta">
                            <a href="blog.html"><i class="fal fa-calendar"></i>15 Dec 2023</a>
                            <a href="blog.html"><i class="far fa-user"></i>by Andrew</a>
                        </div>
                        <h3 class="blog-title box-title"><a href="blog-details.html">Offer discounted options for
                                students seniors</a></h3>
                        <p class="blog-text">We understand the importance of fitness for the whole family. Our family
                            option allows multiple family...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Bootstrap JS (for modal functionality) -->

@include('components.layout4')
