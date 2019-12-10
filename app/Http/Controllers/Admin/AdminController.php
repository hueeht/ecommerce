<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Suggest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $monthArr = [];
        $revenueArr = [];
        $productArr = [];
        $numArr = [];
        $dataBars = DB::table('orders')
            ->selectRaw('month(updated_at) as month, sum(total_price) as revenue')
            ->where('status', '=', 'Shipped')
            ->groupBy(DB::raw('month(updated_at)'))
            ->get();

        $dataPies = DB::table('order_details')
            ->selectRaw('products.name as product, count(order_details.id) as num')
            ->join('products', 'order_details.product_id','=', 'products.id')
            ->groupBy(DB::raw('order_details.product_id'))
            ->get();

        $suggest = DB::table('suggests')
            ->where('status','=', 'Waiting')
            ->count('*');

        $order = DB::table('orders')
            ->where('status', '=', 'Waiting')
            ->count('*');
        foreach ($dataBars as $dataBar)
        {
            array_push($monthArr, $dataBar->month);
            array_push($revenueArr, $dataBar->revenue);
        }

        foreach ($dataPies as $dataPie)
        {
            array_push($productArr, $dataPie->product);
            array_push($numArr, $dataPie->num);
        }

        return view('admin.index', [
            'month' => $monthArr,
            'revenue' => $revenueArr,
            'product' => $productArr,
            'num' => $numArr,
            'suggest' => $suggest,
            'order' => $order,
        ]);
    }

}
