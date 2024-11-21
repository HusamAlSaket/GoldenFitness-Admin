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
            <h4>Review List</h4>
            <div class="d-flex ms-auto align-items-center">
                <form method="GET" action="{{ route('reviews.index') }}" class="search-form">
                    <input type="text" name="search" placeholder="Search reviews..." value="{{ request()->get('search') }}">
                    <button type="submit">Search</button>
                </form>
            </div>
        </div>

        <!-- List Reviews -->
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
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
                        <tr>
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
                                <form action="{{ route('reviews.changeStatus', $review->id) }}" method="POST" style="display:inline;" onsubmit="return confirmStatusChange(event, 'approved');">
                                    @csrf
                                    <input type="hidden" name="status" value="approved">
                                    <button type="submit" class="btn btn-success btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Approve">
                                        <i class="bi bi-check-circle-fill"></i>
                                    </button>
                                </form>
                                <form action="{{ route('reviews.changeStatus', $review->id) }}" method="POST" style="display:inline;" onsubmit="return confirmStatusChange(event, 'declined');">
                                    @csrf
                                    <input type="hidden" name="status" value="declined">
                                    <button type="submit" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Decline">
                                        <i class="bi bi-x-circle-fill"></i>
                                    </button>
                                </form>
                                <form action="{{ route('reviews.changeStatus', $review->id) }}" method="POST" style="display:inline;" onsubmit="return confirmStatusChange(event, 'pending');">
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
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
        }
    });
}
</script>
<script>
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
</script>