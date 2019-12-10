<?php

namespace App\Http\Controllers\Client;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Http\Controllers\Client\ProductController;

class OrderController extends Controller
{
    public function success(Request $request)
    {
        return view('client.order.success');
    }

    public function list(Request $request)
    {
        $user = Auth::user()->id;
        $orders = Order::all()->where('user_id', $user);
        return view('client.order.list', compact('orders'));
    }

    public function detail($id)
    {
        $order = Order::findOrFail($id);
        $details = $order->orderDetails;
        foreach ($details as $detail) {
            $detail['product_name'] = Product::findOrFail($detail->product_id)->name;
            $detail['num_price'] = $detail->price * $detail->quantity;
        }
        return view('client.order.detail', compact('details', 'order'));
    }

    public function cancel($id)
    {
        $order = Order::findOrFail($id);
        $order->status = 'canceled';
        $order->update();
        return redirect()->route('home.orders.detail', $id);
    }

}
