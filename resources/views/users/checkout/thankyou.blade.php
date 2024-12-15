@include('components.layout3')

    <div class="container mt-5">
        <div class="text-center">
            <h1 class="mb-4" style="color: #d9534f;">Thank you for your order!</h1>
            <p class="lead mb-4" style="color: #333;">Your order has been placed successfully.</p>
            <p><strong>Order ID:</strong> <span style="color: #d9534f;">{{ $order->id }}</span></p>
            <p>We will process your order shortly and notify you once it's shipped.</p>

            @if (session('success'))
                <div class="alert alert-success shadow-sm" role="alert" style="background-color: #dff0d8; color: #3c763d;">
                    {{ session('success') }}
                </div>
            @endif

            <a href="{{ route('home.index') }}" class="btn btn-danger mt-4 mb-4" style="background-color: #d9534f; border-color: #d9534f; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);">
                Return to Home
            </a>
        </div>
    </div>
@include('components.layout4')

