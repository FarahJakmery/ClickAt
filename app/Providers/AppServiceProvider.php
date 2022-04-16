<?php

namespace App\Providers;

use App\Models\Codeproduct;
use App\Models\Fastproduct;
use App\Models\Mcategory;
use App\Models\Product;
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
        View::share('productsWithCodes', Codeproduct::translated()->get());
    }
}
