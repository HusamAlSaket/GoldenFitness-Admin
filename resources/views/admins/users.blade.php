
@extends('components.layout2')
        <!-- Main Content -->
        <main class="main-content" id="mainContent">
            <!-- Product Stats Grid -->
            <div class="product-stats-grid">
                <div class="stat-card">
                    <i class="bi bi-box"></i>
                    <div>
                        <h5 class="mb-0">456</h5>
                        <small class="text-muted">Total Products</small>
                    </div>
                </div>
                <div class="stat-card">
                    <i class="bi bi-tags"></i>
                    <div>
                        <h5 class="mb-0">12</h5>
                        <small class="text-muted">Product Categories</small>
                    </div>
                </div>
                <div class="stat-card">
                    <i class="bi bi-currency-dollar"></i>
                    <div>
                        <h5 class="mb-0">$124,567</h5>
                        <small class="text-muted">Total Product Value</small>
                    </div>
                </div>
                <div class="stat-card">
                    <i class="bi bi-truck"></i>
                    <div>
                        <h5 class="mb-0">89</h5>
                        <small class="text-muted">Out of Stock</small>
                    </div>
                </div>
            </div>

            <!-- Products Table Container -->
            <div class="products-table-container">
                <div class="products-header">
                    <h4>Product List</h4>
                    <div class="d-flex align-items-center">
                        <input type="text" class="form-control me-2" placeholder="Search products..." style="width: 200px;">
                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#addProductModal">
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
                        <tr>
                            <td><img src="/api/placeholder/50/50" alt="Product" class="product-image"></td>
                            <td>Wireless Headphones</td>
                            <td>Electronics</td>
                            <td>$99.99</td>
                            <td><span class="badge bg-success">In Stock</span></td>
                            <td class="action-buttons">
                                <button class="btn btn-sm btn-info"><i class="bi bi-eye"></i></button>
                                <button class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></button>
                                <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                            </td>
                        </tr>
                        <!-- More product rows can be added here -->
                    </tbody>
                </table>
            </div>
        </main>
    </div>

    <!-- Add Product Modal -->
    <div class="modal fade" id="addProductModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Product Name</label>
                            <input type="text" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Category</label>
                            <select class="form-select" required>
                                <option>Electronics</option>
                                <option>Clothing</option>
                                <option>Home & Kitchen</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Price</label>
                            <input type="number" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Stock Quantity</label>
                            <input type="number" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Product Image</label>
                            <input type="file" class="form-control">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger">Save Product</button>
                </div>
            </div>
        </div>
    </div>

