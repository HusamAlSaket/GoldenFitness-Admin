
@include('components.layout3')
@section('content')
    <div class="container">
        <h1>Thank you for your order!</h1>
        <p>Your order has been placed successfully.</p>
        <p><strong>Order ID:</strong> {{ $order->id }}</p>
        <p>We will process your order shortly and notify you once it's shipped.</p>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('home.index') }}" class="btn btn-primary">Return to Home</a>
    </div>
    @include('components.layout4')
