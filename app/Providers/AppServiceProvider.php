<?php

namespace App\Providers;

use App\Http\Controllers\Client\CartController;
use http\Env\Request;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Client\CategoryController;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $cat = new CategoryController();
        $categories = $cat->getSubCategories(1);
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
        View::share('carts_qty', $carts_qty);;
    }
}
