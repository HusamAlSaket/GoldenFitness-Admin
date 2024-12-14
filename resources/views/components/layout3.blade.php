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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  
</head>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

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
    <header class="nav-header header-layout1" style="background: linear-gradient(135deg, #121212 0%, #1e1e1e 100%); position: sticky; top: 0; z-index: 999; box-shadow: 0 4px 6px rgba(255,0,0,0.1);">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-dark fitness-navbar" style="padding: 10px 15px; height: 85px;">
                <!-- Logo Section -->
                <div class="d-flex align-items-center">
                    <a class="navbar-brand d-flex align-items-center" href="{{ route('home.index') }}" style="transition: transform 0.2s;">
                        <x-logo class="w-16 h-16 animate-pulse-slow" style="filter: drop-shadow(0 0 3px rgba(255,0,0,0.3));" />
                        <span style="color: #ff2020; margin-left: 10px; font-size: 1.4rem; font-weight: 700; letter-spacing: -0.5px;">
                            Golden Fitness
                        </span>
                    </a>
                </div>
    
                <!-- Mobile Toggle Button -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"
                    style="border: 2px solid #ff2020; background-color: transparent;">
                    <span class="navbar-toggler-icon"></span>
                </button>
    
                <!-- Collapsible Navbar Content -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <!-- Main Navigation Links -->
                    <ul class="navbar-nav mx-auto" style="gap: 20px;">
                        @php
                            $navItems = [
                                ['route' => 'home.index', 'label' => 'Home'],
                                ['route' => 'about.index', 'label' => 'About'],
                                ['route' => 'products.index', 'label' => 'Gym Equipments'],
                                ['route' => 'users.blogs.index', 'label' => 'Blog'],
                                ['route' => 'users.supplements.index', 'label' => 'Supplements']
                            ];
                        @endphp
    
                        @foreach($navItems as $item)
                            <li class="nav-item">
                                <a href="{{ route($item['route']) }}" class="nav-link" 
                                   style="color: #ff2020; font-size: 1rem;">
                                    {{ $item['label'] }}
                                </a>
                            </li>
                        @endforeach
    
                        <!-- Videos Dropdown -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" 
                               role="button" data-bs-toggle="dropdown" 
                               aria-expanded="false" 
                               style="color: #ff2020; font-size: 1rem;">
                                Videos
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="dropdown-item" href="{{ route('users.videos.index') }}">
                                        Educational Videos
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('users.videos.premium') }}">
                                        Premium Content
                                    </a>
                                </li>
                            </ul>
                        </li>
    
                        <!-- Subscriptions Dropdown -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownSubscriptions" 
                               role="button" data-bs-toggle="dropdown" 
                               aria-expanded="false" 
                               style="color: #ff2020; font-size: 1rem;">
                                Subscriptions
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownSubscriptions">
                                <li>
                                    <a class="dropdown-item" href="{{ route('user.subscriptions.create') }}">
                                        Subscriptions
                                    </a>
                                </li>
                            </ul>
                        </li>
    
                        <li class="nav-item">
                            <a href="{{ route('contact.index') }}" class="nav-link" 
                               style="color: #ff2020; font-size: 1rem;">
                                Contact
                            </a>
                        </li>
    
                        <!-- User Authentication -->
                        @auth
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown"
                                   role="button" data-bs-toggle="dropdown"
                                   aria-expanded="false"
                                   style="color: #ff2020; font-size: 1rem;">
                                    Profile
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="userDropdown">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('show') }}">
                                            View Profile
                                        </a>
                                    </li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="dropdown-item">
                                                Logout
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endauth
    
                        @guest
                            <li class="nav-item">
                                <a href="{{ route('login') }}" class="nav-link" 
                                   style="color: #ff2020; 
                                          border: 2px solid #ff2020; 
                                          border-radius: 20px; 
                                          padding: 5px 15px;">
                                    Login
                                </a>
                            </li>
                        @endguest
                    </ul>
    
                    <!-- Cart Icon -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#cartModal"
                                class="cart-btn position-relative" 
                                style="background: transparent; 
                                       border: none; 
                                       position: relative; 
                                       transition: transform 0.2s;">
                                <i class="bi bi-cart" style="font-size: 24px; color: #ff2020;"></i>
                                <span class="cart-count badge rounded-circle bg-danger position-absolute top-0 start-100 translate-middle"
                                    style="font-size: 12px; 
                                           padding: 3px 6px; 
                                           line-height: 1;">
                                    {{ collect(session('cart', []))->sum('quantity') }}
                                </span>
                            </button>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    
    <style>
        /* Dropdown Menu Styling */
        .dropdown-menu {
            background-color: #1a1a1a;
            border: 1px solid #ff2020;
        }
        
        .dropdown-item {
            color: #ff2020;
            transition: background-color 0.3s ease;
        }
        
        .dropdown-item:hover {
            background-color: rgba(255,32,32,0.1);
            color: #ff4040;
        }
        
        /* Mobile Responsiveness */
        @media (max-width: 991px) {
            .navbar-collapse {
                background-color: #1e1e1e;
                padding: 15px;
                max-height: 80vh;
                overflow-y: auto;
            }
            
            .navbar-nav {
                gap: 10px;
            }
        }
    </style>
    
    <!-- Ensure these are included in your layout -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    