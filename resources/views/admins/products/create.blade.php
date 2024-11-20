<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create New Product</title>
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
    <h1>Create New Product</h1>
    <form action="{{ route('admins.products.store') }}" method="POST">
        @csrf

        <!-- Name Field -->
        <label for="name">Name</label>
        <input type="text" id="name" name="name" required>

        <!-- Description Field -->
        <label for="description">Description</label>
        <input type="text" id="description" name="description">

        <!-- Price Field -->
        <label for="price">Price</label>
        <input type="number" id="price" name="price" step="0.01" required>

        <!-- Category Dropdown -->
        <label for="category_id">Category</label>
        <select class="form-control" name="category_id">
            <option value="">Select Category</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $category->id == old('category_id') ? 'selected' : '' }}>
                    {{ $category->category_name }}
                </option>
            @endforeach
        </select>

        <!-- Stock Field -->
        <label for="stock">Stock</label>
        <input type="number" id="stock" name="stock">

        <!-- Submit Button -->
        <button type="submit">Save Product</button>
    </form>
</body>

</html>
