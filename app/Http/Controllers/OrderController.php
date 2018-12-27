<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class OrderController extends Controller {
    public function getOrders() {
        $orders = Order::all();
        return view('order.index')->with('orders', $orders);
    }
}
