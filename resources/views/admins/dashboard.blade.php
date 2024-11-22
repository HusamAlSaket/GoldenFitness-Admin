@extends('components.layout')

<!-- Main Content -->
<main class="main-content px-4 py-5" id="mainContent"> 
    <!-- Stats Grid -->
    <div class="stats-grid d-flex flex-wrap gap-4 justify-content-center mb-4">
        <div class="stat-card rounded shadow-sm p-3 d-flex align-items-center gap-3 bg-light"
            style="min-width: 300px; height: 100px;">
            <i class="bi bi-people fs-2 text-danger"></i>
            <div>
                <h5 class="mb-1">{{ $totalUsers }}</h5> 
                <small class="text-muted">Total Users</small>
            </div>
        </div>
        <div class="stat-card rounded shadow-sm p-3 d-flex align-items-center gap-3 bg-light"
            style="min-width: 300px; height: 100px;">
            <i class="bi bi-box fs-2 text-danger"></i>
            <div>
                <h5 class="mb-1">{{ $totalProducts }}</h5>
                <small class="text-muted">Products</small>
            </div>
        </div>
        <div class="stat-card rounded shadow-sm p-3 d-flex align-items-center gap-3 bg-light"
            style="min-width: 300px; height: 100px;">
            <i class="bi bi-cart fs-2 text-danger"></i>
            <div>
                <h5 class="mb-1">{{ $totalOrders }}</h5>
                <small class="text-muted">Orders</small>
            </div>
        </div>
        <div class="stat-card rounded shadow-sm p-3 d-flex align-items-center gap-3 bg-light"
            style="min-width: 300px; height: 100px;">
            <i class="bi bi-cash-coin fs-2 text-danger"></i>
            <div>
                <h5 class="mb-1">{{ $Subscriptions }}</h5>
                <small class="text-muted">Subscriptions</small>
            </div>
        </div>
    </div>

    <!-- Charts Row (Updated to display next to each other) -->
    <div class="row gx-4 gy-4 mb-4">
        <!-- Sales Chart -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-lg">
                <div class="card-header bg-danger text-white text-center">
                    <h5 class="mb-0">Monthly Sales</h5>
                </div>
                <div class="card-body">
                    <canvas id="salesChart" style="height: 300px;"></canvas>
                </div>
            </div>
        </div>

        <!-- Subscriptions Chart -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-lg">
                <div class="card-header bg-danger text-white text-center">
                    <h5 class="mb-0">Active Subscriptions</h5>
                </div>
                <div class="card-body">
                    <canvas id="subscriptionsChart" style="height: 300px;"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Calendar -->
    <div class="row align-items-stretch mb-4">
        <!-- Calendar Section -->
        <div class="col-lg-6 mb-4 d-flex h-100">
            <div class="calendar-container flex-fill"
                style="min-height: 400px; background-color: #ffffff; border: 2px solid #dc3545; border-radius: 8px; padding: 10px; margin-top: 30px;">
                <div id="calendar"></div>
            </div>
        </div>
    </div>
</main>

<!-- Footer -->
<footer class="bg-danger text-white text-center py-4">
    <h5 class="mb-0">© 2024 GoldenFitness</h5> <br>
    <h6> All
        rights reserved.</h6>

</footer>

<!-- Include Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Include FullCalendar CSS and JS -->
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js"></script>

<!-- FullCalendar and Chart JS -->
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
            // Customizing the calendar's style to match the red and white theme
            themeSystem: 'bootstrap5', // Optional for a cleaner, bootstrap-like design
            dayHeaderClassNames: ['bg-danger', 'text-white'], // Red header with white text
            buttonText: {
                today: 'Today',
                month: 'Month',
                week: 'Week',
                day: 'Day'
            },
            // Customizing the active date
            dayCellClassNames: ['text-danger'], // Add red color for the day text
            headerClassNames: ['bg-danger', 'text-white'], // Red header with white text
            footerClassNames: ['bg-danger', 'text-white'], // Red footer with white text
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
