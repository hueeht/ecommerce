<?php

namespace App\Repositories\Memory;

use App\Repositories\EloquentRepository;

class MemoryRepository extends EloquentRepository implements MemoryRepositoryInterface
{

    /**
     * @inheritDoc
     */
    public function getModel()
    {
        return \App\Models\Memory::class;
    }
}
