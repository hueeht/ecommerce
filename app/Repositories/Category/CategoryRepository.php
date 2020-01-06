<?php

namespace App\Repositories\Category;

use App\Models\Category;
use App\Repositories\EloquentRepository;

class CategoryRepository extends EloquentRepository implements CategoryRepositoryInterface
{
    /**
     * @inheritDoc
     */
    public function getModel()
    {
        return \App\Models\Category::class;
    }


    public function getSubCategories($parent_id, $ignore_id = null)
    {
        return Category::where('parent_id', $parent_id)
            ->where('id', '<>', $ignore_id)
            ->get()
            ->map(function($query) use($ignore_id){
                $query->sub = $this->getSubCategories($query->id, $ignore_id);
                return $query;
            });
    }
}
