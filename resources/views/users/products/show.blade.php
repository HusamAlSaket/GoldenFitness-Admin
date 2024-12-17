@include('components.layout3')


<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    :root {
        --primary-red: #DC3545;
        --secondary-red: #FF6B6B;
        --light-gray: #F8F9FA;
    }

    body {
        background-color: var(--light-gray);
        font-family: 'Arial', sans-serif;
    }

    .product-container {
        background-color: white;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        transition: transform 0.3s ease;
    }

    .product-image-gallery {
        display: flex;
        flex-direction: row;
        height: 500px;
    }

    .thumbnail-column {
        width: 100px;
        display: flex;
        flex-direction: column;
        gap: 10px;
        padding: 10px;
        background-color: #f4f4f4;
        overflow-y: auto;
    }

    .thumbnail-column .thumbnail {
        width: 80px;
        height: 80px;
        object-fit: cover;
        cursor: pointer;
        opacity: 0.7;
        transition: opacity 0.3s ease;
        border: 2px solid transparent;
    }

    .thumbnail-column .thumbnail:hover,
    .thumbnail-column .thumbnail.active {
        opacity: 1;
        border: 2px solid var(--primary-red);
    }

    .main-image-container {
        flex-grow: 1;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: white;
    }

    .main-product-image {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
    }

    .product-details {
        padding: 30px;
    }

    .product-name {
        color: var(--primary-red);
        font-weight: bold;
        margin-bottom: 20px;
    }

    .rating {
        display: flex;
        direction: rtl;
        unicode-bidi: bidi-override;
        margin-bottom: 15px;
    }

    .rating input {
        display: none;
    }

    .rating .star {
        color: #ddd;
        font-size: 30px;
        cursor: pointer;
        transition: color 0.3s;
    }

    .rating input:checked~label,
    .rating input:hover~label {
        color: var(--primary-red);
    }

    .rating .star:before {
        content: '★';
    }

    .review-list {
        max-height: 300px;
        overflow-y: auto;
    }

    .review-item {
        background-color: #FFFFFF;
        border-left: 4px solid var(--primary-red);
        margin-bottom: 10px;
        padding: 15px;
        transition: box-shadow 0.3s ease;
    }

    .review-item:hover {
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .submit-review-btn {
        background-color: var(--primary-red);
        border: none;
        transition: background-color 0.3s ease;
    }

    .submit-review-btn:hover {
        background-color: var(--secondary-red);
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    .animate-fade-in {
        animation: fadeIn 0.5s ease-out;
    }
</style>
</head>

<body>
    <div class="container my-4">
        <div class="row">
            <div class="col-12">
                <div class="product-container animate-fade-in">
                    <div class="row g-0">
                        <div class="col-md-6">
                            <div class="product-image-gallery">
                                <div class="thumbnail-column">
                                    @forelse($product->images as $image)
                                        <img src="{{ asset('storage/' . $image->image_url) }}"
                                            alt="{{ $product->name . ' thumbnail' }}"
                                            class="thumbnail {{ $loop->first ? 'active' : '' }}"
                                            data-full-image="{{ asset('storage/' . $image->image_url) }}"
                                            id="thumbnail-{{ $loop->index }}">
                                    @empty
                                        <p>No images available.</p>
                                        <!-- Fallback message when no images are available -->
                                    @endforelse
                                </div>
                                <div class="main-image-container">
                                    @if ($product->images->isNotEmpty())
                                        <img src="{{ asset('storage/' . $product->images->first()->image_url) }}"
                                            alt="{{ $product->name }}" class="main-product-image"
                                            id="main-product-image">
                                    @else
                                        <img src="{{ asset('images/placeholder.jpg') }}" alt="Placeholder Image"
                                            class="main-product-image" id="main-product-image">
                                    @endif
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6 product-details">
                            <h1 class="product-name">{{ $product->name }}</h1>
                            <p>{{ $product->description }}</p>
                            <p class="h4 text-danger">
                                <strong>Price:</strong> ${{ number_format($product->price, 2) }}
                            </p>
                            @if ($product->stock > 0)
                                <p class="text-success">In Stock: {{ $product->stock }} available</p>
                            @else
                                <p class="text-danger">Out of Stock</p>
                            @endif

                            @if ($product->stock > 0)
                                <form action="{{ route('cart.add') }}" method="POST" class="mt-3">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <div class="input-group">
                                        <input type="number" name="quantity" class="form-control" value="1"
                                            min="1" max="{{ $product->stock }}">
                                        <button type="submit" class="btn btn-danger">
                                            Add to Cart
                                        </button>
                                    </div>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product Details Section -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="card animate-fade-in">
                    <div class="card-header bg-white border-bottom border-danger">
                        <h5 class="text-danger mb-0">Product Details</h5>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>Category</th>
                                <td>{{ $product->category->category_name ?? 'Not specified' }}</td>
                            </tr>
                            <tr>
                                <th>price</th>
                                <td>${{ $product->price ?? '$' }} </td>
                            </tr>
                            <tr>
                                <th>Stock</th>
                                <td>{{ $product->stock ? $product->stock . ' left' : 'Not specified' }}</td>
                            </tr>
                        
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Reviews Section -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="card animate-fade-in">
                    <div class="card-header bg-white border-bottom border-danger">
                        <h5 class="text-danger mb-0">Reviews
                            ({{ $product->reviews->where('status', 'approved')->count() }})</h5>
                    </div>
                    <div class="card-body">
                        @if ($product->reviews->where('status', 'approved')->isNotEmpty())
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="text-center">
                                        <h2 class="text-danger">
                                            {{ number_format($product->reviews->where('status', 'approved')->avg('rating'), 1) }}
                                        </h2>
                                        <div class="rating justify-content-center">
                                            @php
                                                $avgRating = $product->reviews
                                                    ->where('status', 'approved')
                                                    ->avg('rating');
                                            @endphp
                                            @for ($i = 1; $i <= 5; $i++)
                                                <span
                                                    class="star {{ $i <= round($avgRating) ? 'text-danger' : '' }}"></span>
                                            @endfor
                                        </div>
                                        <p>{{ $product->reviews->where('status', 'approved')->count() }} Reviews</p>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <ul class="list-group review-list">
                                        @foreach ($product->reviews->where('status', 'approved') as $review)
                                            <li class="list-group-item review-item">
                                                <div class="d-flex justify-content-between">
                                                    <strong class="text-danger">{{ $review->user->name }}</strong>
                                                    <small
                                                        class="text-muted">{{ $review->created_at->diffForHumans() }}</small>
                                                </div>
                                                <div class="rating">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <span
                                                            class="star {{ $i <= $review->rating ? 'text-danger' : '' }}"></span>
                                                    @endfor
                                                </div>
                                                <p>{{ $review->comment }}</p>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @else
                            <p class="text-muted text-center">No approved reviews yet.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Add Review Form -->
        <div class="row mt-4">
            <div class="col-12">
                @if (auth()->check() && in_array($product->id, $userPurchasedProductIds))
                    <div class="card animate-fade-in">
                        <div class="card-header bg-white border-bottom border-danger">
                            <h5 class="text-danger mb-0">Write a Review</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('reviews.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <div class="mb-3">
                                    <label class="form-label text-danger">Rating</label>
                                    <div class="rating">
                                        @for ($i = 5; $i >= 1; $i--)
                                            <input type="radio" name="rating" value="{{ $i }}"
                                                id="star{{ $i }}">
                                            <label for="star{{ $i }}" class="star"></label>
                                        @endfor
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="comment" class="form-label text-danger">Comment</label>
                                    <textarea name="comment" id="comment" class="form-control" rows="3" required></textarea>
                                </div>
                                <button type="submit" class="btn submit-review-btn">Submit Review</button>
                            </form>
                        </div>
                    </div>
                @else
                    <div class="alert alert-danger animate-fade-in">
                        You must purchase this product to leave a review.
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const thumbnails = document.querySelectorAll('.thumbnail');
            const mainImage = document.getElementById('main-product-image');

            thumbnails.forEach(thumbnail => {
                thumbnail.addEventListener('click', function() {
                    // Remove active class from all thumbnails
                    thumbnails.forEach(t => t.classList.remove('active'));

                    // Add active class to clicked thumbnail
                    this.classList.add('active');

                    // Change main image
                    mainImage.src = this.dataset.fullImage;
                });
            });
        });
    </script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    @include('components.layout4')
