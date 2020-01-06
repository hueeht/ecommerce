<?php

namespace App\Repositories\Client;

interface CategoryRepositoryInterface
{
    public function find($id);
    public function  getSubCategories($parent_id, $process_id = null);
}
