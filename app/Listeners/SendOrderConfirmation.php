<?php

namespace App\Listeners;

use App\Events\OrderSubmitted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendOrderConfirmation implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle(OrderSubmitted $event)
    {
        $order = $event->order;
        $details = [
            'subject' => 'Order Confirmation',
            'email' => $order[0]['email'],
            'shipping_address' => $order[0]['shipping_address_1'],
            'city' => $order[0]['city'],
            'postal_code' => $order[0]['zip_postal_code'],
            'products' => $order['items']
        ];

        Mail::to($order[0]['email'])->send(new \App\Mail\OrderConfirmation($details));
    }
}
