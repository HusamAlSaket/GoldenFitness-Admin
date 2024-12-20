@include('components.layout3')

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Font Awesome CDN for Icons -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<style>
    .btn i {
    font-size: 20px; /* Adjust the size of the icon */
    margin-right: 5px; /* Add space between icon and any text */
}

</style>
<style>
    .product-modal-img {
        width: 100%;
        max-width: 300px;
        height: auto;
        display: block;
        margin: 0 auto;
        border-radius: 10px;
        max-height: 300px;
    }

    #category {
        background-color: #f8f9fa;
        border: 2px solid #ccc;
        padding: 10px 15px;
        border-radius: 8px;
        font-size: 16px;
        color: #333;
        transition: all 0.3s ease;
        font-family: 'Arial', sans-serif;
        width: 200px;
    }

    #category option {
        background-color: #fff;
        color: #333;
        padding: 10px;
        font-family: 'Arial', sans-serif;
    }

    #category option:first-child {
        background: linear-gradient(135deg, #ff4d4d, #ff8000);
        color: #fff;
        font-weight: bold;
        border-bottom: 3px solid #333;
        text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.3);
        padding: 12px;
    }

    #category:focus {
        border-color: #ff4d4d;
        box-shadow: 0 0 10px rgba(255, 77, 77, 0.6);
    }
</style>

<!-- Breadcrumb -->
<div class="breadcumb-wrapper"
    style="height:500px; display: flex; align-items: center; justify-content: center; background-image: url('{{ asset('assets/img/bg/breadcrumb-bg.png') }}'); background-size: cover; background-position: center;">
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
        <div class="row gy-40" id="productsList">
            @forelse ($products as $product)
            <div class="col-lg-4 col-md-6 d-flex justify-content-center">
                <div class="product" style="text-align: center; margin-bottom: 30px;">
                    <div class="product-img mb-3">
                        @if ($product->images->isNotEmpty())
                            <img src="{{ asset('storage/' . $product->images->first()->image_url) }}"
                                alt="{{ $product->name }}" class="product-image">
                        @else
                            <img src="{{ asset('storage/placeholder.jpg') }}" alt="{{ $product->name }}"
                                class="product-image">
                        @endif
                    </div>
                    <h3 class="product-title">{{ $product->name }}</h3>
                    <p class="price">${{ number_format($product->price, 2) }}</p>
                    
                    <!-- Add to Cart with Icon -->
                    @if ($product->stock > 0)
                    <form action="{{ route('cart.add') }}" method="POST" class="mt-3">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button type="submit" class="btn style2">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i> <!-- Plus icon -->
                        </button>
                    </form>
               
                @else
                <p class="text-danger">Out of Stock</p>
            @endif
                    {{-- <form action="{{ route('cart.add') }}" method="POST" style="display: inline;">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button type="submit" class="btn style2">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i> <!-- Plus icon -->
                        </button>
                    </form> --}}
            
                    <!-- View Details Button -->
                    <div class="actions">
                        <a href="{{ route('users.products.show', $product->id) }}" class="btn style2 mt-2" style="font-size: 16px; padding: 8px 16px; width: auto;">View Details</a>
                    </div>
                </div>
            </div>


                <!-- Product Details Modal -->
                <div class="modal fade" id="productModal{{ $product->id }}" tabindex="-1"
                    aria-labelledby="productModalLabel{{ $product->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="productModalLabel{{ $product->id }}">{{ $product->name }}
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                @if ($product->images->isNotEmpty())
                                    <img src="{{ asset('storage/' . $product->images->first()->image_url) }}"
                                        alt="{{ $product->name }}" class="img-fluid mb-3 product-modal-img">
                                @else
                                    <img src="{{ asset('storage/placeholder.jpg') }}" alt="{{ $product->name }}"
                                        class="img-fluid mb-3 product-modal-img">
                                @endif
                                <p><strong>Description:</strong> {{ $product->description }}</p>
                                <p><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>

                                <!-- Approved Reviews -->
                                <h5>Reviews:</h5>
                                @if ($product->reviews->where('status', 'approved')->isNotEmpty())
                                    <ul class="list-group">
                                        @foreach ($product->reviews->where('status', 'approved') as $review)
                                            <li class="list-group-item">
                                                <strong>{{ $review->user->name }}</strong>:
                                                <span>{{ $review->rating }} stars</span>
                                                <p>{{ $review->comment }}</p>
                                            </li>
                                        @endforeach
                                    </ul>
                                @else
                                    <p>No reviews yet.</p>
                                @endif

                                <!-- Add Review Form -->
                                @if (auth()->check() && in_array($product->id, $userPurchasedProductIds))
                                    <form action="{{ route('reviews.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">

                                        <div class="mb-3">
                                            <label class="form-label">Rating</label>
                                            <div class="rating" data-product-id="{{ $product->id }}">
                                                @for ($i = 5; $i >= 1; $i--)
                                                    <input type="radio" name="rating"
                                                        id="star{{ $i }}_{{ $product->id }}"
                                                        value="{{ $i }}">
                                                    <label for="star{{ $i }}_{{ $product->id }}"
                                                        class="star"></i></label>
                                                @endfor
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="comment_{{ $product->id }}" class="form-label">Comment</label>
                                            <textarea name="comment" id="comment_{{ $product->id }}" class="form-control" rows="3" required></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-danger">Submit Review</button>
                                    </form>
                                @else
                                    <p class="text-danger">You must purchase this product to leave a review.</p>
                                @endif
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            </div>
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
                        <a class="page-link" href="{{ $products->previousPageUrl() }}" rel="prev"
                            aria-label="Previous">&lt;</a>
                    </li>
                    @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                        <li class="page-item {{ $products->currentPage() == $page ? 'active' : '' }}">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endforeach
                    <li class="page-item {{ $products->hasMorePages() ? '' : 'disabled' }}">
                        <a class="page-link" href="{{ $products->nextPageUrl() }}" rel="next"
                            aria-label="Next">&gt;</a>
                    </li>
                </ul>
            @endif
        </div>
    </div>
</div>
<style>
    .rating {
        display: flex;
        flex-direction: row-reverse;
        gap: 5px;
        font-size: 24px;
    }

    .rating input {
        display: none;
    }

    .rating .star {
        color: #ddd;
        cursor: pointer;
        transition: color 0.2s ease;
    }

    .rating input:checked~.star,
    .rating .star.active {
        color: gold;
    }

    /* Hover effect to fill stars from right to left */
    .rating .star:hover,
    .rating .star:hover~.star {
        color: gold;
    }
</style>

<script>
    document.querySelectorAll('.rating').forEach(rating => {
        const stars = rating.querySelectorAll('.star');

        stars.forEach((star, index) => {
            star.addEventListener('click', () => {
                // Get the value of the clicked star
                const ratingValue = stars.length - index;

                // Uncheck all radio buttons
                rating.querySelectorAll('input').forEach(input => {
                    input.checked = false;
                });

                // Check the corresponding radio button
                rating.querySelector(`input[value="${ratingValue}"]`).checked = true;
            });
        });
    });
</script>
<!-- Bootstrap JS -->
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script> --}}

@include('components.layout4')
