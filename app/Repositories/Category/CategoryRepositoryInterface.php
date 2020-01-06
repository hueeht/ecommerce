<?php

namespace App\Repositories\Category;

interface CategoryRepositoryInterface
{
    public function getSubCategories($parent_id, $ignore_id=null);
}
