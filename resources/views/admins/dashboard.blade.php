@extends('components.layout')

<!-- Main Content -->
<main class="main-content" id="mainContent">
    <!-- Stats Grid -->
    <div class="stats-grid">
        <div class="stat-card">
            <i class="bi bi-people"></i>
            <div>
                <h5 class="mb-0"> {{ $totalUsers }}</h5>
                <small class="text-muted">Total Users</small>
            </div>
        </div>
        <div class="stat-card">
            <i class="bi bi-box"></i>
            <div>
                <h5 class="mb-0">{{ $totalProducts }}</h5>
                <small class="text-muted">Products</small>
            </div>
        </div>
        <div class="stat-card">
            <i class="bi bi-cart"></i>
            <div>
                <h5 class="mb-0"> {{ $totalOrders }}</h5>
                <small class="text-muted">Orders</small>
            </div>
        </div>
        <div class="stat-card">
            <i class="bi bi-cash-coin"></i>
            <div>
                <h5 class="mb-0">{{ $Subscriptions }}</h5>
                <small class="text-muted">Subscriptions</small>
            </div>
        </div>
    </div>

    
    <!-- Charts and Calendar Row -->
    <div class="row">
        <!-- Sales Chart -->
        <div class="col-md-8">
            <div class="chart-container">
                <h5 class="mb-4">Monthly Sales</h5>
                <canvas id="salesChart"></canvas>
            </div>
        </div>
    </div>
    
<script>
    let salesChartInstance = null;  // Declare a variable to hold the chart instance

document.addEventListener('DOMContentLoaded', function () {
    // Get data from the server (passed as JSON)
    const salesData = @json($salesDataJson);  // Sales data for all 12 months
    const subscriptionData = @json($subscriptionDataJson);  // Subscription data for all 12 months

    // Prepare labels for all 12 months
    const labels = Array.from({ length: 12 }, (_, i) => {
        const date = new Date(2024, i); // Adjust year dynamically if needed
        return date.toLocaleString('default', { month: 'long' });
    });

    // Map sales data for each month (fill missing months with 0)
    const data = labels.map((_, i) => salesData[i + 1] || 0); // i + 1 because months are 1-based

    // Check if the chart instance already exists, if so, just update it
    if (salesChartInstance) {
        salesChartInstance.data.labels = labels;
        salesChartInstance.data.datasets[0].data = data;
        salesChartInstance.update();  // Update the chart without destroying it
        return;  // Exit to avoid re-creating the chart
    }

    // Create the chart only if it does not exist yet
    const ctx = document.getElementById('salesChart').getContext('2d');
    salesChartInstance = new Chart(ctx, {
        type: 'line',  // You can choose 'line', 'bar', etc.
        data: {
            labels: labels,
            datasets: [{
                label: 'Monthly Sales ($)',
                data: data,
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderWidth: 2,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return '$' + value.toLocaleString();
                        }
                    }
                }
            }
        }
    });
});

</script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>import Chart from 'chart.js/auto'; </script>
        
        <!-- Calendar -->
        <div class="col-md-4">
            <div class="chart-container">
                <h5 class="mb-4">Calendar</h5>
                <div id="calendar"></div>
            </div>
        </div>
    </div> 

    <!-- Products Section -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Recent Products</h5>
                    <button class="btn btn-primary btn-sm">
                        <i class="bi bi-plus me-2"></i>Add Product
                    </button>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <div class="card">
                                <img src="/api/placeholder/300/200" class="card-img-top" alt="Product">
                                <div class="card-body">
                                    <h6 class="card-title">Product Name</h6>
                                    <p class="card-text">$99.99</p>
                                    <a href="#" class="btn btn-outline-primary btn-sm">View Details</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="card">
                                <img src="/api/placeholder/300/200" class="card-img-top" alt="Product">
                                <div class="card-body">
                                    <h6 class="card-title">Product Name</h6>
                                    <p class="card-text">$79.99</p>
                                    <a href="#" class="btn btn-outline-primary btn-sm">View Details</a>
                                </div>
                            </div>




                        </div>
                        <!-- Add more product cards as needed -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</div>
