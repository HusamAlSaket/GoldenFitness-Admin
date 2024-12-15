@include('components.layout3')

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    .product-modal-img {
    width: 100%; /* Ensures it scales to fit the modal width */
    max-width: 300px; /* Limits the image to a maximum width */
    height: auto; /* Maintains the aspect ratio */
    display: block; /* Ensures the image is treated as a block element */
    margin: 0 auto; /* Centers the image */
    border-radius: 10px; /* Keeps the rounded corners */
    max-height: 300px;
}

</style>

<!-- Breadcrumb -->
<div class="breadcumb-wrapper" data-bg-src="{{ asset('assets/img/bg/breadcrumb-bg.png') }}" 
     style="height:500px; display: flex; align-items: center; justify-content: center; 
            background-image: url('{{ asset('assets/img/bg/breadcrumb-bg.png') }}'); 
            background-size: cover; background-position: center;">
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
        <a href="{{ route('products.index') }}" class="btn btn-secondary mt-3">Reset Filters</a>
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
                                <h5 class="modal-title" id="productModalLabel{{ $product->id }}">{{ $product->name }}
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                @if ($product->images->isNotEmpty())
                                    <img src="{{ asset('storage/' . $product->images->first()->image_url) }}"
                                        alt="{{ $product->name }}" class="img-fluid mb-3 product-modal-img" style="border-radius: 10px;">
                                @else
                                    <img src="{{ asset('storage/placeholder.jpg') }}" alt="{{ $product->name }}"
                                        class="img-fluid mb-3 product-modal-img" style="border-radius: 10px;">
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
            Pagination Info
            @if ($products->hasPages())
                <div class="pagination-info">
                    Showing {{ $products->firstItem() }} to {{ $products->lastItem() }} of {{ $products->total() }}
                    results
                    (Page {{ $products->currentPage() }} of {{ $products->lastPage() }})
                </div>

                Pagination Links
                <ul class="pagination">
                    <!-- Previous Button -->
                    <li class="page-item {{ $products->onFirstPage() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $products->previousPageUrl() }}" rel="prev"
                            aria-label="Previous">&lt;</a>
                    </li>

                    <!-- Page Numbers -->
                    @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                        <li class="page-item {{ $products->currentPage() == $page ? 'active' : '' }}">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endforeach

                    <!-- Next Button -->
                    <li class="page-item {{ $products->hasMorePages() ? '' : 'disabled' }}">
                        <a class="page-link" href="{{ $products->nextPageUrl() }}" rel="next"
                            aria-label="Next">&gt;</a>
                    </li>
                </ul>
            @endif
        </div>

    </div>
</div>

@include('components.layout4')
