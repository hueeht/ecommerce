<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Image;

class ProductController extends Controller
{

    protected $products;
    protected $images;

    public function __construct()
    {
        $this->products = new Product();
        $this->images = new Image();
    }

    public function getList()
    {
        $this->products = Product::all();
        return view('client.index', compact('products'));
    }

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

    public function getProductNum($id)
    {
        $this->product->findOrFail($id);
        $product_num = $this->product->quantity;
        return $product_num;
    }

}
