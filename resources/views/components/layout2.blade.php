<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Products Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --primary-red: #FF4C4C;
            --secondary-red: #FF6B6B;
            --light-bg: #f4f4f4;
            --white: #ffffff;
            --dark-text: #333;
        }

        body {
            background-color: var(--light-bg);
            font-family: 'Arial', sans-serif;
        }

        .sidebar {
            background: linear-gradient(to bottom, var(--primary-red), var(--secondary-red));
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            transition: all 0.3s;
            box-shadow: 5px 0 15px rgba(0, 0, 0, 0.1);
            width: 250px;
        }

        .sidebar.collapsed {
            width: 80px;
        }

        .sidebar.collapsed .nav-link span {
            display: none;
        }

        .main-content {
            transition: all 0.3s;
            margin-left: 250px;
            padding: 20px;
        }

        .main-content.collapsed {
            margin-left: 80px;
        }

        .sidebar-logo {
            background-color: rgba(255, 255, 255, 0.1);
            padding: 15px;
            text-align: center;
            color: white;
        }

        .nav-link {
            color: rgba(255, 255, 255, 0.7);
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
        }

        .nav-link:hover,
        .nav-link.active {
            background-color: rgba(255, 255, 255, 0.2);
            color: white;
        }

        .nav-link i {
            margin-right: 10px;
            font-size: 1.2rem;
        }

        .toggle-sidebar {
            position: absolute;
            top: 15px;
            right: 15px;
            color: white;
            cursor: pointer;
        }

        .products-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .product-stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 20px;
        }

        .stat-card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            display: flex;
            align-items: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .stat-card i {
            font-size: 2.5rem;
            margin-right: 15px;
            color: var(--primary-red);
        }

        .products-table-container {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .action-buttons {
            display: flex;
            gap: 5px;
        }

        .product-image {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 5px;
        }
    </style>
</head>
<script>
    import Swal from 'sweetalert2';

</script>
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
                    <a class="nav-link" href="{{ route('admins.users') }}">
                        <i class="bi bi-people"></i> <span>Users</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{route('products.index')}}">
                        <i class="bi bi-box"></i> <span>Products</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('subscriptions.index')}}">
                        <i class="bi bi-list-ul"></i> <span>Subscriptions</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="messages.html">
                        <i class="bi bi-chat-left"></i> <span>Messages</span>
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
<script>document.addEventListener('DOMContentLoaded', function() {
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
