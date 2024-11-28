@extends('components.layout2')

<!-- Main Content -->
<main class="main-content" id="mainContent">
    <!-- order Stats Grid -->
    <div class="order-stats-grid mb-4">
        <div class="stat-card">
            <i class="bi bi-box"></i>
            <div>
                {{-- <h5 class="mb-0">{{ $orders->count() }}</h5> --}}
                <small class="text-muted">Total orders</small>
            </div>
        </div>
        <div class="stat-card">
            <i class="bi bi-tags"></i>
            <div>
                {{-- <h5 class="mb-0">{{ $categories->count() }}</h5> --}}
                <small class="text-muted">order Categories</small>
            </div>
        </div>
        <!-- Additional stats can be added here -->
    </div>

    <!-- orders Table Container -->
    <div class="orders-table-container">
        <div class="orders-header d-flex justify-content-between align-items-center mb-4">
            <h4>order List</h4>
            <div class="d-flex align-items-center">
                <input type="text" class="form-control me-2" placeholder="Search orders..." style="width: 200px;">
                <button class="btn btn-danger"  data-bs-toggle="modal" data-bs-target="#addorderModal">
                    <i class="bi bi-plus me-1"></i>Add order
                </button>
            </div>
        </div>
        <table class="table table-hover table-bordered">
            <thead class="thead-dark">
                <tr>
                    {{-- <th>id</th> --}}
                    {{-- <th>user_id</th> --}}
                    {{-- <th>status</th> --}}
                    <th>order id</th>
                    <th>total_price</th>

                    <th>order_Date</th>
                    {{-- <th>Actions</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr id="order-{{ $order->id }}">
            
                        <td>{{ $order->id }}</td>
                        {{-- <td>{{ \Illuminate\Support\Str::limit($order->description, 50) }}</td> --}}
                        <td>{{ $order->total_price }}</td>
                        {{-- <td>{{ $order->status }}</td> --}}
                        <td>{{ $order->order_date }}</td>
            
                    
                    </tr>

                    <!-- Edit order Modal -->
                 <!-- Edit order Modal -->
{{-- <div class="modal fade" id="editorderModal-{{ $order->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit order</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('orders.update', $order->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">order Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $order->name) }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="3">{{ old('description', $order->description) }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <select name="category_id" class="form-select" required>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->id == old('category_id', $order->category_id) ? 'selected' : '' }}>
                                    {{ $category->category_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Price</label>
                        <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price', $order->price / 100) }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Stock Quantity</label>
                        <input type="number" name="stock" class="form-control" value="{{ old('stock', $order->stock) }}" required>
                    </div>
                    <button type="submit" class="btn btn-danger">Save Changes</button>
                </form>
                
            </div>
        </div>
    </div>
</div> --}}

                @endforeach
            </tbody>
        </table>
    </div>
</main>

<!-- Add order Modal -->
<!-- Add order Modal -->
{{-- <div class="modal fade" id="addorderModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New order</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('orders.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">order Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <select name="category_id" class="form-select" required>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Price</label>
                        <input type="number" name="price" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Stock Quantity</label>
                        <input type="number" name="stock" class="form-control" required>
                    </div>
                    {{-- <div class="mb-3">
                        <label class="form-label">image</label>
                        <input type="file" name="image_url" class="form-control" required>
                    </div> --}}

                    <button type="submit" class="btn btn-danger">Save order</button>
                </form>
            </div>
        </div>
    </div>
</div> --}}



@if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 700
        });
    </script>
@endif

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    function confirmDelete(orderId) {
        Swal.fire({
            title: 'Are you sure?',
            text: 'This action cannot be undone!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: 'order Has Been Deleted successfully!',
                    showConfirmButton: false,
                    timer: 700 // Duration for displaying success message
                }).then(() => {
                    // Submit the form after displaying the SweetAlert success message
                    document.getElementById('delete-form-' + orderId).submit();
                });
            }
        });
    }

    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.querySelector('input[placeholder="Search orders..."]');
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
