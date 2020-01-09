<?php

namespace App\Repository\Client;

use App\Exceptions\NotFoundException;
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
        $order = $this->order->find($id);
        if (!$order) {
            throw new NotFoundException();
        }

        return $order;
    }

    public function list()
    {
        $user = Auth::user()->id;
        $orders = $this->order->where('user_id', $user)->get();

        return $orders;
    }

    public function cancel($id)
    {
        $order = $this->find($id);
        $order->status = 'Canceled';
        $order->update();
    }

    public function create($order)
    {
        return $this->order->create($order);
    }
}