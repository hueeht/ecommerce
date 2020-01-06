<?php

namespace App\Repositories\Order;

use App\Repositories\EloquentRepository;
use Illuminate\Support\Facades\DB;

class OrderRepository extends EloquentRepository implements OrderRepositoryInterface
{

    /**
     * @inheritDoc
     */
    public function getModel()
    {
        return \App\Models\Order::class;
    }

    public function getRevenueByMonth($year)
    {
        return DB::table('orders')
            ->selectRaw('month(updated_at) as month, sum(total_price) as revenue')
            ->where('status', '=', 'Shipped')
            ->whereRaw('year(updated_at) = ' . $year)
            ->groupBy(DB::raw('month(updated_at)'))
            ->get();
    }

    public function getQuantityNewOrder()
    {
        return DB::table('orders')
            ->where('status', '=', 'Waiting')
            ->count('*');
    }
}
