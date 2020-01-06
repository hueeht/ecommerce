<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Rate;
use App\Repositories\Client\ProductRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    protected $product;

    public function __construct(ProductRepositoryInterface $product)
    {
        $this->product = $product;
    }

    public function index()
    {
        $news = $this->product->new();
        $hots = $this->product->hot();
        $recents = $this->product->recent();
        return view('client.index', compact('hots', 'news', 'recents'));
    }


    public function detail($id)
    {
        $product = $this->product->find($id);
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $product->users()->attach($user_id);
        }

        return view('client.product.detail', compact('product'));
    }

}
