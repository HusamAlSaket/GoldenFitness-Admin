<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Edit Product</h1>
    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Product Name</label>
            <input type="text" class="form-control" name="name" value="{{ old('name', $product->name) }}"
                required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description">{{ old('description', $product->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" class="form-control" name="price" value="{{ old('price', $product->price) }}">
        </div>

        <div class="form-group">
            <label for="category_id">Category</label>
            <select class="form-control" name="category_id">
                <option value="">Select Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ $category->id == old('category_id', $product->category_id) ? 'selected' : '' }}>
                        {{ $category->category_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Product</button>
    </form>

    @extends('components.layout2')

    <!-- Main Content -->
    <main class="main-content" id="mainContent">
        <!-- Product Stats Grid and Table Code -->
    
        <!-- Add SweetAlert Script -->

    </main>
    

        
        <!-- Product Form -->
        <form id="editProductForm" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Product Name</label>
                <input type="text" class="form-control" name="name" value="{{ old('name', $product->name) }}" required>
            </div>
        
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description">{{ old('description', $product->description) }}</textarea>
            </div>
        
            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" class="form-control" name="price" value="{{ old('price', $product->price) }}">
            </div>
        
            <div class="form-group">
                <label for="category_id">Category</label>
                <select class="form-control" name="category_id">
                    <option value="">Select Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == old('category_id', $product->category_id) ? 'selected' : '' }}>
                            {{ $category->category_name }}
                        </option>
                    @endforeach
                </select>
            </div>
        
            <button type="submit" class="btn btn-primary">Update Product</button>
        </form>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>
