<?php

namespace App\Repository\Client;

interface OrderRepositoryInterface
{
    public function find($id);
    public function list();
    public function detail();
    public function cancel();
}