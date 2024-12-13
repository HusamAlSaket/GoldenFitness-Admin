@include('components.layout')

<!-- Bootstrap 5 CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

<div class="container-fluid px-4 py-4">
    <header class="mb-4 d-flex justify-content-between align-items-center">
        <h1 class="text-danger">GoldenFitness Dashboard</h1>
        <div class="d-flex align-items-center">
            <span class="me-3 text-muted">Welcome, Admin</span>
            <div class="dropdown">
                <button class="btn btn-outline-danger dropdown-toggle" type="button" data-bs-toggle="dropdown">
                    <i class="bi bi-person-circle me-2"></i> Profile
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Settings</a></li>

                </ul>
            </div>
            <!-- Visible Logout Button -->
            <a href="#" class="btn btn-outline-danger ms-3"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="bi bi-box-arrow-right"></i> Logout
            </a>
            <form id="logout-form" method="POST" action="{{ route('logout') }}" class="d-none">
                @csrf
            </form>
        </div>
    </header>


    <div class="row message-stats mb-4">
        <div class="col-4">
            <div class="stat-card">
                <i class="bi bi-people"></i>
                <div>
                    <h5 class="mb-0">{{ $totalUsers }}</h5>
                    <small class="text-muted">Total Users</small>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="stat-card">
                <i class="bi bi-calendar"></i>
                <div>
                    <h5 class="mb-0">{{ $totalProducts }}</h5>
                    <small class="text-muted">Total Products</small>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="stat-card">
                <i class="bi bi-clock"></i>
                <div>
                    <h5 class="mb-0">{{ $totalOrders }}</h5>
                    <small class="text-muted">Total Orders</small>
                </div>
            </div>
        </div>

    </div>



    <!-- Charts Row -->
    <div class="row g-4 mb-4">
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm ">
                <div class="card-header text-white text-center py-3">
                    <h5 class="mb-0">Monthly Sales</h5>
                </div>
                <div class="card-body">
                    <canvas id="salesChart" style="height: 300px;"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm">
                <div class="card-header text-white text-center py-3">
                    <h5 class="mb-0">Active Subscriptions</h5>
                </div>
                <div class="card-body">
                    <canvas id="subscriptionsChart" style="height: 300px;"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Calendar Section -->
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header text-white text-center py-3">
                    <h5 class="mb-0">Upcoming Events</h5>
                </div>
                <div class="card-body">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Bootstrap JS and Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- FullCalendar -->
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js"></script>

<script>
    // Initialize FullCalendar with red and white theme
    document.addEventListener('DOMContentLoaded', function() {
        const calendarEl = document.getElementById('calendar');

        const calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,dayGridWeek,dayGridDay'
            },
            eventColor: '#dc3545', // Red event color
            eventTextColor: 'white', // White text on events
            events: [
                // Example Events, replace with actual data if needed
                {
                    title: 'Product Launch',
                    start: '2024-11-25T10:00:00',
                    end: '2024-11-25T12:00:00',
                    description: 'Launch of new furniture line.'
                },
                {
                    title: 'Fitness Workshop',
                    start: '2024-11-28T14:00:00',
                    end: '2024-11-28T16:00:00',
                    description: 'Fitness workshop for users.'
                }
            ],
            eventClick: function(info) {
                alert('Event: ' + info.event.title + '\nDescription: ' + info.event.extendedProps
                    .description);
            },
            themeSystem: 'bootstrap5',
            dayHeaderClassNames: ['bg-danger', 'text-white'],
            buttonText: {
                today: 'Today',
                month: 'Month',
                week: 'Week',
                day: 'Day'
            },
            dayCellClassNames: ['text-danger'],
            headerClassNames: ['bg-danger', 'text-white'],
            footerClassNames: ['bg-danger', 'text-white'],
        });

        calendar.render();
    });

    // Parse JSON data passed from the controller
    const salesData = JSON.parse(@json($salesDataJson));
    const subscriptionData = JSON.parse(@json($subscriptionDataJson));

    // Labels for the months
    const months = ['January', 'February', 'March', 'April', 'May', 'June',
        'July', 'August', 'September', 'October', 'November', 'December'
    ];

    // Sales Chart (Line Chart)
    new Chart(document.getElementById('salesChart').getContext('2d'), {
        type: 'line',
        data: {
            labels: months,
            datasets: [{
                label: 'Monthly Sales',
                data: Object.values(salesData),
                borderColor: '#dc3545',
                backgroundColor: 'rgba(220, 53, 69, 0.2)',
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });

    // Subscriptions Chart (Bar Chart)
    new Chart(document.getElementById('subscriptionsChart').getContext('2d'), {
        type: 'bar',
        data: {
            labels: months,
            datasets: [{
                label: 'Active Subscriptions',
                data: Object.values(subscriptionData),
                backgroundColor: '#dc3545',
                borderColor: '#dc3545',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });
</script>

@include('components.layout2')
