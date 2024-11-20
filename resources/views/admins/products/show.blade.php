@extends('components.layout2')

<!-- Main Content Wrapper (with Sidebar Offset) -->
<div class="container-fluid mt-5">
    <div class="row">
        <!-- Sidebar (if applicable) -->
        <div class="col-md-3">
            <!-- Sidebar content, like navigation, etc. -->
        </div>

        <!-- Product Details Section (Main Content) -->
        <div class="col-md-9">
            <h1 class="text-center">Product Details</h1>

            <div class="product-details">
                <p><strong>Name:</strong> {{ $product->name }}</p>
                <p><strong>Description:</strong> {{ $product->description }}</p>
                <p><strong>Price:</strong> ${{ $product->price }}</p>
                <p><strong>Stock:</strong> {{ $product->stock }}</p>
                <p><strong>Category:</strong> {{ $product->category->category_name ?? 'Uncategorized' }}</p>

                <!-- Back Button -->
                <div class="text-center mt-3">
                    <a href="{{ route('products.index') }}" class="btn btn-primary">Back to Products</a>
                </div>
            </div>
        </div>
    </div>
</div>
