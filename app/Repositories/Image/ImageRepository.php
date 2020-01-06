<?php

namespace App\Repositories\Image;

use App\Repositories\EloquentRepository;

class ImageRepository extends EloquentRepository implements ImageRepositoryInterface
{

    /**
     * @inheritDoc
     */
    public function getModel()
    {
        return \App\Models\Image::class;
    }
}
