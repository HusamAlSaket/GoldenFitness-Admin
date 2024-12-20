<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <style>
        .fitness-footer {
            background-color: #121212;
            color: #ffffff;
            padding: 4rem 0;
            font-family: 'Arial', sans-serif;
        }

        .fitness-footer .footer-logo {
            height: 60px;
            filter: brightness(0) saturate(100%) invert(20%) sepia(90%) saturate(5735%) hue-rotate(359deg) brightness(94%) contrast(114%);
        }

        .fitness-footer .section-title {
            color: #ff1a1a;
            font-weight: 700;
            margin-bottom: 1.5rem;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .fitness-footer .quick-links a {
            color: #a0a0a0;
            text-decoration: none;
            transition: all 0.3s ease;
            position: relative;
        }

        .fitness-footer .quick-links a:hover {
            color: #ff1a1a;
            padding-left: 10px;
        }

        .fitness-footer .quick-links a::before {
            content: '→';
            position: absolute;
            left: -15px;
            opacity: 0;
            transition: all 0.3s ease;
        }

        .fitness-footer .quick-links a:hover::before {
            opacity: 1;
            left: -20px;
        }

        .fitness-footer .social-icons a {
            color: #a0a0a0;
            margin-right: 1rem;
            font-size: 1.5rem;
            transition: color 0.3s ease;
        }

        .fitness-footer .social-icons a:hover {
            color: #ff1a1a;
        }

        .fitness-footer .newsletter-form .form-control {
            background-color: #1e1e1e;
            border: 1px solid #333;
            color: #ffffff;
        }

        .fitness-footer .newsletter-form .btn-subscribe {
            background-color: #ff1a1a;
            border: none;
            transition: transform 0.3s ease;
        }

        .fitness-footer .newsletter-form .btn-subscribe:hover {
            transform: scale(1.05);
            background-color: #ff3333;
        }

        .fitness-footer .copyright {
            color: #777;
            margin-top: 2rem;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>
    <footer class="fitness-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h3 class="footer-logo mb-3">Golden Fitness</h3>
                    <p class="text-light">Transforming bodies and lives through cutting-edge fitness solutions and
                        personalized training.</p>

                    <div class="social-icons mt-3">
                        <a href="#" class="me-3"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="me-3"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="me-3"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <h5 class="section-title">Quick Links</h5>
                    <div class="quick-links">
                        <a href="{{route('users.videos.index')}}" class="d-block mb-2 text-white">Guides </a>
                        <a href="{{route('user.subscriptions.create')}}" class="d-block mb-2 text-white">Membership</a>
                        <a href="{{route('users.blogs.index')}}" class="d-block mb-2 text-white">Blogs</a>
                        <a href="{{route('about.index')}}" class="d-block mb-2 text-white">About Us</a>
                        <a href="{{route('contact.index')}}" class="d-block mb-2 text-white">Contact Us</a>

                    </div>
                </div>
                <style>
                    .form-control::placeholder {
                        color: white;
                    }
                </style>
                <div class="col-md-4 mb-4">
                    <h5 class="section-title">Stay Updated</h5>
                    <p class="text-light mb-3">Subscribe for exclusive fitness tips and offers!</p>

                    <form class="newsletter-form">
                        <div class="input-group">
                            <input type="email" class="form-control" placeholder="Your email address" required>
                            <button class="btn btn-subscribe text-white" type="submit">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>

            <hr class="border-secondary my-4">

            <div class="text-center">
                <p class="copyright">&copy; 2024 GoldenFitness. All Rights Reserved.</p>
            </div>
        </div>
    </footer>
</body>



<!-- Scroll To Top -->
<div class="scroll-top">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"
            style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;">
        </path>
    </svg>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-B4gt1jrGC7Jh4AgGGszZfQj1vna4eq/3H7cS2n6lgZ7Qbx91z5kU7y5Y93Y0tIu" crossorigin="anonymous"></script>
<script src="{{ asset('assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/js/slick.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('assets/js/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('js/jquery.min.js') }}"></script>

</body>

</html>
