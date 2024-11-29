@include('components.layout3')

<div class="container my-5">
    <h1>Your Cart</h1>
    @if(session('cart') && count(session('cart')) > 0)
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach (session('cart') as $id =>$item)
                <tr>
                    <td><img src="{{asset('storage/' .$item['image_url'])}}" alt="{{$item['name']}}" style="width:50px; height:50px"></td>
                    <td>{{$item['name']}}</td>
                    <td>${{ number_format($item['price'], 2) }}</td>
                    <td>{{ $item['quantity'] }}</td>
                    <td>${{ number_format($item['price'] * $item['quantity'], 2) }}</td>

                </tr>
            @endforeach
        </tbody>

    </table>
    @else
    <p>Your cart is empty </p>
    @endif
</div>
@include('components.layout4')