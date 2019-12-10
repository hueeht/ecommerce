<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Image;
use App\Models\Memory;
use App\Models\Product;
use App\Models\Trademark;
use DemeterChain\C;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Symfony\Component\Console\Input\Input;

class ProductController extends Controller
{
    private $name;
    private $price;
    private $price_sale;
    private $images;
    private $memory;
    private $category;
    private $trademark;
    private $description;
    private $products;
    protected $arr;
    private $arr_img;
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $this->arr = [];
        $this->products = DB::table('products')
            ->select('products.id as id', 'products.name as name', 'products.price as price', 'products.price_sale as price_sale',
                'products.quantity as quantity',/*'images.image as image',*/ 'memories.name as memory', 'trademarks.name as trademark',
                'categories.name as category', 'products.description as description')
            //->join('images', 'products.id', '=', 'images.product_id')
            ->join('memories', 'products.memory_id', '=', 'memories.id')
            ->join('trademarks', 'products.trademark_id', '=', 'trademarks.id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->get();
        $this->images = Product::with('images')->get();
        foreach ($this->images as $image)
        {
            array_push($this->arr,$image->images()->first());
        }
        return view('admin.products.index',[
            'products' => $this->products,
            'images' => $this->arr,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        $this->category = Category::all();
        $this->memory = Memory::all();
        $this->trademark = Trademark::all();
        return view('admin.products.create',[
            'categories' => $this->category,
            'memories' => $this->memory,
            'trademarks' => $this->trademark,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductRequest $request
     * @return RedirectResponse
     */
    public function store(ProductRequest $request)
    {
        $product = Product::create($request->all());
        $image = new Image();
        $image->image = $request->image;
        $this->products = Product::all()->last();
        $image->product_id = $this->products->id;
        $image->save();
        return redirect()->route('admin.products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Factory|View
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $memories = Memory::all();
        $trademarks = Trademark::all();
        $category = Category::findOrFail($product->category_id);
        $categories = $this->getSubCategories(0, config('admin.max_category'));
        return view('admin.products.edit',[
            'product' => $product,
            'trademarks' => $trademarks,
            'memories' => $memories,
            'categories' => $categories,
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProductRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(ProductRequest $request, $id)
    {
        $product = Product::find($id);
        $images = Image::where('product_id', $product->id)
            ->update(['image' => $request->image]);
        $product->update($request->all());
        return redirect()->route('admin.products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $images = Image::where('product_id', $product->id)
            ->delete();
        $product->delete();
        return redirect()->route('admin.products.index');
    }
    private function getSubCategories($parent_id, $ignore_id=null)
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
