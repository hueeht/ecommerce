<?php

namespace App\Http\Controllers\Client;

use App\Exceptions\NotFoundException;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Rate;
use App\Repositories\Client\ProductRepositoryInterface;
use App\Repositories\Client\RateRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RateController extends Controller
{
    protected $rate_repository;
    protected $product_repository;

    public function __construct(RateRepositoryInterface $rateRepository, ProductRepositoryInterface $productRepository)
    {
        $this->rate_repository = $rateRepository;
        $this->product_repository = $productRepository;
    }

    public function index($id)
    {
        try {
            $product = $this->product_repository->find($id);
        } catch (NotFoundException $exception) {
            throw $exception;
        }
        return view('client.rate.index', compact('product'));
    }

    public function submit(Request $request, $id)
    {
        $rate = [];
        $rate['rating'] = $request->rateOption;
        $rate['user_id'] = Auth::user()->id;
        $rate['product_id'] = $id;
        $rate['status'] = "Pending";
        $this->rate_repository->create($rate);

        return redirect()->route('home.products.detail', $id)->with('success', 'Thanks for your review.');
    }
}
