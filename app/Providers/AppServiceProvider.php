<?php

namespace App\Providers;

use App\Http\Controllers\Client\CartController;
use App\Models\Category;
use App\Models\Product;
use App\Repositories\Client\CategoryRepository;
use App\Repositories\Client\CategoryRepositoryInterface;
use App\Repositories\Client\ProductRepository;
use App\Repositories\Client\ProductRepositoryInterface;
use App\Repositories\Client\ProfileRepository;
use App\Repositories\Client\ProfileRepositoryInterface;
use App\Repositories\Client\RateRepository;
use App\Repositories\Client\RateRepositoryInterface;
use App\Repository\Client\OrderRepository;
use App\Repository\Client\OrderRepositoryInterface;
use http\Env\Request;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Client\CatgoryController;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Cookie;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            CategoryRepositoryInterface::class,
            CategoryRepository::class
        );

        $this->app->singleton(
            ProductRepositoryInterface::class,
            ProductRepository::class
        );

        $this->app->singleton(
            OrderRepositoryInterface::class,
            OrderRepository::class
        );

        $this->app->singleton(
            RateRepositoryInterface::class,
            RateRepository::class
        );

        $this->app->singleton(
            ProfileRepositoryInterface::class,
            ProfileRepository::class
        );

        $this->app->singleton(
            \App\Repositories\Order\OrderRepositoryInterface::class,
            \App\Repositories\Order\OrderRepository::class
        );

        $this->app->singleton(
            \App\Repositories\Product\ProductRepositoryInterface::class,
            \App\Repositories\Product\ProductRepository::class
        );

        $this->app->singleton(
            \App\Repositories\Suggest\SuggestRepositoryInterface::class,
            \App\Repositories\Suggest\SuggestRepository::class
        );

        $this->app->singleton(
            \App\Repositories\OrderDetail\OrderDetailRepositoryInterface::class,
            \App\Repositories\OrderDetail\OrderDetailRepository::class
        );

        $this->app->singleton(
            \App\Repositories\Rate\RateRepositoryInterface::class,
            \App\Repositories\Rate\RateRepository::class
        );

        $this->app->singleton(
            \App\Repositories\Category\CategoryRepositoryInterface::class,
            \App\Repositories\Category\CategoryRepository::class
        );

        $this->app->singleton(
            \App\Repositories\Activity\ActivityRepositoryInterface::class,
            \App\Repositories\Activity\ActivityRepository::class
        );

        $this->app->singleton(
            \App\Repositories\Image\ImageRepositoryInterface::class,
            \App\Repositories\Image\ImageRepository::class
        );

        $this->app->singleton(
            \App\Repositories\Memory\MemoryRepositoryInterface::class,
            \App\Repositories\Memory\MemoryRepository::class
        );

        $this->app->singleton(
            \App\Repositories\Permission\PermissionRepositoryInterface::class,
            \App\Repositories\Permission\PermissionRepository::class
        );

        $this->app->singleton(
            \App\Repositories\Role\RoleRepositoryInterface::class,
            \App\Repositories\Role\RoleRepository::class
        );

        $this->app->singleton(
            \App\Repositories\Trademark\TrademarkRepositoryInterface::class,
            \App\Repositories\Trademark\TrademarkRepository::class
        );

        $this->app->singleton(
            \App\Repositories\User\UserRepositoryInterface::class,
            \App\Repositories\User\UserRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        setlocale(LC_MONETARY, 'en_US.UTF-8');
        $category = new Category();
        $cat = new CategoryRepository($category);
        $categories = $cat->getSubCategories(config('number.root'));

        View::share('categories', $categories);

        $carts_qty = 0;
        if(Cookie::get('cart')){
            $carts = Crypt::decrypt(Cookie::get('cart'));
            if($carts) {
                $carts_qty = count($carts);
                $total_price = CartController::getTotalPrice($carts);
                View::share([
                    'carts' => $carts,
                    'total_price' => $total_price,
                ]);
            }
        }
        View::share('carts_qty', $carts_qty);

        $product = Product::all();
        View::share('product', $product);
    }
}
