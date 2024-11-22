<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Products Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body>
    <div class="container-fluid">
        <!-- Sidebar -->
        <nav class="sidebar" id="sidebar">
            <i class="bi bi-list toggle-sidebar" id="toggleSidebar"></i>
            <div class="sidebar-logo">
                <h3>Admin Panel</h3>
            </div>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admins.dashboard') }}">
                        <i class="bi bi-speedometer2"></i> <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('users.index') }}">
                        <i class="bi bi-people"></i> <span>Users</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('products.index') }}">
                        <i class="bi bi-box"></i> <span>Products</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('subscriptions.index') }}">
                        <i class="bi bi-list-ul"></i> <span>Subscriptions</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('messages.index') }}">
                        <i class="bi bi-chat-left"></i> <span>Messages</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('reviews.index') }}">
                        <i class="bi bi-list-ul"></i> <span>Reviews</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('categories.index') }}">
                        <i class="bi bi-list-ul"></i> <span>Categories</span>
                    </a>
                </li>
            </ul>
        </nav>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            // Sidebar Toggle
            document.getElementById('toggleSidebar').addEventListener('click', function() {
                const sidebar = document.getElementById('sidebar');
                const mainContent = document.getElementById('mainContent');

                sidebar.classList.toggle('collapsed');
                mainContent.classList.toggle('collapsed');
            });

            // Search functionality
            const searchInput = document.querySelector('input[placeholder="Search products..."]');
            searchInput.addEventListener('keyup', function() {
                const filter = this.value.toLowerCase();
                const rows = document.querySelectorAll('tbody tr');

                rows.forEach(row => {
                    const text = row.textContent.toLowerCase();
                    row.style.display = text.includes(filter) ? '' : 'none';
                });
            });
        </script>
        <!-- Include SweetAlert CDN in the head section of your layout file -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Get all the nav-link elements
                const navLinks = document.querySelectorAll('.nav-link');

                // Get the current URL path
                const currentPath = window.location.pathname;

                // Loop through all nav-links and add 'active' class to the matching one
                navLinks.forEach(link => {
                    // If the link's href matches the current path, add the 'active' class
                    if (link.href.includes(currentPath)) {
                        link.classList.add('active');
                    } else {
                        link.classList.remove('active');
                    }
                });
            });
        </script>
        <script>
            import Swal from 'sweetalert2';
        </script>

</body>

</html>
