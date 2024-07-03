<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</head>
</head>
<body>
    <div class="container">
        <h1>Product View</h1>
        @if (Session::has('success'))
            <div class="alert alert-success">
                <ul>
                    <li>{{ Session::get('success') }}</li>
                </ul>
            </div>
        @endif
        <div class="products">
            <div class="product-card-image">
                <img src="{{ $product->image_url }}" alt="{{ $product->name }}">
                <h2>{{ $product->name }}</h2>
                <label for="">Quantity</label>
                <button type="button" class="decrement">-</button>
                <input type="text" name="quantity" id="quantity" value="0" min="0" readonly>
                <button type="button" class="increment">+</button><br/><br/>
                <button type="button" class="order-button btn btn-primary" data-toggle="modal" data-target="#orderModal">Order Now</button>
            </div>
        </div>
    </div>

    
<div class="modal fade" id="orderModal" tabindex="-1" role="dialog" aria-labelledby="orderModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="orderModalLabel">Shipping Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                <div class="modal-body">
                <form id="order-form" action="{{URL::to('submit-order')}}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        <input type="hidden" name="quan" id="quan" value="">
                        
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="shipping_address_1">Shipping Address 1:</label>
                            <input type="text" name="shipping_address_1" id="shipping_address_1" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="shipping_address_2">Shipping Address 2:</label>
                            <input type="text" name="shipping_address_2" id="shipping_address_2" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="shipping_address_3">Shipping Address 3:</label>
                            <input type="text" name="shipping_address_3" id="shipping_address_3" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="city">City:</label>
                            <input type="text" name="city" id="city" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="country_code">Country Code:</label>
                            <input type="text" name="country_code" id="country_code" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="zip_postal_code">ZIP/Postal Code:</label>
                            <input type="text" name="zip_postal_code" id="zip_postal_code" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Submit Order</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>


    <script>
        $(document).ready(function(){
            $('#quan').val($('#quantity').val());
            $('.increment').click(function(){
                var input_de = $(this).siblings('input');
                //alert(parseInt(input.val()) + 1);
                $('#quantity').val(parseInt(input_de.val()));
                $('#quan').val(parseInt(input_de.val()));
            });

            $('.decrement').click(function(){
                var input_inc = $(this).siblings('input');
                if (parseInt(input_inc.val()) > 0) {
                    // input.val(parseInt(input.val()) - 1);
                    alert(parseInt(input_inc.val()) - 1);
                    $('#quantity').val(parseInt(input_inc.val()) - 1);
                    $('#quan').val(parseInt(input_inc.val()) - 1);
                }
            });


            $('#orderModal').on('hidden.bs.modal', function () {
                // Clear the form inputs when the modal is closed
                $('#order-form input[type="hidden"]').remove();
                $('#order-form')[0].reset();
            });
        });
    </script>
<script>
        $(document).ready(function(){
            $('.increment').click(function(){
                var input = $(this).siblings('input');
                input.val(parseInt(input.val()) + 1);
            });

            $('.decrement').click(function(){
                var input = $(this).siblings('input');
                if (parseInt(input.val()) > 0) {
                    input.val(parseInt(input.val()) - 1);
                }
            });
        });
    </script>
