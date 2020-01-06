<?php

namespace App\Repositories\Client;

use App\Models\Product;
use App\Models\Rate;
use Illuminate\Support\Facades\Auth;

class ProductRepository implements ProductRepositoryInterface
{
    /**
     * @var Product
     */
    protected $product;
    protected $rate;

    public function __construct(Product $product, Rate $rate)
    {
        $this->product = $product;
        $this->rate = $rate;
    }


    public function find($id)
    {
        try {
            $product = $this->product->findOrFail($id);
        } catch (\Exception $exception) {
            return null;
        }
        return $product;
    }

    public function new()
    {
        $product = Product::all()->sortByDesc('created_at');
        return $product;
    }

    public function hot()
    {
        $rate = $this->rate->get()->sortByDesc('rating');
        foreach ($rate as $r) {
            $products[] = Product::where('id',$r->product_id)->get();
        }
        return $products;
    }


    public function recent()
    {
        if (Auth::check()) {
            $products = Auth::user()->products()->latest()->take(4)->get();

            return $products;
        } else return null;
    }

    public function checkAuth()
    {
        if (Auth::check()) {
            return Auth::user()->all();
        } else return null;
    }
}