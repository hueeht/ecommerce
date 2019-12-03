<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{

    public static function getNewProducts()
    {
        return Product::all()->sortByDesc('created_at');
    }

    public static function getHotProducts()
    {
        return Product::all();
    }

    public function getDetail($id)
    {
        $product = Product::findOrFail($id);
        return view('client.product.detail', compact('product'));
    }

}
