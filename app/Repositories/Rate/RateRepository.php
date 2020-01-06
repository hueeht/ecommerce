<?php

namespace App\Repositories\Rate;

use App\Repositories\EloquentRepository;
use Illuminate\Support\Facades\DB;

class RateRepository extends EloquentRepository implements RateRepositoryInterface
{

    /**
     * @inheritDoc
     */
    public function getModel()
    {
        return \App\Models\Rate::class;
    }

    public function getQuantityRate()
    {
        return DB::table('rates')
            ->where('status', '=', 'Pending')
            ->count('*');

    }
}
