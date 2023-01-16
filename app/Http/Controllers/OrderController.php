<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function orderIndex() {
        if (auth() -> user() -> role == 'admin') {
            $orders = Order::where('status', '>', 0)->orderBy('status', 'asc')->orderBy('created_at', 'desc')->get();
        } else {
            $orders = Order::where('user_id', auth() -> user() -> id)->where('status', '>', 0)->orderBy('status', 'asc')->orderBy('created_at', 'desc')->get();
        }
        return view('user.order')->with('orders', $orders);
    }

    public function orderFinish($id) {
        $order = Order::find($id);
        $order->status = 2;
        $order->save();

        return redirect()->back()->with('success', 'Order '.$order->id. ' has been finisihed');
    }
}
