<?php

namespace App\Http\Controllers\Client;

use App\Exceptions\NotFoundException;
use App\Repositories\Client\CategoryRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CatgoryController extends Controller
{
    protected $category_repository;

    public function __construct(CategoryRepositoryInterface $category)
    {
        $this->category_repository = $category;
    }

    public function show($id)
    {
        try {
            $category = $this->category_repository->find($id);
        } catch (NotFoundException $exception) {
            throw $exception;
        }
        $products = $category->products;
        
        return view('client.product.products_by_category', compact('category', 'products'));
    }
}
