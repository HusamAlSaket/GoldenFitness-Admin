@extends('components.layout2')

<!-- Main Content -->
<main class="main-content" id="mainContent">
    <!-- Review Stats Grid -->
    <div class="row review-stats mb-4">
        <div class="col-4">
            <div class="stat-card">
                <i class="bi bi-card-checklist"></i>
                <div>
                    <h5 class="mb-0">{{ $reviews->count() }}</h5>
                    <small class="text-muted">Total Reviews</small>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="stat-card">
                <i class="bi bi-hand-thumbs-up"></i>
                <div>
                    <h5 class="mb-0">{{ $reviews->where('status', 'approved')->count() }}</h5>
                    <small class="text-muted">Approved Reviews</small>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="stat-card">
                <i class="bi bi-hand-thumbs-down"></i>
                <div>
                    <h5 class="mb-0">{{ $reviews->where('status', 'declined')->count() }}</h5>
                    <small class="text-muted">Declined Reviews</small>
                </div>
            </div>
        </div>
    </div>

    <!-- Reviews Table Container -->
    <div class="reviews-table-container">
        <div class="reviews-header d-flex justify-content-between align-items-center mb-4">
            <h4 class="text-danger">Review List</h4>
            <div class="d-flex ms-auto align-items-center">
                <form method="GET" action="{{ route('reviews.index') }}" class="search-form">
                    <input type="text" name="search" placeholder="Search reviews..." value="{{ request()->get('search') }}">
                    <button type="submit" class="btn btn-danger">Search</button>
                </form>
            </div>
        </div>

        <!-- List Reviews -->
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>User ID</th>
                        <th>Product ID</th>
                        <th>Rating</th>
                        <th>Comment</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reviews as $review)
                        <tr id="review-{{ $review->id }}">
                            <td>{{ $review->id }}</td>
                            <td>{{ $review->user_id }}</td>
                            <td>{{ $review->product_id }}</td>
                            <td>{{ $review->rating }}</td>
                            <td>{{ $review->comment }}</td>
                            <td>
                                <span class="badge {{ $review->status == 'approved' ? 'bg-success' : ($review->status == 'declined' ? 'bg-danger' : 'bg-secondary') }}">
                                    {{ ucfirst($review->status) }}
                                </span>
                            </td>
                            <td class="action-buttons">
                                <form action="{{ route('reviews.changeStatus', $review->id) }}" method="POST" class="status-form" data-status="approved" onsubmit="return confirmStatusChange(event, 'approved');">
                                    @csrf
                                    <input type="hidden" name="status" value="approved">
                                    <button type="submit" class="btn btn-success btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Approve">
                                        <i class="bi bi-check-circle-fill"></i>
                                    </button>
                                </form>
                                <form action="{{ route('reviews.changeStatus', $review->id) }}" method="POST" class="status-form" data-status="declined" onsubmit="return confirmStatusChange(event, 'declined');">
                                    @csrf
                                    <input type="hidden" name="status" value="declined">
                                    <button type="submit" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Decline">
                                        <i class="bi bi-x-circle-fill"></i>
                                    </button>
                                </form>
                                <form action="{{ route('reviews.changeStatus', $review->id) }}" method="POST" class="status-form" data-status="pending" onsubmit="return confirmStatusChange(event, 'pending');">
                                    @csrf
                                    <input type="hidden" name="status" value="pending">
                                    <button type="submit" class="btn btn-secondary btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Mark as Pending">
                                        <i class="bi bi-clock-fill"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
function confirmStatusChange(event, status) {
    event.preventDefault();
    const form = event.target;
    Swal.fire({
        title: 'Are you sure?',
        text: 'You are about to change the review status to ' + status + '.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, change it!',
        confirmButtonColor:'db3741',
        cancelButtonText: 'Cancel',
        cancelButtonColor: '00bcd4',
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: form.action,
                type: form.method,
                data: $(form).serialize(),
                success: function(response) {
                    // Update the status badge
                    const reviewRow = $('#review-' + response.id);
                    const statusBadge = reviewRow.find('.badge');
                    statusBadge.removeClass('bg-success bg-danger bg-secondary');
                    if (response.status === 'approved') {
                        statusBadge.addClass('bg-success').text('Approved');
                    } else if (response.status === 'declined') {
                        statusBadge.addClass('bg-danger').text('Declined');
                    } else {
                        statusBadge.addClass('bg-secondary').text('Pending');
                    }
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Review status updated successfully!',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                        // Optionally refresh the page if a full update is needed
                        location.reload();
                    });
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'An error occurred while updating the status. Please try again.',
                    });
                }
            });
        }
    });
}

$(document).ready(function() {
    // Enable tooltips
    $('[data-bs-toggle="tooltip"]').tooltip();

    // Search functionality
    const searchInput = document.querySelector('input[placeholder="Search reviews..."]');
    searchInput.addEventListener('keyup', function() {
        const filter = this.value.toLowerCase();
        const rows = document.querySelectorAll('tbody tr');

        rows.forEach(row => {
            const text = row.textContent.toLowerCase();
            row.style.display = text.includes(filter) ? '' : 'none';
        });
    });
});
</script>
