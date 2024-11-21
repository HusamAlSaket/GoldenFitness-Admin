<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
    
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
                    <a class="nav-link active" href="#">
                        <i class="bi bi-speedometer2"></i> <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admins.users')}}">
                        <i class="bi bi-people"></i> <span>Users</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('products.index')}}">
                        <i class="bi bi-box"></i> <span>Products</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('subscriptions.index')}}">
                        <i class="bi bi-list-ul"></i> <span>Subscriptions</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('messages.index')}}">
                        <i class="bi bi-list-ul"></i> <span>messages</span>
                    </a>
                </li>
            </ul>
        </nav>
<script>
    document.addEventListener('DOMContentLoaded', function () {
    // Sidebar toggle functionality
    const toggleSidebarBtn = document.getElementById('toggleSidebar');
    const sidebar = document.getElementById('sidebar');
    const mainContent = document.querySelector('.main-content');

    toggleSidebarBtn.addEventListener('click', function () {
        sidebar.classList.toggle('collapsed');
        mainContent.classList.toggle('collapsed');
    });

    // Highlight active nav-link based on the current path
    const navLinks = document.querySelectorAll('.nav-link');
    const currentPath = window.location.pathname;

    navLinks.forEach(link => {
        if (link.href.includes(currentPath)) {
            link.classList.add('active');
        } else {
            link.classList.remove('active');
        }
    });
});

</script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.7/main.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.7/main.min.css" rel="stylesheet">
    
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
    </body>
    </html>