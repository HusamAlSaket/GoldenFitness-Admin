@extends('components.layout2')

<!-- Main Content -->
<main class="main-content" id="mainContent">
    <!-- Product Stats Grid -->
    <div class="product-stats-grid">
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
        <div class="products-header">
            <h4>Product List</h4>
            <div class="d-flex align-items-center">
                <input type="text" class="form-control me-2" placeholder="Search products..." style="width: 200px;">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProductModal">
                    <i class="bi bi-plus me-1"></i>Add Product
                </button>
            </div>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>
                            <img src="{{ $product->image_url ?? '/placeholder.jpg' }}" alt="{{ $product->name }}"
                                class="product-image" style="width: 50px; height: 50px;">
                        </td>
                        <td>{{ $product->name }}</td>
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
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline;" id="delete-form-{{ $product->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $product->id }})">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                            
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
                                            document.getElementById('delete-form-' + productId).submit();
                                        }
                                    });
                                }
                            </script>
                            
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
                        <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <select name="category_id" class="form-select" required>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                    {{ $category->category_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Price</label>
                        <input type="number" name="price" class="form-control" value="{{ $product->price }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Stock Quantity</label>
                        <input type="number" name="stock" class="form-control" value="{{ $product->stock }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
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
                    <button type="submit" class="btn btn-primary">Save Product</button>
                </form>
            </div>
        </div>
    </div>
</div>
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