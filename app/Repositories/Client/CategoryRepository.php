<?php

namespace App\Repositories\Client;

use App\Exceptions\NotFoundException;
use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface
{
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    /**
     * @param $id
     * @return |null
     */
    public function find($id)
    {
        $category = $this->category->find($id);
        if (!$category) {
            throw new NotFoundException();
        }
        return $category;
    }

    /**
     * @param $parent_id
     * @param null $process_id
     * @return mixed
     */
    public function getSubCategories($parent_id, $process_id = null)
    {
        $categories = $this->category->where('parent_id', $parent_id)->where('id', '<>', $process_id)->get();
        if ($categories->count()) {
            $categories = $categories->map(function($category) use ($process_id) {
                $category->sub = $this->getSubCategories($category->id, $process_id);

                return $category;
            });
        }

        return $categories;
    }
}
