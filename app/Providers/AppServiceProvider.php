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
        $mainCategories = Mcategory::with('fastproducts')->get();
        $res = [];
        foreach ($mainCategories as $mainCategory) {
            foreach ($mainCategory->fastproducts as $fastproduct) {
                $d1 = strtotime($fastproduct->product_date);
                $d2 = strtotime($fastproduct->expiry_date);
                $totalSecondsDiff = abs($d2 - $d1);
                $totalHoursDiff   = $totalSecondsDiff / 60 / 60;
                // dd($totalHoursDiff);
                $minutes = $fastproduct->minutes;
                $hour = $minutes / 60;
                $count = $fastproduct->max_price - $fastproduct->min_price;
                $one_item = $count * $hour;
                $total_for_one_item = $one_item / $totalHoursDiff;
                $secound = $minutes * 60;
                $final  = array('total_for_one_item' => $total_for_one_item, 'hour' => $hour, 'totalHoursDiff' => $totalHoursDiff, 'secound' => $secound);
                array_push($res, $final);
            }
        }
        View::share('res', $res);
        View::share('mainCategories', Mcategory::translated()->get());
        View::share('fastSellingProducts', Fastproduct::translated()->where('status_for_show', '=', 1)->get());
        View::share('products', Product::translated()->get());
        View::share('Codes', Codeproduct::translated()->get());
        View::share('feature', Feature::translated()->first());

        // Using class based composers...
        View::composer([
            'User.Auth.edit_user_info',
            'User.Auth.home',
            'User.Auth.login',
            'User.Cart.cart',
            'User.Checkout.Checkout',
            'User.Code.codes',
            'User.Contact.contact',
            'User.FastProducts.fastProduct',
            'User.MainCategory.fast_product_of_main_category',
            'User.MainCategory.products_of_main_category',
            'User.Order.orders',
            'User.pages.about',
            'User.Products.products',
            'User.Search.searchResults',
            'User.Wishlist.wishlist',
            'weblayouts.footer',
            'weblayouts.footer-scripts',
            'weblayouts.head',
            'weblayouts.header',
            'weblayouts.master',
            'weblayouts.preloader',
        ], CartComposer::class);
    }
}
