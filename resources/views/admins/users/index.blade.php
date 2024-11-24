@extends('components.layout2')


<!-- Main Content -->
<main class="main-content" id="mainContent">
    <!-- user Stats Grid -->
    <div class="row user-stats mb-4">
        <div class="col-4">
            <div class="stat-card">
                <i class="bi bi-people"></i>
                <div>
                    <h5 class="mb-0">{{ $users->count() }}</h5>
                    <small class="text-muted">Total Users</small>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="stat-card">
                <i class="bi bi-calendar"></i>
                <div>
                    {{-- <h5 class="mb-0">{{ $activeusersCount }}</h5> --}}
                    <small class="text-muted">Active users</small>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="stat-card">
                <i class="bi bi-clock"></i>
                <div>
                    {{-- <h5 class="mb-0">{{ $expiredusersCount }}</h5> --}}
                    <small class="text-muted">Expired users</small>
                </div>
            </div>
        </div>
    </div>

    <!-- users Table Container -->
    <div class="users-table-container">
        <div class="users-header d-flex justify-content-between  align-items-center mb-4">
            <h4>user List</h4>
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
                            <a href="{{ route('users.show', $user->id) }}" class="btn btn-info btn-sm">
                                <i class="bi bi-eye"></i> View
                            </a>

                            <!-- Edit Action -->
                            <a href="#" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                data-bs-target="#editUserModal-{{ $user->id }}">
                                <i class="bi bi-pencil"></i> Edit
                            </a>

                            <!-- Delete Action -->
                            <form id="delete-form-{{ $user->id }}"
                                action="{{ route('users.destroy', $user->id) }}" method="POST"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger btn-sm"
                                    onclick="confirmDelete({{ $user->id }})">
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
