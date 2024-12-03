@extends('components.layout2')

<main class="main-content" id="mainContent">
    <!-- Product Stats Grid -->
    <div class="stat-card mb-3">
        <i class="bi bi-tags"></i>
        <div>
            <h5 class="mb-0">{{ $orders->count() }}</h5>
            <small class="text-muted">Product orders</small>
        </div>
    </div>

    <!-- Orders Table Container -->
    <div class="orders-table-container bg-white shadow-sm p-4 rounded">
        <div class="orders-header d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold text-danger">Order List</h4>
            <div class="d-flex align-items-center">
                <input type="text" class="form-control me-2" placeholder="Search orders..." style="width: 250px;">
                <button class="btn btn-danger shadow-sm" data-bs-toggle="modal" data-bs-target="#addorderModal">
                    <i class="bi bi-plus me-1"></i> Add order
                </button>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover table-striped table-bordered align-middle text-center">
                <thead class="bg-danger text-white">
                    <tr>
                        <th class="text-uppercase">Name</th>
                        <th class="text-uppercase">Description</th>
                        <th class="text-uppercase">Price</th>
                        <th class="text-uppercase">Order Date</th>
                        <th class="text-uppercase">Status</th>
                        <th class="text-uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr id="order-{{ $order->id }}">
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->user->name ?? 'N/A' }}</td>
                            <td>{{ $order->total_price }}</td>
                            <td>{{ $order->order_date }}</td>
                            <td>
                                <form action="{{ route('orders.update', $order->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <select name="status" class="form-control" onchange="this.form.submit()">
                                        <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>
                                            Pending</option>
                                        <option value="processing"
                                            {{ $order->status === 'processing' ? 'selected' : '' }}>Processing</option>
                                        <option value="completed"
                                            {{ $order->status === 'completed' ? 'selected' : '' }}>Completed</option>
                                        <option value="cancelled"
                                            {{ $order->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                    </select>
                                </form>
                            </td>
                            <td class="action-buttons">
                                <!-- Trigger Button -->
                                <button type="button" class="btn btn-danger" style="background-color:#00bcd4;"
                                    data-bs-toggle="modal" data-bs-target="#orderModal">
                                    <i class="bi bi-eye"></i>
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="orderModal" tabindex="-1" aria-labelledby="orderModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header bg-danger text-white">
                                                <h5 class="modal-title" id="orderModalLabel">Order Details - Order
                                                    #{{ $order->id }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6 mb-4">
                                                        <div class="card h-100 border-danger">
                                                            <div class="card-header bg-light border-danger">
                                                                <h4 class="mb-0 text-danger">Customer Information</h4>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="d-flex align-items-center mb-3">
                                                                    <i
                                                                        class="bi bi-person-circle me-3 text-danger fs-2"></i>
                                                                    <div>
                                                                        <h5 class="mb-1">{{ $order->user->name }}
                                                                        </h5>
                                                                        <p class="text-muted mb-0">
                                                                            {{ $order->user->email }}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex align-items-center">
                                                                    <i
                                                                        class="bi bi-geo-alt-fill me-3 text-danger fs-2"></i>
                                                                    <p class="mb-0">{{ $order->user->address }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 mb-4">
                                                        <div class="card h-100 border-danger">
                                                            <div class="card-header bg-light border-danger">
                                                                <h4 class="mb-0 text-danger">Order Summary</h4>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="d-flex justify-content-between mb-2">
                                                                    <span class="text-muted">Order Date</span>
                                                                    <strong>{{ $order->created_at->format('F j, Y') }}</strong>
                                                                </div>
                                                                <div class="d-flex justify-content-between mb-2">
                                                                    <span class="text-muted">Total Items</span>
                                                                    <strong>{{ $order->orderItems->count() }}</strong>
                                                                </div>
                                                                <div class="d-flex justify-content-between mb-2">
                                                                    <span class="text-muted">Total Price</span>
                                                                    <strong
                                                                        class="text-danger">${{ number_format($order->total_price, 2) }}</strong>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card border-danger mb-4">
                                                    <div class="card-header bg-light border-danger">
                                                        <h4 class="mb-0 text-danger">Order Items</h4>
                                                    </div>
                                                    <div class="card-body p-0">
                                                        <div class="row">
                                                            @foreach ($order->orderItems as $item)
                                                                <div class="col-md-12 ">
                                                                    <div class="card shadow-sm">
                                                                        <div class="card-body">
                                                                            <div class="d-flex align-items-center mb-3">
                                                                                @if ($item->product->images->isNotEmpty())
                                                                                    <img src="{{ asset('storage/' . $item->product->images->first()->image_url) }}"
                                                                                        alt="{{ $item->product->name }}"
                                                                                        class="me-3 rounded"
                                                                                        style="width: 50px; height: 50px; object-fit: cover;">
                                                                                @endif
                                                                                <span>{{ $item->product->name }}</span>
                                                                            </div>
                                                                            <div class="d-flex justify-content-between">
                                                                                <span>Quantity:
                                                                                    {{ $item->quantity }}</span>
                                                                                <span>Price:
                                                                                    ${{ number_format($item->price, 2) }}</span>
                                                                            </div>
                                                                            <div
                                                                                class="d-flex justify-content-between mt-2">
                                                                                <span>Total:
                                                                                    ${{ number_format($item->quantity * $item->price, 2) }}</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>


                                        </div>
                                    </div>
                                </div>

                                <form action="{{ route('orders.destroy', $order->id) }}" method="POST"
                                    style="display: inline;" id="delete-form-{{ $order->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-sm btn-danger shadow-sm"
                                        onclick="confirmDelete({{ $order->id }})">
                                        <i class="bi bi-trash"></i>
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

<!-- Add Order Modal -->
<div class="modal fade" id="addOrderModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">Add New Order</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('orders.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-control">
                            <option value="pending">Pending</option>
                            <option value="processing">Processing</option>
                            <option value="completed">Completed</option>
                            <option value="cancelled">Cancelled</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Total Price</label>
                        <input type="number" name="total_price" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-danger">Save Order</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Confirm Delete Action
    function confirmDelete(orderId) {
        if (confirm('Are you sure you want to delete this order?')) {
            document.getElementById('delete-form-' + orderId).submit();
        }
    }
</script>
