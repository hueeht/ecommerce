<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Image;
use App\Models\Memory;
use App\Models\Product;
use App\Models\Trademark;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Memory\MemoryRepositoryInterface;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\Trademark\TrademarkRepositoryInterface;
use DemeterChain\C;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use League\Flysystem\Config;
use Symfony\Component\Console\Input\Input;
use Symfony\Component\VarDumper\Caster\ImgStub;

class ProductController extends Controller
{

    protected $productRepository;
    protected $categoryRepository;
    protected $memoryRepository;
    protected $trademarkRepository;


    public function __construct(ProductRepositoryInterface $productRepository,
                                CategoryRepositoryInterface $categoryRepository,
                                MemoryRepositoryInterface $memoryRepository,
                                TrademarkRepositoryInterface $trademarkRepository
    ){
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->memoryRepository = $memoryRepository;
        $this->trademarkRepository = $trademarkRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $products = $this->productRepository->getListProduct();
        $images = Image::all();
        return view('admin.products.index',[
            'products' => $products,
            'images' => $images,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        $category = $this->categoryRepository->getAll();
        $memory = $this->memoryRepository->getAll();
        $trademark = $this->trademarkRepository->getAll();
        return view('admin.products.create',[
            'categories' => $category,
            'memories' => $memory,
            'trademarks' => $trademark,
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
        $this->productRepository->create($request->all());
        $image = new Image();
        if ($request->image == null)
        {
            $image->image = Config('admin.default_image');
        }
        else
        {
            $image->image = $request->image;
        }

        $product = Product::all()->last();
        $image->product_id = $product->id;
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
        $product = $this->productRepository->find($id);
        $memories = $this->memoryRepository->getAll();
        $trademarks = $this->trademarkRepository->getAll();
        $category = $this->categoryRepository->find($product->category_id);
        $categories = $this->categoryRepository->getSubCategories(0, config('admin.max_category'));
        $images = DB::table('images')->where('product_id', '=', $product->id)->get();
        return view('admin.products.edit',[
            'product' => $product,
            'trademarks' => $trademarks,
            'memories' => $memories,
            'categories' => $categories,
            'category' => $category,
            'images' => $images,
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
        $product = $this->productRepository->find($id);
        if ($request->image = null)
        {
            Image::where('product_id', $product->id)
                ->update(['image' => $request->image]);
        }
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
        $product = $this->productRepository->find($id);
        Image::where('product_id', $product->id)
            ->delete();
        $this->productRepository->delete($id);
        return redirect()->route('admin.products.index');
    }
}
