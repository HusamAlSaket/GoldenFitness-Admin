<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoldenFitness Admin Dashboard</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- FullCalendar CSS -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.css" rel="stylesheet">
    

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
                        <i class="bi bi-house-door"></i> <span>Dashboard</span>
                    </a>
                </li>
                <!-- Add more sidebar items here as needed -->
            </ul>
        </nav>

        <!-- Main content -->
        <div class="main-content" id="mainContent">
            <!-- Header -->


            <!-- Stats Grid -->



            <!-- Bootstrap JS and dependencies -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
            <script>
                // Sidebar toggle functionality
                const toggleSidebar = document.getElementById('toggleSidebar');
                const sidebar = document.getElementById('sidebar');
                const mainContent = document.getElementById('mainContent');

                toggleSidebar.addEventListener('click', () => {
                    sidebar.classList.toggle('collapsed');
                    mainContent.classList.toggle('collapsed');
                });
            </script>
</body>

</html>
