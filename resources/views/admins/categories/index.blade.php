@extends('components.layout2')

<!-- Main Content -->
<main class="main-content" id="mainContent">
    <!-- category Stats Grid -->
    <div class="category-stats-grid mb-4">
  

        <div class="stat-card">
            <i class="bi bi-tags"></i>
            <div>
                <h5 class="mb-0">{{ $categories->count() }}</h5>
                <small class="text-muted">Categories</small>
            </div>
        </div>
        <!-- Additional stats can be added here -->
    </div>

    <!-- categories Table Container -->
    <div class="categories-table-container">
        <div class="categories-header d-flex justify-content-between align-items-center mb-4">
            <h4>category List</h4>
            <div class="d-flex align-items-center">
                <input type="text" class="form-control me-2" placeholder="Search categories..."
                    style="width: 200px;">
                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#addcategoryModal">
                    <i class="bi bi-plus me-1"></i>Add category
                </button>
            </div>
        </div>
        <table class="table table-hover table-bordered">
            <thead class="thead-dark">
                <tr>

                    <th>Name</th>
                    <th>description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr id="category-{{ $category->id }}">

                        <td>{{ $category->category_name }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($category->description, 50) }}</td>






                        <td class="action-buttons">
                            <a href="{{ route('categories.show', $category->id) }}" class="btn btn-sm btn-info">
                                <i class="bi bi-eye"></i>
                            </a>
                            <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                data-bs-target="#editcategoryModal-{{ $category->id }}">
                                <i class="bi bi-pencil"></i>
                            </button>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
                                style="display: inline;" id="delete-form-{{ $category->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-sm btn-danger"
                                    onclick="confirmDelete({{ $category->id }})">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>

                    <!-- Edit category Modal -->
                    <!-- Edit category Modal -->
                    <div class="modal fade" id="editcategoryModal-{{ $category->id }}" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit category</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('categories.update', $category->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                    
                                        <div class="mb-3">
                                            <label class="form-label">Category Name</label>
                                            <input type="text" name="category_name" class="form-control" value="{{ old('name', $category->category_name) }}" required>
                                        </div>
                                    
                                        <div class="mb-3">
                                            <label class="form-label">Description</label>
                                            <textarea name="description" class="form-control" rows="3">{{ old('description', $category->description) }}</textarea>
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

<!-- Add category Modal -->
<!-- Add category Modal -->
<div class="modal fade" id="addcategoryModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">category Name</label>
                        <input type="text" name="category_name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="3"></textarea>
                    </div>



                    <button type="submit" class="btn btn-danger">Save category</button>
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
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: 'category Has Been Deleted successfully!',
                    showConfirmButton: false,
                    timer: 700 // Duration for displaying success message
                }).then(() => {
                    // Submit the form after displaying the SweetAlert success message
                    document.getElementById('delete-form-' + categoryId).submit();
                });
            }
        });
    }

    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.querySelector('input[placeholder="Search categories..."]');
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
