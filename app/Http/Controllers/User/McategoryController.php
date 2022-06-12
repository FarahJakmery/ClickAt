<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Mcategory;
use Illuminate\Http\Request;
use App\Models\FastproductMcategory;
use App\Models\Fastproduct;
use App\Models\Product;

class McategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mainCategories = Mcategory::translated()->get();
        return view('weblayouts.header', $mainCategories);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showAllFastSellingProductsBelogsToMainCategory($id)
    {
        $MainCategory = Mcategory::with('fastproducts')->find($id);
        $fast = FastproductMcategory::where('mcategory_id', $id)->get();
        $Fast_Products_To_Show = [];
        foreach ($fast as $fast_id) {
            array_push($Fast_Products_To_Show, $fast_id->fastproduct_id);
        }
        $res12 = Fastproduct::whereIn('id', $Fast_Products_To_Show)->where('status_for_show', 1)->paginate(2);

        $res = [];
        foreach ($MainCategory->fastproducts as $fastproduct) {
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

        return view('User.MainCategory.fast_product_of_main_category', compact('MainCategory', 'res', 'res12'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showAllProductsBelogsToMainCategory($id)
    {
        $products = Product::whereHas('maincategories', function ($query) use ($id) {
            $query->where('id', $id);
        })->paginate(2);
        return view('User.MainCategory.products_of_main_category', compact('products'));
    }
}
