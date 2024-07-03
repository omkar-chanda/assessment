<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Notification</title>
</head>
<body>
    <h2>Order Notification</h2>
    
    <p>Hello {{ $details['email'] }},</p>
    
    <p>Thank you for placing an order with us. Here are the details of your order:</p>
    
    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td>{{ $details['products']['name'] }}</td>
                    <td>1</td>
                </tr>
        </tbody>
    </table>
    
    <p>Shipping Address:</p>
    <p>{{ $details['shipping_address'] }}</p>
    <p>{{ $details['city'] }}, {{ $details['postal_code'] }}</p>
    
    <p>Thank you for shopping with us!</p>
</body>
</html>
