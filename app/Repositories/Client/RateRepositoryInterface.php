<?php


namespace App\Repositories\Client;

use Illuminate\Support\Facades\Request;

interface RateRepositoryInterface
{
    public function create($rate);
}