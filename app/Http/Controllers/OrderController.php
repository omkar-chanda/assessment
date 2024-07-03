<?php

namespace App\Http\Controllers;

use App\Events\OrderSubmitted;
use App\Models\Orders;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Product;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function submitOrder(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'shipping_address_1' => 'required|string',
            'city' => 'required|string',
            'country_code' => 'required|string',
            'zip_postal_code' => 'required'
        ]);
        
        $order = Orders::create($request->only(
            'email', 'shipping_address_1', 'shipping_address_2', 'shipping_address_3', 
            'city', 'country_code', 'zip_postal_code'
        ));

        $getProducts = Product::find($request->product_id);
        $order = [$order, 'items' => $getProducts];
        OrderItem::create([
            'order_id' => $order[0]->id,
            'product_id' => $request->product_id,
            'quantity' => $request->quan,
        ]);
        
        // Dispatch event
        event(new OrderSubmitted($order));
        return redirect()->back()->with('success', 'Order submitted successfully');
    }
}
