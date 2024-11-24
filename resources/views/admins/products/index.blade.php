@extends('components.layout2')

<!-- Main Content -->
<main class="main-content" id="mainContent">
    <!-- Product Stats Grid -->
    <div class="product-stats-grid mb-4">
        <div class="stat-card">
            <i class="bi bi-box"></i>
            <div>
                <h5 class="mb-0">{{ $products->count() }}</h5>
                <small class="text-muted">Total Products</small>
            </div>
        </div>
        <div class="stat-card">
            <i class="bi bi-tags"></i>
            <div>
                <h5 class="mb-0">{{ $categories->count() }}</h5>
                <small class="text-muted">Product Categories</small>
            </div>
        </div>
        <!-- Additional stats can be added here -->
    </div>

    <!-- Products Table Container -->
    <div class="products-table-container">
        <div class="products-header d-flex justify-content-between align-items-center mb-4">
            <h4>Product List</h4>
            <div class="d-flex align-items-center">
                <input type="text" class="form-control me-2" placeholder="Search products..." style="width: 200px;">
                <button class="btn btn-danger"  data-bs-toggle="modal" data-bs-target="#addProductModal">
                    <i class="bi bi-plus me-1"></i>Add Product
                </button>
            </div>
        </div>
        <table class="table table-hover table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>description</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr id="product-{{ $product->id }}">
                        <td>
                            <img src="{{  $product->image_url ? asset('storage/products' . $product->image_url) : '/placeholder.jpg' }}" 
    alt="{{ $product->name }}" class="product-image" style="width: 50px; height: 50px;">

                        </td>
                        <td>{{ $product->name }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($product->description, 50) }}</td>

                        <td>{{ $product->category->category_name ?? 'Uncategorized' }}</td>
                        <td>${{ $product->price }}</td>
                        <td>
                            <span class="badge {{ $product->stock > 0 ? 'bg-success' : 'bg-danger' }}">
                                {{ $product->stock > 0 ? 'In Stock' : 'Out of Stock' }}
                            </span>
                        </td>
                        <td class="action-buttons">
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-info">
                                <i class="bi bi-eye"></i>
                            </a>
                            <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                data-bs-target="#editProductModal-{{ $product->id }}">
                                <i class="bi bi-pencil"></i>
                            </button>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                style="display: inline;" id="delete-form-{{ $product->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-sm btn-danger"
                                    onclick="confirmDelete({{ $product->id }})">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>

                    <!-- Edit Product Modal -->
                 <!-- Edit Product Modal -->
<div class="modal fade" id="editProductModal-{{ $product->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('products.update', $product->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Product Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="3">{{ old('description', $product->description) }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <select name="category_id" class="form-select" required>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->id == old('category_id', $product->category_id) ? 'selected' : '' }}>
                                    {{ $category->category_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Price</label>
                        <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price', $product->price / 100) }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Stock Quantity</label>
                        <input type="number" name="stock" class="form-control" value="{{ old('stock', $product->stock) }}" required>
                    </div>
                    <button type="submit" class="btn btn-danger">Save Changes</button>
                </form>
                
            </div>
        </div>
    </div>
</div>

                @endforeach
            </tbody>
        </table>
    </div>
</main>

<!-- Add Product Modal -->
<!-- Add Product Modal -->
<div class="modal fade" id="addProductModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('products.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Product Name</label>
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

                    <button type="submit" class="btn btn-danger">Save Product</button>
                </form>
            </div>
        </div>
    </div>
</div>



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
    function confirmDelete(productId) {
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
                    text: 'Product Has Been Deleted successfully!',
                    showConfirmButton: false,
                    timer: 700 // Duration for displaying success message
                }).then(() => {
                    // Submit the form after displaying the SweetAlert success message
                    document.getElementById('delete-form-' + productId).submit();
                });
            }
        });
    }

    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.querySelector('input[placeholder="Search products..."]');
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
