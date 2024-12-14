@include('components.layout3')
<div class="container">
    <h1>My Profile</h1>

    {{-- SweetAlert for Profile Success --}}
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session('success') }}',
                showConfirmButton: true,
                confirmButtonText: 'Okay',
                confirmButtonColor: '#00bcd4', // Custom color for confirm button
            }).then((result) => {
                if (result.isConfirmed) {
                    setTimeout(() => {
                        Swal.close(); // Close the SweetAlert after a delay
                    }, 700); // Delay of 700ms (0.7 seconds)
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
                confirmButtonColor: '#00bcd4', // Custom color for confirm button
            }).then((result) => {
                if (result.isConfirmed) {
                    setTimeout(() => {
                        Swal.close(); // Close the SweetAlert after a delay
                    }, 700); // Delay of 700ms (0.7 seconds)
                }
            });
        </script>
    @endif

    {{-- Error Messages --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Update Profile Form --}}
    <form action="{{ route('update') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" id="name"
                   value="{{ old('name', $user->name) }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="email"
                   value="{{ old('email', $user->email) }}" required>
        </div>
        <button type="submit" class="btn btn-danger mb-3">Update Profile</button>
    </form>

    {{-- Update Password Form --}}
    <hr>
    <h2>Change Password</h2>
    <form action="{{ route('password.update') }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="current_password" class="form-label">Current Password</label>
            <input type="password" name="current_password" id="current_password" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">New Password</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirm New Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-danger mb-3">Update Password</button>
    </form>
</div>
@include('components.layout4')
