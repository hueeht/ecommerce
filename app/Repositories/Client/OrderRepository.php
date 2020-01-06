<?php

namespace App\Repository\Client;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderRepository implements OrderRepositoryInterface
{

    /**
     * @var Order
     */
    protected $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function find($id)
    {
        try {
            $order = $this->order->findOrFail($id);
        } catch (\Exception e){

    }
    }

    public function list()
    {
        $user = Auth::user()->id;
        $orders = $this->order->get()->where('user_id', $user);

        return view('client.order.list', compact('orders'));
    }

    public function detail()
    {
        // TODO: Implement detail() method.
    }

    public function cancel()
    {
        // TODO: Implement cancel() method.
    }
}