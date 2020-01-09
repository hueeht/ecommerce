<?php

namespace App\Repositories\Client;

use App\Exceptions\NotFoundException;
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
        $product = $this->product->find($id);
        if (!$product) {
            throw new NotFoundException();
        }

        return $product;
    }

    public function show()
    {
        $products = Product::with(['rates', 'images'])->get();
        $news = $products->sortByDesc('created_at');
        foreach ($products as $product)
        {
            $rate = $product->rates->avg('rating');
            if ($rate) {
                $rates[] = [
                    'rate' => $rate,
                    'product' => $product,
                ];
            }
        }
        arsort($rates);

        return compact('rates', 'news');
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
        } else
            return null;
    }

}