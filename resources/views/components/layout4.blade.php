<style>
    .footer-modern {
        background-color: #1a1a2e;
        color: #ffffff;
        padding: 3rem 0;
    }

    .footer-modern a {
        color: #a0a0a0;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .footer-modern a:hover {
        color: #ffffff;
    }
</style>
</head>

<body>
    <footer class="footer-modern">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <img src="assets/img/logo-white.svg" alt="GoldenFitness" class="mb-3" style="height: 50px;">
                    <p class="text-white">A gym dedicated to physical fitness and exercise, offering comprehensive
                        wellness solutions.</p>

                    <div class="social-icons">
                        <a href="https://twitter.com/" class="me-3"><i class="fab fa-twitter text-light"></i></a>
                        <a href="https://linkedin.com/" class="me-3"><i class="fab fa-linkedin-in text-light"></i></a>
                        <a href="https://www.discord.com/"><i class="fab fa-discord text-light"></i></a>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <h5 class="mb-3">Quick Links</h5>
                    <div class="d-flex flex-column">
                        <a href="about.html" class="mb-2 text-white">About Us</a>
                        <a href="service-details.html" class="mb-2 text-white">Our Mission</a>
                        <a href="team.html" class="mb-2 text-white">Meet The Team</a>
                        <a href="contact.html" class="text-white">Contact Us</a>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <h5 class="mb-3">Newsletter</h5>
                    <p class="text-white">Get 10% off your first order!</p>
                    <form>
                        <div class="input-group">
                            <input type="email" class="form-control" placeholder="Enter your email" required>
                            <button class="btn btn-primary" type="submit">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>

            <hr class="my-4 bg-secondary">

            <div class="text-center">
                <p class="mb-0 text-white">&copy; 2024 GoldenFitness. All Rights Reserved.</p>
            </div>
        </div>
    </footer>


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
