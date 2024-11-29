<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Golden Fitness</title>
    <meta name="description" content="Fitmas - Gym & Fitness HTML Template">
    <meta name="keywords" content="Fitmas - Gym & Fitness HTML Template">
    <meta name="robots" content="INDEX,FOLLOW">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{ asset('css/style3.css') }}">
    <!-- Favicons - Place favicon.ico in the root directory -->
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.min.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/logo.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">


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
                                <x-logo class="w-16 h-16 animate-pulse-slow" />
                                <span>Golden Fitness</span>
                            </div>

                        </div>
                        <div class="col-auto">
                            <nav class="main-menu d-none d-lg-inline-block">
                                <ul class="d-flex justify-content-start m-0 p-0">
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
                                        <a href="{{ route('products.index') }}"><i class="fa fa-file"></i> Gym
                                            Equipments</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('home.index') }}"><i class="fa fa-blog"></i> Blog</a>
                                    </li>
                                    <li>
                                        <a href="contact.html"><i class="fa fa-phone-alt"></i> Contact</a>
                                    </li>
                                </ul>

                                <!-- Cart Icon container aligned to the right -->
                                <ul class="ms-auto m-0 p-0">
                                    <li>
                                        <div class="cart-icon-container">
                                            <button type="button" data-bs-toggle="modal" data-bs-target="#cartModal"
                                                class="cart-btn position-relative"
                                                style="background: transparent; border: none; padding: 10px;">
                                                <i class="fas fa-shopping-cart"
                                                    style="font-size: 24px; color: #dc3545;"></i>
                                                <span
                                                    class="cart-count badge rounded-pill bg-danger position-absolute top-0 start-100 translate-middle"
                                                    style="font-size: 12px; margin-top: -10px;">
                                                    {{ collect(session('cart', []))->sum('quantity') }}
                                                </span>
                                            </button>
                                        </div>
                                    </li>
                                </ul>
                            </nav>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <style>
        #cartModal .modal-dialog {
            max-width: 650px;
            margin: 0;
            position: fixed;
            top: 0;
            right: 0;
            height: 100vh;
            transform: none;
            transition: all 0.3s ease;
        }

        #cartModal .modal-content {
            height: 100%;
            border-radius: 0;
            border-left: 4px solid #dc3545;
            box-shadow: -8px 0 20px rgba(0, 0, 0, 0.1);
            background: linear-gradient(to bottom right, #ffffff, #f8f9fa);
            padding: 20px;
        }

        #cartModal .modal-header {
            background: linear-gradient(90deg, #dc3545 0%, #ff6b6b 100%);
            color: white;
            padding: 20px;
            border-bottom: none;
        }

        #cartModal .modal-title {
            color: white;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        #cartModal .table {
            margin-bottom: 0;
            font-size: 16px;
        }

        #cartModal .table thead {
            background: rgba(220, 53, 69, 0.1);
        }

        #cartModal .table thead th {
            color: #dc3545;
            font-weight: 600;
            text-transform: uppercase;
            border-bottom: 2px solid #dc3545;
        }

        #cartModal .table tbody tr:hover {
            background-color: rgba(220, 53, 69, 0.05);
            transition: background-color 0.3s ease;
        }

        #cartModal .modal-footer {
            background: linear-gradient(to right, #f8f9fa, #ffffff);
            border-top: 2px solid #dc3545;
            padding: 15px 20px;
        }

        #cartModal .table img {
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 60px;
            height: 60px;
            object-fit: cover;
        }

        .cart-btn {
            background-color: #dc3545;
            color: white;
            border-radius: 50%;
            padding: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .cart-btn:hover {
            background-color: #ff6b6b;
            transform: scale(1.1);
        }

        .cart-count {
            font-size: 14px;
            background-color: #ff6b6b;
            color: white;
            padding: 5px 10px;
            border-radius: 50%;
        }

        .btn-sm {
            font-size: 14px;
            padding: 5px 10px;
        }

        .btn-danger {
            background-color: #dc3545;
            border: none;
            padding: 10px 20px;
            font-weight: bold;
        }

        .btn-danger:hover {
            background-color: #ff6b6b;
        }

        @media (max-width: 768px) {
            #cartModal .modal-dialog {
                max-width: 100%;
                margin: 0;
            }

            .cart-btn {
                padding: 15px;
            }
        }
    </style>




    {{-- cart modal --}}



    <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cartModalLabel">Your Cart</h5>
                    <button type="button" class="btn-close btn-close-white custom-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    @if (session('cart') && count(session('cart')) > 0)
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $totalPrice = 0;
                                @endphp
                                @foreach (session('cart') as $id => $item)
                                    @php
                                        $itemTotal = $item['price'] * $item['quantity'];
                                        $totalPrice += $itemTotal;
                                    @endphp
                                    <tr>
                                        <td><img src="{{ asset('storage/' . $item['image_url']) }}"
                                                alt="{{ $item['name'] }}"
                                                style="width:60px; height:60px; object-fit: cover;"></td>
                                        <td>{{ $item['name'] }}</td>
                                        <td>${{ number_format($item['price'], 2) }}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <form action="{{ route('cart.update', [$id, 'increase']) }}"
                                                    method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-sm btn-outline-primary">
                                                        <i class="bi bi-plus"></i>
                                                    </button>
                                                </form>
                                                <span class="mx-2">{{ $item['quantity'] }}</span>
                                                <form action="{{ route('cart.update', [$id, 'decrease']) }}"
                                                    method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-sm btn-outline-primary">
                                                        <i class="bi bi-minus">-</i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                        <td>${{ number_format($itemTotal, 2) }}</td>
                                        <td>
                                            <form action="{{ route('cart.remove', $id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Remove</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>Your cart is empty.</p>
                    @endif
                </div>
                <div class="modal-footer">
                    <div class="d-flex justify-content-between w-100">
                        <!-- Total Price on the left -->
                        <h5>Total Price: $<?php echo isset($totalPrice) && $totalPrice > 0 ? number_format($totalPrice, 2) : '0.00'; ?></h5>

                        <!-- Checkout button on the right -->
                        <form action="{{ route('checkout.index') }}" method="GET">
                            <button type="submit" class="btn btn-danger">Checkout</button>
                        </form>
                        
                    </div>
            </div>

            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
</body>

</html>
