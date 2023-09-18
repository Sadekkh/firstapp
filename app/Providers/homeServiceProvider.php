<?php

namespace App\Providers;

use App\Models\brands;
use App\Models\carts;
use Illuminate\Support\ServiceProvider;
use App\Models\categories;
use App\Models\settings;
use App\Models\wishlist;
use Illuminate\Http\Request;


class homeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {

        view()->composer('layouts.main', function ($view,) {
            $request = app('request');
            $categories = categories::with('childCategories')->whereNull('parent_id')->get();
            $settings = settings::all();
            $brand = brands::all();
            $sessionCartId = $request->session()->get('yfbstore_cart_session_id');
            $cart = carts::with('product.image')->where('session_id', $sessionCartId)->where('state', 1)->get();
            $wish = wishlist::with('product.image')->where('session_id', $sessionCartId)->get();

            $view->with(compact('categories', 'settings', 'brand', 'cart', 'wish'));
        });
    }
}
