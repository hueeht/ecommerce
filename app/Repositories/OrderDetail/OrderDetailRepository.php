<?php

namespace App\Repositories\OrderDetail;

use App\Repositories\EloquentRepository;
use Illuminate\Support\Facades\DB;

class OrderDetailRepository extends EloquentRepository implements OrderDetailRepositoryInterface
{

    /**
     * @inheritDoc
     */
    public function getModel()
    {
        return \App\Models\OrderDetail::class;
    }

    public function getOrderByProduct()
    {
        return DB::table('order_details')
            ->selectRaw('products.name as product, count(order_details.id) as num')
            ->join('products', 'order_details.product_id','=', 'products.id')
            ->groupBy(DB::raw('order_details.product_id'))
            ->take(5)
            ->get();
    }
}
