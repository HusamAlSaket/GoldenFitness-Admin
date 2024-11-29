@include('components.layout3')
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">


<!--==============================
    Breadcumb
    ============================== -->
<div class="breadcumb-wrapper" data-bg-src="{{ asset('assets/img/bg/breadcrumb-bg.png') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcumb-content">
                    <h1 class="breadcumb-title">Gym Equipments</h1>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Category Filter -->
<div class="container my-4">
    <form method="GET" action="{{ route('products.index') }}">
        <div class="row mb-3">
            <div class="col-md-4">
                <label class="form-label">Category</label>
                <select name="category" class="form-select" onchange="this.form.submit()">
                    <!-- Automatically submit on change -->
                    <option value="">All Categories</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ request('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->category_name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </form>
</div>




<!--==============================
    Shop Area
    ==============================-->
<div class="shop-area space">
    <div class="container">
        <div class="row gy-40 " id="productsList">
            @foreach ($products as $product)
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
                        <h3 class="product-title">
                            {{ $product->name }}
                        </h3>
                        <p class="price">
                            ${{ number_format($product->price, 2) }}
                        </p>
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
                                        alt="{{ $product->name }}" class="img-fluid mb-3" style="border-radius: 10px;">
                                @else
                                    <img src="{{ asset('storage/placeholder.jpg') }}" alt="{{ $product->name }}"
                                        class="img-fluid mb-3" style="border-radius: 10px;">
                                @endif
                                <p><strong>Description:</strong> {{ $product->description }}</p>
                                <p><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger " data-bs-dismiss="modal">Close</button>
                                {{-- <a href="#" class="btn style2">Add to Cart</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>





@include('components.layout4')
