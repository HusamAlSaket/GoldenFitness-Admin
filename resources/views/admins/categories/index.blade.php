@extends('components.layout2')

<main class="main-content" id="mainContent">
    <!-- Product Stats Grid -->

       
        <div class="stat-card mb-3">
            <i class="bi bi-tags"></i>
            <div>
                <h5 class="mb-0">{{ $categories->count() }}</h5>
                <small class="text-muted">Product Categories</small>
            </div>
        </div>
        <!-- Additional stats can be added here -->
    </div>
    <!-- Categories Table Container -->
    <div class="categories-table-container bg-white shadow-sm p-4 rounded">
        <div class="categories-header d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold text-danger">Category List</h4>
            <div class="d-flex align-items-center">
                <input type="text" class="form-control me-2" placeholder="Search categories..." style="width: 250px;">
                <button class="btn btn-danger shadow-sm" data-bs-toggle="modal" data-bs-target="#addcategoryModal">
                    <i class="bi bi-plus me-1"></i> Add Category
                </button>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-striped table-bordered align-middle text-center">
                <thead class="bg-danger text-white">
                    <tr>
                        <th class="text-uppercase">Name</th>
                        <th class="text-uppercase">Description</th>
                        <th class="text-uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr id="category-{{ $category->id }}">
                            <td class="fw-bold">{{ $category->category_name }}</td>
                            <td>{{ \Illuminate\Support\Str::limit($category->description, 50) }}</td>
                            <td class="action-buttons">
                                <a href="{{ route('categories.show', $category->id) }}" class="btn btn-sm btn-info shadow-sm">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <button class="btn btn-sm btn-warning shadow-sm" data-bs-toggle="modal"
                                    data-bs-target="#editcategoryModal-{{ $category->id }}">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
                                    style="display: inline;" id="delete-form-{{ $category->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-sm btn-danger shadow-sm"
                                        onclick="confirmDelete({{ $category->id }})">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>

                        <!-- Edit Category Modal -->
                        <div class="modal fade" id="editcategoryModal-{{ $category->id }}" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-danger text-white">
                                        <h5 class="modal-title">Edit Category</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('categories.update', $category->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')

                                            <div class="mb-3">
                                                <label class="form-label">Category Name</label>
                                                <input type="text" name="category_name" class="form-control"
                                                    value="{{ old('name', $category->category_name) }}" required>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Description</label>
                                                <textarea name="description" class="form-control" rows="3">{{ old('description', $category->description) }}</textarea>
                                            </div>

                                            <button type="submit" class="btn btn-danger w-100">Save Changes</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</main>

<!-- Add Category Modal -->
<div class="modal fade" id="addcategoryModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">Add New Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Category Name</label>
                        <input type="text" name="category_name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="3"></textarea>
                    </div>

                    <button type="submit" class="btn btn-danger w-100">Save Category</button>
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
    function confirmDelete(categoryId) {
        Swal.fire({
            title: 'Are you sure?',
            text: 'This action cannot be undone!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + categoryId).submit();
            }
        });
    }

    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.querySelector('input[placeholder="Search categories..."]');
        searchInput.addEventListener('keyup', function () {
            const filter = this.value.toLowerCase();
            const rows = document.querySelectorAll('tbody tr');
            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(filter) ? '' : 'none';
            });
        });
    });
</script>
