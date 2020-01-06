<?php

namespace App\Repositories\Role;

use App\Repositories\EloquentRepository;

class RoleRepository extends EloquentRepository implements RoleRepositoryInterface
{

    /**
     * @inheritDoc
     */
    public function getModel()
    {
        return \App\Models\Role::class;
    }
}
