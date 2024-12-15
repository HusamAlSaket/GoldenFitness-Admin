@include('components.layout3')
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Breadcrumb -->
<div class="breadcumb-wrapper" data-bg-src="{{ asset('assets/img/hero/AdobeStock_225025152.jpeg') }}" 
     style="height:500px; display: flex; align-items: center; justify-content: center; 
            background-image: url('{{ asset('assets/img/hero/AdobeStock_225025152.jpeg') }}'); 
            background-size: cover; background-position: center;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcumb-content text-center">
                    <h1 class="breadcumb-title">Supplements</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    /* Styling for images inside the product modal */
.modal-body img {
    width: 100%; /* Ensure the image scales to container width */
    max-width: 300px; /* Set a maximum width for the image */
    height: 350px; /* Set a fixed height for the image */
    object-fit: cover; /* Ensure the image maintains its aspect ratio */
    border-radius: 10px; /* Rounded corners */
    margin: 0 auto; /* Center the image */
    display: block; /* Ensure the image is a block element for centering */
}

</style>
<style>
    
    /* Styling for the select box and option */
#category {
    background-color: #f8f9fa;
    border: 1px solid #ccc;
    padding: 8px 12px;
    border-radius: 5px;
    font-size: 14px;
    color: #333;
    transition: all 0.3s ease;
    width:200px;
}

#category option {
    background-color: #fff;
    color: #333;
    padding: 10px;
}

/* Custom styling for "All Categories" option */
#category option:first-child {
    background-color: #ff4d4d;  /* Red background */
    color: #fff;                /* White text */
    font-weight: bold;
    border-bottom: 2px solid #333; /* Cool border */
    padding: 10px;
}

/* Styling for hovering over the options */
#category option:hover {
    background-color: #e6e6e6;
}

/* Adding a custom border to the select box */
#category {
    border: 2px solid #333;
    outline: none;
}

#category:focus {
    border-color: #ff4d4d;
}

</style>

<!-- Category Filter -->
<div class="container my-4">
    <form method="GET" action="{{ route('users.supplements.index') }}" class="d-flex align-items-center gap-3">
        <div class="form-group">
            <label for="category" class="form-label">Category</label>
            <select name="category" id="category" class="form-select" onchange="this.form.submit()">
                <option value="">All Categories</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                        {{ $category->category_name }}
                    </option>
                @endforeach
            </select>
        </div>
        <a href="{{ route('users.supplements.index') }}" class="btn style2" style="">Reset Filters</a>
    </form>
</div>

<!-- Shop Area -->
<div class="shop-area space">
    <div class="container">
        <div class="row gy-40" id="productsList">
            @forelse ($products as $product)
                <div class="col-lg-4 col-md-6 d-flex justify-content-center">
                    <div class="product" style="text-align: center; margin-bottom: 30px;">
                        <div class="product-img mb-3">
                            @if ($product->images->isNotEmpty())
                                <img src="{{ asset('storage/' . $product->images->first()->image_url) }}"
                                    alt="{{ $product->name }}" class="product-image"
                                    style="width: 100%; max-width: 300px; height: 250px; object-fit: cover; border-radius: 10px;">
                            @else
                                <img src="{{ asset('storage/placeholder.jpg') }}" alt="{{ $product->name }}"
                                    class="product-image"
                                    style="width: 100%; max-width: 300px; height: 250px; object-fit: cover; border-radius: 10px;">
                            @endif
                        </div>
                        <h3 class="product-title">{{ $product->name }}</h3>
                        <p class="price">${{ number_format($product->price, 2) }}</p>
                        <form action="{{ route('cart.add') }}" method="POST" style="display: inline;">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <button type="submit" class="btn style2">Add to Cart</button>
                        </form>
                        <div class="actions">
                            <button type="button" class="btn style2 m-1" data-bs-toggle="modal"
                                data-bs-target="#productModal{{ $product->id }}">
                                View Details
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Product Details Modal -->
                <div class="modal fade" id="productModal{{ $product->id }}" tabindex="-1"
                    aria-labelledby="productModalLabel{{ $product->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="productModalLabel{{ $product->id }}">{{ $product->name }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                @if ($product->images->isNotEmpty())
                                    <img src="{{ asset('storage/' . $product->images->first()->image_url) }}"
                                        alt="{{ $product->name }}" class="img-fluid mb-3" style="border-radius: 10px;">
                                @else
                                    <img src="{{ asset('storage/placeholder.jpg') }}" alt="{{ $product->name }}"
                                        class="img-fluid mb-3" style="border-radius: 10px;">
                                @endif
                                <p><strong>Description:</strong> {{ $product->description }}</p>
                                <p><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center">No products found for the selected category.</p>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="pagination-container">
            <!-- Pagination Info -->
            @if ($products->hasPages())
                <div class="pagination-info">
                    Showing {{ $products->firstItem() }} to {{ $products->lastItem() }} of {{ $products->total() }} results (Page {{ $products->currentPage() }} of {{ $products->lastPage() }})
                </div>
        
                <!-- Pagination Links -->
                <ul class="pagination">
                    <!-- Previous Button -->
                    <li class="page-item {{ $products->onFirstPage() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $products->previousPageUrl() }}" rel="prev" aria-label="Previous">&lt;</a>
                    </li>
        
                    <!-- Page Numbers -->
                    @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                        <li class="page-item {{ $products->currentPage() == $page ? 'active' : '' }}">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endforeach
        
                    <!-- Next Button -->
                    <li class="page-item {{ $products->hasMorePages() ? '' : 'disabled' }}">
                        <a class="page-link" href="{{ $products->nextPageUrl() }}" rel="next" aria-label="Next">&gt;</a>
                    </li>
                </ul>
            @endif
        </div>
        
        
        
    </div>
</div>

@include('components.layout4')
