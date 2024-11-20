@extends('components.layout2')

<!-- Main Content -->
<main class="main-content" id="mainContent">
    <!-- Subscription Stats Grid -->
    <div class="row subscription-stats mb-4">
        <div class="col-4">
            <div class="stat-card">
                <i class="bi bi-people"></i>
                <div>
                    <h5 class="mb-0">{{ $subscriptions->count() }}</h5>
                    <small class="text-muted">Total Subscriptions</small>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="stat-card">
                <i class="bi bi-calendar"></i>
                <div>
                    <h5 class="mb-0">{{ $activeSubscriptionsCount }}</h5>
                    <small class="text-muted">Active Subscriptions</small>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="stat-card">
                <i class="bi bi-clock"></i>
                <div>
                    <h5 class="mb-0">{{ $expiredSubscriptionsCount }}</h5>
                    <small class="text-muted">Expired Subscriptions</small>
                </div>
            </div>
        </div>
    </div>

    <!-- Subscriptions Table Container -->
    <div class="subscriptions-table-container">
        <div class="subscriptions-header d-flex justify-content-between align-items-center mb-4">
            <h4>Subscription List</h4>
            <div class="d-flex ms-auto">
                <input type="text" class="form-control me-2" placeholder="Search subscriptions..." style="width: 200px;">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSubscriptionModal">
                    <i class="bi bi-plus me-1"></i>Add Subscription
                </button>
            </div>
        </div>

        <!-- List subscriptions -->
        <table class="table">
            <thead>
                <tr>
                    <th>Subscription Type</th>
                    <th>Status</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($subscriptions as $subscription)
                    <tr>
                        <td>{{ $subscription->subscription_type }}</td>
                        <td>{{ $subscription->status }}</td>
                        <td>{{ $subscription->start_date }}</td>
                        <td>{{ $subscription->end_date }}</td>
                        <td>
                            <!-- View Action -->
                            <a href="{{ route('subscriptions.show', $subscription->id) }}" class="btn btn-info btn-sm">
                                <i class="bi bi-eye"></i> View
                            </a>
                            
                            <!-- Edit Action -->
                            <a href="#" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editSubscriptionModal-{{ $subscription->id }}">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            
                            <!-- Delete Action -->
                            <form id="delete-form-{{ $subscription->id }}" action="{{ route('subscriptions.destroy', $subscription->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $subscription->id }})">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>

<!-- Add Subscription Modal -->
<div class="modal fade" id="addSubscriptionModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Subscription</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('subscriptions.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">User ID</label>
                        <input type="number" name="user_id" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Subscription Type</label>
                        <select name="subscription_type" class="form-select" required>
                            <option value="Monthly">Monthly</option>
                            <option value="Yearly">Yearly</option>
                            <option value="Weekly">Weekly</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Start Date</label>
                        <input type="date" name="start_date" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">End Date</label>
                        <input type="date" name="end_date" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select" required>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                            <option value="expired">Expired</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Subscription</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function confirmDelete(subscriptionId) {
        Swal.fire({
            title: 'Are you sure?',
            text: 'This action cannot be undone!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + subscriptionId).submit();
            }
        });
    }
</script>

@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: '{{ session('success') }}',
        showConfirmButton: false,
        timer: 1500
    });
</script>
@endif

<!-- Edit Subscription Modal -->
@foreach($subscriptions as $subscription)
<div class="modal fade" id="editSubscriptionModal-{{ $subscription->id }}" tabindex="-1" aria-labelledby="editSubscriptionModalLabel-{{ $subscription->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editSubscriptionModalLabel-{{ $subscription->id }}">Edit Subscription</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('subscriptions.update', $subscription->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Subscription Type</label>
                        <input type="text" name="subscription_type" class="form-control"
                            value="{{ old('subscription_type', $subscription->subscription_type) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Start Date</label>
                        <input type="date" name="start_date" class="form-control"
                            value="{{ old('start_date', $subscription->start_date) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">End Date</label>
                        <input type="date" name="end_date" class="form-control"
                            value="{{ old('end_date', $subscription->end_date) }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select" required>
                            <option value="active" {{ $subscription->status == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ $subscription->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            <option value="expired" {{ $subscription->status == 'expired' ? 'selected' : '' }}>Expired</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
