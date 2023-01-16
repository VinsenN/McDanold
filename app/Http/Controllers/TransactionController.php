<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function addCart(Request $request, $id)
    {
        $validated = $request->validate([
            "size" => "required",
            "quantity" => "required|integer",
        ]);

        $order = Order::where('user_id', auth()->user()->id)->where('status', 0)->first();

        if ($order == null) {
            $order = new Order();
            $order->user_id = auth()->user()->id;
            $order->status = 0;
            $order->save();
        }

        $order_details = OrderDetail::where('order_id', $order->id)->where('menu_id', $id)->where('size', $validated['size'])->first();

        if ($order_details == null) {
            $order_details = new OrderDetail();
            $order_details->order_id = $order->id;
            $order_details->menu_id = $id;
            $order_details->size = $validated['size'];
            $order_details->quantity = 0;
        }
        $order_details->quantity += $validated['quantity'];
        $order_details->save();

        return redirect()->back()->with('success', 'Menu has been successfully added to cart');
    }
}
