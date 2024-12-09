@include('components.layout')
<div class="video-stats-grid mb-4">
    <div class="stat-card">
        <i class="bi bi-film"></i>
        <div>
            <h5 class="mb-0">{{ $blogs->count() }}</h5>
            <small class="text-muted">blogs</small>
        </div>
    </div>
</div>
<h4 class="text-danger">Blog List</h4>

<!-- Add Blog Button -->
<button class="btn btn-danger mb-3 ms-auto d-flex" data-bs-toggle="modal" data-bs-target="#addBlogModal">
    Add Blog
</button>

<!-- Success Message -->
@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<!-- Blogs Table -->
<table class="table">
    <thead>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Image</th> <!-- Added Image column -->
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($blogs as $blog)
            <tr>
                <td>{{ $blog->title }}</td>
                <td>{{ Str::limit($blog->description, 50) }}</td>
                <td>
                    @if ($blog->image_url)
                        <img src="{{ asset('storage/' . $blog->image_url) }}" alt="Blog Image" class="img-fluid"
                            style="max-height: 100px;">
                    @else
                        No Image
                    @endif
                </td>
                <td class="d-flex">
                    <!-- Edit Button -->
                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                        data-bs-target="#editBlogModal-{{ $blog->id }}">
                        <i class="bi bi-pencil"></i>
                    </button>
                    <!-- Delete Button -->
                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                        data-bs-target="#deleteBlogModal-{{ $blog->id }}">
                        <i class="bi bi-trash"></i>
                    </button>
                </td>
            </tr>


            <!-- Edit Blog Modal -->
            <div class="modal fade" id="editBlogModal-{{ $blog->id }}" tabindex="-1"
                aria-labelledby="editBlogModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="{{ route('blogs.update', $blog->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="modal-header">
                                <h5 class="modal-title" id="editBlogModalLabel">Edit Blog</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control"
                                        value="{{ $blog->title }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea name="description" class="form-control" rows="4" required>{{ $blog->description }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="image" class="form-label">Image</label>
                                    <input type="file" name="image" class="form-control">
                                </div>
                                @if ($blog->image_url)
                                    <div class="mb-3">
                                        <img src="{{ asset('storage/' . $blog->image_url) }}" alt="Blog Image"
                                            class="img-fluid" style="max-height: 200px;">
                                    </div>
                                @endif
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-danger">Save Changes</button>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Delete Blog Modal -->
            <div class="modal fade" id="deleteBlogModal-{{ $blog->id }}" tabindex="-1"
                aria-labelledby="deleteBlogModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteBlogModalLabel">Delete Blog</h5>
                                <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete this blog?
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-danger">Yes, Delete</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </tbody>
</table>
</div>

<!-- Add Blog Modal -->
<div class="modal fade" id="addBlogModal" tabindex="-1" aria-labelledby="addBlogModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title btn-danger" id="addBlogModalLabel">Add Blog</h5>
                    <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="4" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Add Blog</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Bootstrap 5 JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>


@include('components.layout2')
