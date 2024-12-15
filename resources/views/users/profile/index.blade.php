@include('components.layout3')

<div class="container mt-5">
    <div class="text-center">
        <h1 class="mb-4" style="color: #d9534f;">My Profile</h1>

        {{-- SweetAlert for Profile Success --}}
        @if (session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: '{{ session('success') }}',
                    showConfirmButton: true,
                    confirmButtonText: 'Okay',
                    confirmButtonColor: '#00bcd4',
                }).then((result) => {
                    if (result.isConfirmed) {
                        setTimeout(() => {
                            Swal.close();
                        }, 700);
                    }
                });
            </script>
        @endif

        {{-- SweetAlert for Password Success --}}
        @if (session('success_pass'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: '{{ session('success_pass') }}',
                    showConfirmButton: true,
                    confirmButtonText: 'Okay',
                    confirmButtonColor: '#00bcd4',
                }).then((result) => {
                    if (result.isConfirmed) {
                        setTimeout(() => {
                            Swal.close();
                        }, 700);
                    }
                });
            </script>
        @endif

        {{-- Error Messages --}}
        @if ($errors->any())
            <div class="alert alert-danger shadow-sm" role="alert" style="background-color: #f8d7da; color: #721c24;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Update Profile Form --}}
        <form action="{{ route('update') }}" method="POST" class="shadow p-4 rounded" style="background-color: #ffffff;">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="name"
                    value="{{ old('name', $user->name) }}" required style="border-color: #d9534f;">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email"
                    value="{{ old('email', $user->email) }}" required style="border-color: #d9534f;">
            </div>
            <button type="submit" class="btn btn-danger mb-3"
                style="background-color: #d9534f; border-color: #d9534f; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);">
                Update Profile
            </button>
        </form>

        {{-- Update Password Form --}}
        <hr>
        <h2 style="color: #d9534f;">Change Password</h2>
        <form action="{{ route('password.update') }}" method="POST" class="shadow p-4 rounded"
            style="background-color: #ffffff;">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="current_password" class="form-label">Current Password</label>
                <input type="password" name="current_password" id="current_password" class="form-control" required
                    style="border-color: #d9534f;">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">New Password</label>
                <input type="password" name="password" id="password" class="form-control" required
                    style="border-color: #d9534f;">
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm New Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"
                    required style="border-color: #d9534f;">
            </div>
            <button type="submit" class="btn btn-danger mb-3"
                style="background-color: #d9534f; border-color: #d9534f; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);">
                Update Password
            </button>
        </form>
    </div>
</div>
@include('components.layout4')
