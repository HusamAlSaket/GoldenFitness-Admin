<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Golden Fitness</title>
    <meta name="description" content="Golden Fitness">
    <meta name="keywords" content="Golden Fitness">
    <meta name="robots" content="INDEX,FOLLOW">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('assets/img/favicons/ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="{{ asset('css/style3.css') }}">
    <!-- Favicons - Place favicon.ico in the root directory -->
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.min.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/logo.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEJ03RbbkQgs2hhXAR5zV6b1usdfvI0r27OkSH9Yk0jA0p5TKw0e5MX0cBXwD" crossorigin="anonymous">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicons/favicon.png') }}">
    <link rel="manifest" href="{{ asset('assets/img/favicons/manifest.json') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;600;700;800&amp;family=Kumbh+Sans:wght@300;400;500;600;700&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>

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
                        <a href="index.html"><img src="{{ asset('assets/img/logo-white.svg') }}" alt="Gold"></a>
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
            <button class="menu-toggle"><i class="bi bi-x"></i></button> <!-- Bootstrap close icon -->
            <div class="mobile-logo">
                <a href="index.html"><img src="{{ asset('assets/img/logo.svg') }}" alt="Gold"></a>
            </div>
            <div class="mobile-menu">
                <ul>
                    <li class="menu-item-has-children">
                        <a href="{{ route('home.index') }}">Home <i class="bi bi-house-door"></i></a>
                        <!-- Bootstrap Home icon -->
                    </li>
                    <li class="menu-item-has-children">
                        <a href="{{ route('products.index') }}">Gym Equipments <i class="bi bi-file-earmark"></i></a>
                        <!-- Bootstrap File icon -->
                    </li>
                    <li class="menu-item-has-children">
                        <a href="#">Project <i class="bi bi-collection"></i></a> <!-- Bootstrap Project icon -->
                    </li>
                    {{-- <li class="menu-item-has-children">
                        <a href="{{ route('user.subscriptions.index') }}">Subscriptions <i class="bi bi-gear"></i></a>
                        <!-- Bootstrap Gear icon -->
                    </li> --}}
                    <li class="menu-item-has-children">
                        <a href="{{ route('users.blogs.index') }}">Blog <i class="bi bi-pencil"></i></a>
                        <!-- Bootstrap Blog icon -->
                    </li>
                    <li>
                        <a href="{{ route('contact.index') }}">Contact <i class="bi bi-telephone"></i></a>
                        <!-- Bootstrap Phone icon -->
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
                                        <a href="{{ route('home.index') }}"><i class="bi bi-house-door"></i> Home</a>
                                        <!-- Bootstrap Home icon -->
                                    </li>
                                    <li>
                                        <a href="{{ route('about.index') }}"><i class="bi bi-info-circle"></i>
                                            About</a> <!-- Bootstrap Info Circle icon -->
                                    </li>
                                    <li>
                                        <a href="{{ route('user.subscriptions.create') }}"><i class="bi bi-gear"></i>
                                            Subscriptions</a> <!-- Bootstrap Gear icon -->
                                    </li>
                                    {{-- <li>
                                        <a href="{{ route('user.subscriptions.index') }}"><i class="bi bi-gear"></i>
                                            Active Subscriptions</a> <!-- Bootstrap Gear icon -->
                                    </li> --}}
                                    <li>
                                        <a href="{{ route('products.index') }}"><i class="bi bi-file-earmark"></i>
                                            Gym Equipments</a> <!-- Bootstrap File icon -->
                                    </li>
                                    <li>
                                        <a href="{{ route('users.blogs.index') }}"><i class="bi bi-pencil"></i>
                                            Blog</a> <!-- Bootstrap Pencil icon -->
                                    </li>
                                    <li>
                                        <a href="{{ route('users.supplements.index') }}"><i class="bi bi-star"></i>
                                            Supplements</a> <!-- Bootstrap Pencil icon -->
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-play-circle"></i> Videos
                                            <!-- Bootstrap Play Circle icon -->
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ route('users.videos.index') }}">Educational Videos</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ route('users.videos.premium') }}">Premium Content</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="{{ route('contact.index') }}"><i class="bi bi-telephone"></i>
                                            Contact</a> <!-- Bootstrap Phone icon -->
                                    </li>
                                </ul>

                                <!-- Cart Icon container aligned to the right -->
                                <ul class="ms-auto m-0 p-0">
                                    <li>
                                        <div class="cart-icon-container">
                                            <button type="button" data-bs-toggle="modal" data-bs-target="#cartModal"
                                                class="cart-btn position-relative"
                                                style="background: transparent; border: none; padding: 10px;">
                                                <i class="bi bi-cart" style="font-size: 24px; color: #dc3545;"></i>
                                                <!-- Bootstrap Cart icon -->
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

                        <button type="button" id="checkoutButton" class="btn btn-danger">Checkout</button>

                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                        <script>
                            document.getElementById('checkoutButton').addEventListener('click', function() {
                                fetch("{{ route('checkout.index') }}", {
                                        method: "GET",
                                        headers: {
                                            "X-Requested-With": "XMLHttpRequest", // Ensure Laravel knows it's an AJAX request
                                        },
                                    })
                                    .then(response => {
                                        if (response.status === 403) {
                                            return response.json().then(data => {
                                                Swal.fire({
                                                    icon: "warning",
                                                    title: "Not Logged In",
                                                    text: data.message,
                                                    confirmButtonText: "Login Now",
                                                }).then(() => {
                                                    window.location.href = data.redirect;
                                                });
                                            });
                                        } else if (response.ok) {
                                            window.location.href = "{{ route('checkout.index') }}";
                                        }
                                    })
                                    .catch(error => {
                                        console.error("Error:", error);
                                    });
                            });
                        </script>


                    </div>
                </div>

            </div>
        </div>
    </div>
