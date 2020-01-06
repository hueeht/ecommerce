<?php

namespace App\Repositories\Trademark;

use App\Repositories\EloquentRepository;

class TrademarkRepository extends EloquentRepository implements TrademarkRepositoryInterface
{

    /**
     * @inheritDoc
     */
    public function getModel()
    {
        return \App\Models\Trademark::class;
    }
}
