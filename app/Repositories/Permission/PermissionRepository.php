<?php

namespace App\Repositories\Permission;

use App\Repositories\EloquentRepository;

class PermissionRepository extends  EloquentRepository implements PermissionRepositoryInterface
{

    /**
     * @inheritDoc
     */
    public function getModel()
    {
        return \App\Models\Permission::class;
    }
}
