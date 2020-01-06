<?php

namespace App\Repositories\Product;

use App\Repositories\EloquentRepository;
use Illuminate\Support\Facades\DB;

class ProductRepository extends EloquentRepository implements ProductRepositoryInterface
{

    /**
     * @inheritDoc
     */
    public function getModel()
    {
        return \App\Models\Product::class;
    }

    public function getListProduct()
    {
        return DB::table('products')
            ->select('products.id as id', 'products.name as name', 'products.price as price', 'products.price_sale as price_sale',
                'products.quantity as quantity',/*'images.image as image',*/ 'memories.name as memory', 'trademarks.name as trademark',
                'categories.name as category', 'products.description as description')
            ->join('memories', 'products.memory_id', '=', 'memories.id')
            ->join('trademarks', 'products.trademark_id', '=', 'trademarks.id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->get();
    }
}
