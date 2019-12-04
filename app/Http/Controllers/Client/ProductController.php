<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{

    public function index()
    {
        $news = $this->getListProducts()->sortByDesc('created_at');
        $hots = $this->getListProducts();

        return view('client.index', compact('news', 'hots'));
    }

    public function getListProducts()
    {
        return Product::all();
    }

    public function getDetail()
    {
        return view('client.product.detail');
    }
}
