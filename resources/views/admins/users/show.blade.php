@extends('components.layout2')

<!-- Main Content Wrapper (with Sidebar Offset) -->
<div class="container-fluid mt-5">
    <div class="row">
        <!-- Sidebar (if applicable) -->
        <div class="col-md-3">
            <!-- Sidebar content, like navigation, etc. -->
        </div>

        <!-- user Details Section (Main Content) -->
        <div class="col-md-9">
            <h1 class="text-center">user Details</h1>

            <div class="user-details">
                <p><strong>Name:</strong> {{ $user->name }}</p>
                <p><strong>Email:</strong> {{ $user->email }}</p>
                <p><strong>Role:</strong> {{ $user->role }}</p>

                <!-- Back Button -->
                <div class="text-center mt-3">
                    <a href="{{ route('users.index') }}" class="btn btn-primary">Back to users</a>
                </div>
            </div>
        </div>
    </div>
</div>
