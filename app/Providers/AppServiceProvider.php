<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Codeproduct;
use App\Models\Fastproduct;
use App\Models\Mcategory;
use App\Models\Product;
use App\Models\User;
use App\Http\View\Composers\CartComposer;
use App\Models\About;
use App\Models\Feature;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        View::share('mainCategories', Mcategory::translated()->get());
        View::share('fastSellingProducts', Fastproduct::translated()->get());
        View::share('products', Product::translated()->get());
        View::share('Codes', Codeproduct::translated()->get());
        View::share('feature', Feature::translated()->get());

        // Using class based composers...
        View::composer('*', CartComposer::class);
    }
}
