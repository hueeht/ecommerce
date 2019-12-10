<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;

class CartController extends Controller
{

    public function index(Request $request)
    {
        $carts = unserialize($request->cookie('cart'));
        if ($carts) {
            $total_price = $this->getTotalPrice($carts);
            return view('client.cart.index', ['carts' => $carts, 'total_price' => $total_price]);
        } else {
            return view('client.cart.index', ['carts' => null, 'total_price' => 0]);
        }
    }

    public function add(Request $request)
    {
        $product_id = $request->product_id;
        $product_num = $request->product_num;
        $cart = unserialize($request->cookie('cart'));
        if (isset ($cart[$product_id]) ) {
            $product_num = $product_num + $cart[$product_id]["product_num"];
        }
        $cart[$request->product_id] = $this->getProductDetail($product_id, $product_num);
        $cookie = cookie('cart', serialize($cart), config('number.time'));
        $qty = count($cart);

        return response()->json([
            'quantity' => $qty,
        ], config('number.success'))->withCookie($cookie);
    }

    public function getProductDetail($id, $num)
    {
        $product = Product::findOrFail($id);
        $image = $product->images->first()->getAttribute('image');
        $product_price = $product->price;
        if($product->price_sale <> 0){
            $product_price = $product->price_sale;
        }
        $num_price = $product_price * $num;
        $product_detail = [
            'product_id' => $id,
            'product_name' => $product->name,
            'product_price' => $product_price,
            'product_num' => $num,
            'num_price' => $num_price,
            'product_image' => $image,
        ];

        return $product_detail;
    }

    public static function getTotalPrice($carts)
    {
        $total_price = 0;
        foreach ($carts as $cart)
        {
            $total_price += $cart["num_price"];
        }

        return $total_price;
    }

    public function update(Request $request)
    {
        $product_id = $request->product_id;
        $product_num = $request->product_num;
        $cart = unserialize($request->cookie('cart'));
        $cart[$product_id]["product_num"] = $product_num;
        $cart[$product_id]["num_price"] = $product_num * $cart[$product_id]["product_price"];
        $cookie = cookie('cart', serialize($cart), config('number.time'));
        $carts = unserialize($cookie->getValue());
        $total_price = $this->getTotalPrice($carts);

        return response()->json(compact('total_price'), config('number.success'))->withCookie($cookie);
    }

    public function delete(Request $request)
    {
        $product_id = $request->product_id;
        $cart = unserialize($request->cookie('cart'));
        if ($cart[$product_id]) {
            unset($cart[$product_id]);
        }
        $cookie = cookie('cart', serialize($cart), config('number.time'));
        $carts = unserialize($cookie->getValue());
        $quantity = count($carts);
        $total_price = $this->getTotalPrice($carts);
        return response()->json(compact('quantity', 'total_price'), config('number.success'))->withCookie($cookie);
    }

    public function submit(Request $request)
    {
        $data['user_id'] = Auth::user()->id;
        $data['status'] = 'waiting';
        $carts = unserialize($request->cookie('cart'));
        $data['total_quantity'] = count($carts);
        $data['total_price'] = self::getTotalPrice($carts);
        $order = Order::create($data);
        foreach($carts as $cart)
        {
            $order->orderDetails()->create([
                'product_id' => $cart['product_id'],
                'quantity' => $cart['product_num'],
                'price' => $cart['product_price'],
            ]);
        }
        $id = $order->id;
        $cookie  = cookie('cart', null);
        return redirect()->route('home.orders.detail', $id)->withCookie($cookie);
    }

    public function checkout()
    {
        return view('client.cart.checkout');
    }
}
