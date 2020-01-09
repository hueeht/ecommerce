<?php


namespace App\Repositories\Client;


use App\Models\Rate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class RateRepository implements RateRepositoryInterface
{
    protected $rate;

    public function __construct(Rate $rate)
    {
        $this->rate = $rate;
    }

    public function create($rate)
    {
        $this->rate->create($rate);
    }
}