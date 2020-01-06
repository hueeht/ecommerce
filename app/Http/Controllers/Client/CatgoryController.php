<?php

namespace App\Http\Controllers\Client;

use App\Repositories\Client\CategoryRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CatgoryController extends Controller
{
    protected $category;

    public function __construct(CategoryRepositoryInterface $category)
    {
        $this->category = $category;
    }

    public function show($id)
    {
        $category = $this->category->find($id);
        if ($category) {
            $products = $category->products;
        } else {
            $products = null;
        }
        
        return view('client.product.products_by_category', compact('category', 'products'));
    }
}
