@include('components.layout3')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<!-- Hero Section -->
<div class="breadcumb-wrapper" 
     style="height: 700px; background-image: url('{{ asset('assets/img/bg/breadcrumb-bg.png') }}'); 
            background-size: cover; background-position: center; position: relative;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Centered Text -->
                <div class="breadcumb-content"
                     style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); 
                            text-align: center; color: white;">
                    <h1 class="breadcumb-title">Contact Us</h1>
                    <ul class="breadcumb-menu">
                        <!-- Add breadcrumb items here if needed -->
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Contact Information Section -->
<div class="contact-area space bg-smoke2">
    <div class="container">
        <div class="row gy-4 justify-content-center">
            <div class="col-lg-4 col-md-6">
                <div class="contact-info">
                    <div class="contact-info_icon">
                        <img src="{{ asset('assets/img/icon/contact-icon1.svg') }}" alt="Call Us Icon">
                    </div>
                    <div class="media-body">
                        <span class="contact-info_title">Call Us 24/7</span>
                        <h6 class="contact-info_text"><a href="#">+962 77937 2342</a></h6>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="contact-info">
                    <div class="contact-info_icon">
                        <img src="{{ asset('assets/img/icon/contact-icon3.svg') }}" alt="Location Icon">
                    </div>
                    <div class="media-body">
                        <span class="contact-info_title">Service Station</span>
                        <h6 class="contact-info_text"><a href="tel:+5842521453">Orange Village</a></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Map Section -->
<div class="map-sec2">
    <iframe src="https://www.google.com/maps/embed?pb=YOUR_GOOGLE_MAPS_EMBED_URL" allowfullscreen=""
        loading="lazy"></iframe>
</div>

<!-- Contact Form Section -->
<div class="container">
    <div class="contact-form-area space-bottom">
        <div class="row g-0">
            <!-- Hero Image Section -->
            <div class="col-lg-4">
                <div class="hero-img-container">
                    <img src="{{ asset('assets/img/normal/about_1-1.png') }}" alt="Hero Image"
                        class="img-fluid hero-img">
                </div>
            </div>
            <div class="col-lg-8 bg-smoke2">
                <div class="contact-form-wrap">
                    <div class="title-area">
                        <span class="sub-title">Contact Us</span>
                        <h2 class="sec-title">Send Us a Message</h2>
                    </div>
                    <form id="contactForm" action="{{ route('messages.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group col-12">
                                <label for="message">Your Message</label>
                                <textarea name="message" id="message" class="form-control" placeholder="Enter Your Message Here" required></textarea>
                            </div>
                    
                            <div class="form-btn col-12">
                                <button type="submit" class="btn btn-danger" id="sendMessageButton">Send Message</button>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .rotate-y {
        animation: rotateIcon 1s ease-in-out;
    }

    @keyframes rotateIcon {
        0% {
            transform: rotateY(0deg);
        }

        100% {
            transform: rotateY(360deg);
        }
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.1/dist/sweetalert2.all.min.js"></script>

<script>
    const sendMessageIcon =
        '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="32"><path d="M342.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L160 178.7l-57.4-57.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l80 80c12.5 12.5 32.8 12.5 45.3 0l160-160zm96 128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L160 402.7 54.6 297.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l256-256z" fill="currentColor" /></svg>';

    document.addEventListener('DOMContentLoaded', function() {
        const sendMessageButton = document.getElementById('sendMessageButton');
        const contactForm = document.getElementById('contactForm');

        sendMessageButton.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent form from submitting immediately

            Swal.fire({
                title: 'Message Sent!',
                text: 'Your message has been sent successfully.',
                icon: 'success',
                iconHtml: sendMessageIcon,
                customClass: {
                    icon: 'rotate-y', // Ensure this class is defined in your CSS for animation
                },
            }).then((result) => {
                if (result.isConfirmed) {
                    contactForm.submit(); // Submit the form after SweetAlert is closed
                }
            });
        });
    });
</script>

@include('components.layout4')
