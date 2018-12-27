<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class OrderController extends Controller {

    //TODO: serialization to model not here!
    public function getOrders() {
        $orders = Order::all();
          // unserialzie serialized cart
          $orders->transform(function($order, $key) {
            $order->cart = unserialize($order->cart);
            return $order;
        });

        return view('order.index')->with('orders', $orders);
    }
}
