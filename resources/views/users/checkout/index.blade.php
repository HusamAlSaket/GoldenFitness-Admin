@include('components.layout3')

<div class="container mt-5 mb-5">
    <h2 class="text-center mb-4" style="color: #d9534f;">Checkout</h2>
    <form action="{{ route('checkout.store') }}" method="POST" id="checkout-form" class="p-4 rounded shadow-lg" style="background-color: #fff; border-radius: 10px;">
        @csrf
        <div class="mb-3">
            <label for="userName" class="form-label">Name</label>
            <input type="text" class="form-control" id="userName" value="{{ $user->name }}" disabled style="border-color: #d9534f;">
        </div>
        <div class="mb-3">
            <label for="userEmail" class="form-label">Email</label>
            <input type="email" class="form-control" id="userEmail" value="{{ $user->email }}" disabled style="border-color: #d9534f;">
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone Number</label>
            <input type="text" class="form-control" id="phone" name="phone" required style="border-color: #d9534f;">
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Shipping Address</label>
            <textarea class="form-control" id="address" name="address" rows="3" required style="border-color: #d9534f;"></textarea>
        </div>

        <h4 class="mt-4" style="color: #d9534f;">Order Details</h4>
        <ul class="list-group mb-3" style="background-color: #f8f9fa;">
            @foreach ($cartItems as $item)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $item['name'] }} (x{{ $item['quantity'] }})
                    <span>${{ number_format($item['price'] * $item['quantity'], 2) }}</span>
                </li>
            @endforeach
        </ul>
        <h5>Total Price: <span style="color: #d9534f;">${{ number_format($totalPrice, 2) }}</span></h5>

        <button type="submit" class="btn btn-danger w-100 mt-4" id="submit-button" style="background-color: #d9534f; border-color: #d9534f; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);">
            Proceed to Payment
        </button>
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
            confirmButtonColor: '#d9534f',  // Red confirm button
        }).then(() => {
            // After SweetAlert closes, submit the form
            this.submit();  // Submit the form to the server
        });
    });
</script>

@include('components.layout4')
