<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Product Details</h1>

<p>Name: {{ $product->name }}</p>
<p>Description: {{ $product->description }}</p>
<p>Price: ${{ $product->price }}</p>
<p>Stock: {{ $product->stock }}</p>
<p>Category: {{ $product->category->name ?? 'Uncategorized' }}</p>

<a href="{{ route('products.index') }}" class="btn btn-primary">Back to Products</a>

</body>
</html>