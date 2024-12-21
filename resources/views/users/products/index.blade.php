@include('components.layout3')

<!-- Bootstrap CSS -->
{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
<!-- Font Awesome CDN for Icons -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<style>
    /* Product Card Styles */
    .product-card {
        border: 1px solid #ddd;
        border-radius: 15px;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        background-color: #fff;
    }

    .product-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
    }

  
    .product-img {
    position: relative;
    overflow: hidden;
    border-bottom: 2px solid #f1f1f1;
    width: 100%;
    height: auto; /* Allow natural height of the image */
    aspect-ratio: 1 / 1; /* Ensure a consistent square ratio for all images */
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #f9f9f9; /* Add a neutral background color */
}

.product-img img {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain; /* Prevent image distortion or cropping */
    transition: transform 0.3s ease;
}

.product-img:hover img {
    transform: scale(1.1); /* Zoom effect on hover */
}


    .product-title {
        font-size: 18px;
        font-weight: bold;
        color: #333;
        margin-top: 15px;
        margin-bottom: 10px;
    }

    .price {
        font-size: 16px;
        color: #e74c3c;
        font-weight: bold;
        margin-bottom: 15px;
    }

    .btn-add-cart {
        font-size: 16px;
        padding: 8px 18px;
        background-color: #28a745;
        color: #fff;
        border-radius: 30px;
        border: none;
        transition: background-color 0.3s ease;
    }

    .btn-add-cart:hover {
        background-color: #218838;
    }

    .btn-details {
        font-size: 16px;
        padding: 8px 16px;
        margin-top: 10px;
        color: #fff;
        background-color: #3498db;
        border-radius: 30px;
        border: none;
        transition: background-color 0.3s ease;
    }

    .btn-details:hover {
        background-color: #2980b9;
    }

    /* Stock Status */
    .out-of-stock {
        color: #e74c3c;
        font-weight: bold;
        margin-top: 10px;
    }

    .rating {
        display: flex;
        justify-content: center;
        gap: 5px;
        font-size: 18px;
        color: #f39c12;
    }

    .rating input {
        display: none;
    }

    .rating .star {
        cursor: pointer;
        transition: color 0.2s ease;
    }

    .rating input:checked ~ .star,
    .rating .star.active {
        color: gold;
    }

    .rating .star:hover,
    .rating .star:hover ~ .star {
        color: gold;
    }

    /* Product Modal Styles */
    .product-modal-img {
        width: 100%;
        max-width: 300px;
        height: auto;
        display: block;
        margin: 0 auto;
        border-radius: 10px;
        max-height: 300px;
    }
</style>

<!-- Breadcrumb -->
<div class="breadcumb-wrapper" style="height: 500px; display: flex; align-items: center; justify-content: center; background-image: url('{{ asset('assets/img/bg/breadcrumb-bg.png') }}'); background-size: cover; background-position: center;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcumb-content text-center">
                    <h1 class="breadcumb-title">Gym Equipments</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Category Filter -->
<div class="container my-4">
    <form method="GET" action="{{ route('products.index') }}" class="d-flex align-items-center gap-3">
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
        <a href="{{ route('products.index') }}" class="btn btn style2">Reset Filters</a>
    </form>
</div>

<!-- Shop Area -->
<div class="shop-area space">
    <div class="container">
        <div class="row gy-4" id="productsList">
            @forelse ($products as $product)
            <div class="col-lg-4 col-md-6 d-flex justify-content-center">
                <div class="product-card">
                    <div class="product-img">
                        @if ($product->images->isNotEmpty())
                            <img src="{{ asset('storage/' . $product->images->first()->image_url) }}" alt="{{ $product->name }}">
                        @else
                            <img src="{{ asset('storage/placeholder.jpg') }}" alt="{{ $product->name }}">
                        @endif
                    </div>
                    <div class="product-info p-3 text-center">
                        <h3 class="product-title mb-3">{{ $product->name }}</h3> <!-- Added margin-bottom -->
                        <p class="price mb-3">${{ number_format($product->price, 2) }}</p> <!-- Added margin-bottom -->
        
                        <!-- Stock Check -->
                        @if ($product->stock > 0)
                        
                        @else
                            <p class="out-of-stock mb-3">Out of Stock</p> <!-- Added margin-bottom -->
                        @endif
        
                        <!-- View Details and Add to Cart Buttons on the Same Line -->
                        <div class="btn-container d-flex justify-content-center mb-3">
                            <a href="{{ route('users.products.show', $product->id) }}" class="btn style2 me-2"> <!-- Added margin-right -->
                                View Details
                            </a>
                            @if ($product->stock > 0)
                                <form action="{{ route('cart.add') }}" method="POST" class="d-inline-block">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <button type="submit" class="btn style2">
                                        <i class="fa fa-shopping-cart"></i> Add to Cart
                                    </button>
                                </form>
                            @endif
                        </div>
        
                        <!-- Rating Section -->
                        {{-- <div class="rating">
                            @for ($i = 5; $i >= 1; $i--)
                                <input type="radio" name="rating" id="star{{ $i }}_{{ $product->id }}" value="{{ $i }}">
                                <label for="star{{ $i }}_{{ $product->id }}" class="star"></label>
                            @endfor
                        </div> --}}
                    </div>
                </div>
            </div>
            @empty
                <p>No products found.</p>
            @endforelse
        </div>
        

        <!-- Pagination -->
        <div class="pagination-container">
            @if ($products->hasPages())
                <div class="pagination-info">
                    Showing {{ $products->firstItem() }} to {{ $products->lastItem() }} of {{ $products->total() }}
                    results (Page {{ $products->currentPage() }} of {{ $products->lastPage() }})
                </div>
                <ul class="pagination">
                    <li class="page-item {{ $products->onFirstPage() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $products->previousPageUrl() }}" rel="prev" aria-label="Previous">&lt;</a>
                    </li>
                    @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                        <li class="page-item {{ $products->currentPage() == $page ? 'active' : '' }}">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endforeach
                    <li class="page-item {{ $products->hasMorePages() ? '' : 'disabled' }}">
                        <a class="page-link" href="{{ $products->nextPageUrl() }}" rel="next" aria-label="Next">&gt;</a>
                    </li>
                </ul>
            @endif
        </div>
    </div>
</div>

<!-- Product Details Modal -->
<div class="modal fade" id="productModal{{ $product->id }}" tabindex="-1" aria-labelledby="productModalLabel{{ $product->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="productModalLabel{{ $product->id }}">{{ $product->name }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="{{ asset('storage/' . $product->images->first()->image_url) }}" alt="{{ $product->name }}" class="product-modal-img">
                <p>{{ $product->description }}</p>
                <p><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
                <p><strong>Stock:</strong> {{ $product->stock }}</p>
                {{-- <form action="{{ route('cart.add') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <button type="submit" class="btn btn-primary">Add to Cart</button>
                </form> --}}
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS, Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.0/dist/umd/popper.min.js"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script> --}}




@include('components.layout4')
