<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function getSubCategories($parent_id, $process_id=null)
    {
        $categories = Category::where('parent_id', $parent_id)->where('id', '<>', $process_id)->get();
        if ($categories->count()) {
            $categories = $categories->map(function($category) use($process_id) {
                $category->sub = $this->getSubCategories($category->id, $process_id);
                return $category;
            });
        }
        return $categories;
    }
}
