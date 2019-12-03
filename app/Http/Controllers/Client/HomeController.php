<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Client\ProductController;
use Illuminate\Http\Request;
use App\Models\Product;


class HomeController extends Controller
{
    public function index()
    {
        $news = ProductController::getNewProducts();
        $hots = ProductController::getHotProducts();

        return view('client.index', compact('hots', 'news'));
    }
}
