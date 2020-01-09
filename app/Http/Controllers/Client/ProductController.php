<?php

namespace App\Http\Controllers\Client;

use App\Exceptions\NotFoundException;
use App\Http\Controllers\Controller;
use App\Repositories\Client\ProductRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    protected $product_repository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->product_repository = $productRepository;
    }

    public function index()
    {
        $products = $this->product_repository->show();
        $news = $products['news'];
        $hots = $products['rates'];
        $recents = $this->product_repository->recent();

        return view('client.index', compact('hots', 'news', 'recents'));
    }


    public function detail($id)
    {
        try {
            $product = $this->product_repository->find($id);
        } catch (NotFoundException $exception) {
            throw $exception;
        }
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $product->users()->attach($user_id);
        }

        return view('client.product.detail', compact('product'));
    }

}
