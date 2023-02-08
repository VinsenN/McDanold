<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function orderIndex(Request $request)
    {
        $status = 0;
        if (request('filter')) {
            if (request('filter') == 'all') {
                $status = 0;
            } elseif (request('filter') == 'pending') {
                $status = 1;
            } else {
                $status = 2;
            }
        }

        if ($status == 0) {
            if (auth()->user()->role == 'admin') {
                $orders = Order::where('status', '>', 0)->orderBy('status', 'asc')->orderBy('created_at', 'desc')->get();
            } else {
                $orders = Order::where('user_id', auth()->user()->id)->where('status', '>', 0)->orderBy('status', 'asc')->orderBy('created_at', 'desc')->get();
            }
        } else {
            if (auth()->user()->role == 'admin') {
                $orders = Order::where('status', '=', $status)->orderBy('status', 'asc')->orderBy('created_at', 'desc')->get();
            } else {
                $orders = Order::where('user_id', auth()->user()->id)->where('status', '=', $status)->orderBy('status', 'asc')->orderBy('created_at', 'desc')->get();
            }
        }
        return view('user.order')->with('orders', $orders)->with('status', $status);
    }

    public function orderFinish($id)
    {
        $order = Order::find($id);
        $order->status = 2;
        $order->save();

        return redirect()->back()->with('success', 'Order ' . $order->id . ' has been finisihed');
    }
}
