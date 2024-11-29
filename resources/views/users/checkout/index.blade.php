@include('components.layout3')

<div class="container mt-5">
    <h2>Checkout</h2>
    <form action="{{ route('checkout.store') }}" method="POST" id="checkout-form">
        @csrf
        <div class="mb-3">
            <label for="userName" class="form-label">Name</label>
            <input type="text" class="form-control" id="userName" value="{{ $user->name }}" disabled>
        </div>
        <div class="mb-3">
            <label for="userEmail" class="form-label">Email</label>
            <input type="email" class="form-control" id="userEmail" value="{{ $user->email }}" disabled>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone Number</label>
            <input type="text" class="form-control" id="phone" name="phone" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Shipping Address</label>
            <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
        </div>

        <h4>Order Details</h4>
        <ul class="list-group mb-3">
            @foreach ($cartItems as $item)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $item['name'] }} (x{{ $item['quantity'] }})
                    <span>${{ number_format($item['price'] * $item['quantity'], 2) }}</span>
                </li>
            @endforeach
        </ul>
        <h5>Total Price: ${{ number_format($totalPrice, 2) }}</h5>

        <button type="submit" class="btn btn-primary" id="submit-button">Proceed to Payment</button>
    </form>
</div>

<!-- SweetAlert Script -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // Attach the submit event to the form
    document.getElementById('checkout-form').addEventListener('submit', function(e) {
        e.preventDefault();  // Prevent form submission initially

        let submitButton = document.getElementById('submit-button');  // Get the submit button
        submitButton.disabled = true;  // Disable the submit button to prevent multiple clicks

        // Simulate successful transaction
        Swal.fire({
            icon: 'success',
            title: 'Transaction Successful',
            text: 'Your order has been placed successfully!',
            showConfirmButton: true,
        }).then(() => {
            // After SweetAlert closes, submit the form
            this.submit();  // Submit the form to the server
        });
    });
</script>

@include('components.layout4')
