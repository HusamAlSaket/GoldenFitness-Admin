@extends('components.layout2')


<!-- Main Content -->
<main class="main-content" id="mainContent">
    <!-- user Stats Grid -->
    <div class="row user-stats mb-4">
        <div class="col-lg-12">
            <div class="stat-card">
                <i class="bi bi-people"></i>
                <div >
                    <h5 class="mb-0">{{ $totalUsers }}</h5>
                    <small >Total Users</small>
                </div>
                
            </div>
        </div>
    </div>

    <!-- users Table Container -->
    <div class="users-table-container">
        <div class="users-header d-flex justify-content-between  align-items-center mb-4">
            <h4 class="text-danger">user List</h4>
            <div class="d-flex ms-auto align-items-center">
                <form method="GET" action="{{ route('users.index') }}" class="search-form">
                    <input type="text" name="search" placeholder="Search products..."
                        value="{{ request()->get('search') }}">
                    <button type="submit">Search</button>
                </form>

                <button class="btn btn-danger ms-3" data-bs-toggle="modal" data-bs-target="#adduserModal">
                    <i class="bi bi-plus me-1"></i>Add Users
                </button>
            </div>
        </div>



        <!-- List users -->
        <table class="table">
            <thead>
                <tr>
                    <th>id </th>
                    <th>name</th>
                    <th>email</th>
                    <th>Role</th>
                    <th>created_at</th>
                    <th>updated_at</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>{{ $user->updated_at }}</td>

                        <td>
                            <!-- View Action -->
                            {{-- <a href="{{ route('users.show', $user->id) }}" class="btn btn-info btn-sm test">
                                <i class="bi bi-eye"></i> 
                            </a> --}}

                            <!-- Edit Action -->
                            <a href="#" class="btn btn-danger btn-sm"  style="background-color:#00bcd4;"  data-bs-toggle="modal"
                                data-bs-target="#editUserModal-{{ $user->id }}">
                                <i class="bi bi-pencil"></i> 
                            </a>

                            <!-- Delete Action -->
                            <form id="delete-form-{{ $user->id }}"
                                action="{{ route('users.destroy', $user->id) }}" method="POST"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger btn-sm"
                                    onclick="confirmDelete({{ $user->id }})">
                                    <i class="bi bi-trash"></i> 
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>


<!-- Add User Modal -->
<!-- Add User Modal -->
<div class="modal fade" id="adduserModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Role</label>
                        <select name="role" class="form-select" required>
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                            <option value="superadmin">Superadmin</option>
                            <option value="coach">Coach</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-danger">Save User</button>
                </form>
            </div>
        </div>
    </div>
</div>



<script>
    function confirmDelete(userId) {
        Swal.fire({
            title: 'Are you sure?',
            text: 'This action cannot be undone!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + userId).submit();
            }
        });
    }
</script>

@if (session('success'))
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

<!-- Edit User Modal -->
@foreach ($users as $user)
    <div class="modal fade" id="edituserModal-{{ $user->id }}" tabindex="-1"
        aria-labelledby="edituserModalLabel-{{ $user->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edituserModalLabel-{{ $user->id }}">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control"
                                value="{{ old('name', $user->name) }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control"
                                value="{{ old('email', $user->email) }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        {{-- <div class="mb-3">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control">
                        </div> --}}
                        <div class="mb-3">
                            <label class="form-label">Role</label>
                            <select name="role" class="form-select" required>
                                <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="superadmin" {{ $user->role == 'superadmin' ? 'selected' : '' }}>
                                    Superadmin</option>
                                <option value="coach" {{ $user->role == 'coach' ? 'selected' : '' }}>Coach</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-danger">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach

{{-- extra code --}}
{{-- <script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.querySelector('form');

        if (form) {
            form.addEventListener('submit', function (event) {
                // Remove preventDefault() to allow form submission
                // event.preventDefault();
                // Add your AJAX request here if needed
            });
        }
    });
</script> --}}

<script>
    // Search functionality
    const searchInput = document.querySelector('input[placeholder="Search products..."]');
    searchInput.addEventListener('keyup', function() {
        const filter = this.value.toLowerCase();
        const rows = document.querySelectorAll('tbody tr');

        rows.forEach(row => {
            const text = row.textContent.toLowerCase();
            row.style.display = text.includes(filter) ? '' : 'none';
        });
    });
</script>
<!-- Pagination -->
@if ($users->hasPages())
    <nav aria-label="User Pagination" class="d-flex flex-column align-items-center my-4">
        <!-- Pagination Links -->
        <ul class="pagination justify-content-center mb-2">
            <!-- First Button -->
            <li class="page-item {{ $users->onFirstPage() ? 'disabled' : '' }}">
                <a class="page-link" href="{{ $users->url(1) }}" aria-label="First" style="background-color: white; color: red; border: 1px solid red;">&laquo;&laquo; First</a>
            </li>

            <!-- Previous Button -->
            <li class="page-item {{ $users->onFirstPage() ? 'disabled' : '' }}">
                <a class="page-link" href="{{ $users->previousPageUrl() }}" rel="prev" aria-label="Previous" style="background-color: white; color: red; border: 1px solid red;">&laquo;</a>
            </li>

            <!-- Page Numbers -->
            @foreach ($users->getUrlRange(1, $users->lastPage()) as $page => $url)
                @if (abs($users->currentPage() - $page) <= 1) <!-- Display current, previous, and next pages only -->
                    <li class="page-item {{ $users->currentPage() == $page ? 'active' : '' }}">
                        <a class="page-link" href="{{ $url }}" 
                           style="background-color: {{ $users->currentPage() == $page ? '#ff4d4d' : 'white' }}; 
                                  color: {{ $users->currentPage() == $page ? 'white' : 'red' }}; 
                                  border: 1px solid red;">
                            {{ $page }}
                        </a>
                    </li>
                @endif
            @endforeach

            <!-- Next Button -->
            <li class="page-item {{ $users->hasMorePages() ? '' : 'disabled' }}">
                <a class="page-link" href="{{ $users->nextPageUrl() }}" rel="next" aria-label="Next" style="background-color: white; color: red; border: 1px solid red;">&raquo;</a>
            </li>

            <!-- Last Button -->
            <li class="page-item {{ $users->onLastPage() ? 'disabled' : '' }}">
                <a class="page-link" href="{{ $users->url($users->lastPage()) }}" aria-label="Last" style="background-color: white; color: red; border: 1px solid red;">Last &raquo;&raquo;</a>
            </li>
        </ul>

        <!-- Pagination Info -->
        <div class="text-center" style="font-size: 14px; color: red;">
            Showing {{ $users->firstItem() }} to {{ $users->lastItem() }} of {{ $users->total() }} results 
            (Page {{ $users->currentPage() }} of {{ $users->lastPage() }})
        </div>
    </nav>
@endif

