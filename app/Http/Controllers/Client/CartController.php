<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Cookie;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $carts = unserialize($request->cookie('cart'));
        return view('client.cart.index', ['carts' => $carts]);
    }

    public function addToCart(Request $request)
    {
        $product_id = $request->product_id;
        $product_num = $request->product_num;
        $cart = unserialize($request->cookie('cart'));
        if ($cart[$product_id]) {

        } else {
            $product = Product::findOrFail($product_id);
            $product_detail = [
                'product_id' => $product_id,
                'product_name' => $product->name,
                'product_price' => $product->price_sale,
                'product_num' => $product_num,
            ];
            $cart[$request->product_id] = $product_detail;
            $cookie = cookie('cart', serialize($cart), 120);
        }

        $qty = count($cart);
        return response()->json([
            'quantity' => $qty
        ],200)->withCookie($cookie);
    }

    public function show(Request $request)
    {
        $carts = unserialize($request->cookie('cart'));
        return response()->json($carts);
    }
}
