<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create New User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            line-height: 1.5;
        }

        form {
            max-width: 400px;
        }

        label {
            font-weight: bold;
        }

        select,
        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
        }

        button {
            padding: 10px 15px;
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <h1>Create New User</h1>
    <form action="{{ route('admins.users.store') }}" method="POST">
        @csrf

        <!-- Name Field -->
        <label for="name">Name</label>
        <input type="text" id="name" name="name" required>

        <!-- Description Field -->
        <label for="email">email</label>
        <input type="text" id="email" name="email">

        <!-- Price Field -->
        <label for="password">password</label>
        <input type="password" id="password" name="password" required>
        <div class="mb-3">
            <label class="form-label">Role</label>
            <select name="role" class="form-select" required>
                <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="superadmin" {{ $user->role == 'superadmin' ? 'selected' : '' }}>Superadmin</option>
                <option value="coach" {{ $user->role == 'coach' ? 'selected' : '' }}>Coach</option>
            </select>
        </div>

        @endforeach



        <!-- Submit Button -->
        <button type="submit">Save Product</button>
    </form>
</body>

</html>
