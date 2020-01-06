<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Suggest;
use App\Repositories\OrderDetail\OrderDetailRepository;
use App\Repositories\OrderDetail\OrderDetailRepositoryInterface;
use App\Repositories\Order\OrderRepositoryInterface;
use App\Repositories\Rate\RateRepositoryInterface;
use App\Repositories\Suggest\SuggestRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\DB;
use function Sodium\add;

class AdminController extends Controller
{
    protected $orderRepository;
    protected $order_detailRepository;
    protected $suggestRepository;
    protected $rateRepository;

    public function __construct(OrderRepositoryInterface $orderRepository,
                                SuggestRepositoryInterface $suggestRepository,
                                OrderDetailRepositoryInterface $order_detailRepository,
                                RateRepositoryInterface $rateRepository)
    {
        $this->orderRepository = $orderRepository;
        $this->suggestRepository = $suggestRepository;
        $this->order_detailRepository = $order_detailRepository;
        $this->rateRepository = $rateRepository;
    }

    public function index()
    {
        $monthArr = [];
        $revenueArr = [];
        $productArr = [];
        $numArr = [];
        $yearArr = [];

        $years = DB::table('orders')
            ->selectRaw('distinct year(updated_at) as year')
            ->orderByRaw('year(updated_at) desc')
            ->get();

        foreach ( $years as $year)
        {
            $dataMonth = [];
            $dataRevenue = [];
            $dataBars = $this->orderRepository->getRevenueByMonth($year->year);
            foreach ($dataBars as $dataBar)
            {
                $dataMonth[] = $dataBar->month;
                $dataRevenue[] = $dataBar->revenue;

            }
            array_push($monthArr, $dataMonth);
            array_push($revenueArr, $dataRevenue);
            array_push($yearArr, $year->year);
        }

        $dataPies = $this->order_detailRepository->getOrderByProduct();

        $numSuggest = $this->suggestRepository->getQuantitySuggest();

        $numOrder = $this->orderRepository->getQuantityNewOrder();

        $numRate = $this->rateRepository->getQuantityRate();

        foreach ($dataPies as $dataPie)
        {
            array_push($productArr, $dataPie->product);
            array_push($numArr, $dataPie->num);
        }
        $orderYear = $this->orderYear($yearArr);
        return view('admin.index', [
            'months' => $monthArr,
            'revenues' => $revenueArr,
            'product' => $productArr,
            'num' => $numArr,
            'suggest' => $numSuggest,
            'order' => $numOrder,
            'rate' => $numRate,
            'years' => $years,
            'yearArr' => $yearArr,
            'orderYear' => $orderYear,
        ]);

    }

    public function orderYear($yearArr)
    {
        foreach ($yearArr as $year)
        {
            for ($i = 1; $i <= 12; $i++)
            {
                $orderYear[$year][] = Order::whereYear('created_at', $year)->whereMonth('created_at', $i)->count();
            }
        }
        return $orderYear;
    }
}
