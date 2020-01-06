<?php

namespace App\Repositories\Activity;

use App\Repositories\EloquentRepository;
use App\Repositories\Image\ImageRepositoryInterface;

class ActivityRepository extends EloquentRepository implements ActivityRepositoryInterface
{

    /**
     * @inheritDoc
     */
    public function getModel()
    {
        return \App\Models\Activity::class;
    }
}
