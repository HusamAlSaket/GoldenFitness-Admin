<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Create New Product</h1>
    <form action="{{ route('admins.products.store') }}" method="POST">
        @csrf
        <label for="name">Name</label><br>
        <input type="text" id="name" name="name" required><br><br>
    
        <label for="description">Description</label><br>
        <input type="text" id="description" name="description"><br><br>
    
        <label for="price">Price</label><br>
        <input type="number" id="price" name="price" required><br><br>
    
        <label for="category_id">Category</label><br>
        <select name="category_id" id="category_id">
            <option value="">Select Category</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select><br><br>
    
        <label for="stock">Stock</label><br>
        <input type="number" id="stock" name="stock" required><br><br>
    
        <button type="submit">Save Product</button>
    </form>
    
    
</body>
</html>