<?php

namespace App\Repositories\Order;

interface OrderRepositoryInterface
{
    public function getRevenueByMonth($year);

    public function getQuantityNewOrder();
}
