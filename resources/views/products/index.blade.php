<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        <h1>Products</h1>
        @if (Session::has('success'))
            <div class="alert alert-success">
                <ul>
                    <li>{{ Session::get('success') }}</li>
                </ul>
            </div>
        @endif
        <div class="products">
            @foreach($products as $product)
                <div class="product-card">
                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}">
                    <h2>{{ $product->name }}</h2>
                    <a href="{{URL::to('product_view/'.$product->id)}}"><button class="order-button">Buy Now</button>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
