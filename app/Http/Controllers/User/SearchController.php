<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Codeproduct;
use App\Models\Fastproduct;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\FastproductMcategory;
use App\Models\Mcategory;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        if ($request->searchWord !== null && $request->mainCategoryId == "null") {

            $fastProducts = Fastproduct::whereTranslationLike('name', "%$request->searchWord%")->get();
            $products = Product::whereTranslationLike('product_name', "%$request->searchWord%")->get();
            $codes = Codeproduct::whereTranslationLike('codeproduct_name', "%$request->searchWord%")->get();
            return view('User.Search.searchResults', compact('fastProducts', 'products', 'codes'));
        }
        //
        elseif ($request->searchWord == null && $request->mainCategoryId !== "null") {

            $fastproductfcategory = FastproductMcategory::where('mcategory_id', $request->mainCategoryId)->get();
            $fastProducts = [];
            $res = [];

            foreach ($fastproductfcategory as $fastproductfcategories) {
                $b = Fastproduct::where('id', $fastproductfcategories->fastproduct_id)->first();
                array_push($fastProducts, $b);

                $d1 = strtotime($b->product_date);
                $d2 = strtotime($b->expiry_date);
                $totalSecondsDiff = abs($d2 - $d1);

                $totalHoursDiff   = $totalSecondsDiff / 60 / 60;
                // dd($totalHoursDiff);
                $minutes = $b->minutes;
                $hour = $minutes / 60;
                $count = $b->max_price - $b->min_price;
                $one_item = $count * $hour;
                $total_for_one_item = $one_item / $totalHoursDiff;
                $secound = $minutes * 60;
                $final  = array('total_for_one_item' => $total_for_one_item, 'hour' => $hour, 'totalHoursDiff' => $totalHoursDiff, 'secound' => $secound);
                array_push($res, $final);
            }

            $products = Product::whereHas('maincategories', function ($query) use ($request) {
                $query->where('id', $request->mainCategoryId);
            })->get();

            return view('User.Search.searchResults', compact('fastProducts', 'products'));
        }
        //
        elseif ($request->searchWord !== null && $request->mainCategoryId !== "null") {

            $fastproductfcategory = FastproductMcategory::where('mcategory_id', $request->mainCategoryId)->get();
            $fastProducts = [];
            $res = [];
            foreach ($fastproductfcategory as $fastproductfcategories) {
                if (Fastproduct::where('id', $fastproductfcategories->fastproduct_id)->whereTranslationLike('name', "%$request->searchWord%")->exists()) {
                    $b = Fastproduct::where('id', $fastproductfcategories->fastproduct_id)->whereTranslationLike('name', "%$request->searchWord%")->first();
                    array_push($fastProducts, $b);

                    $d1 = strtotime($b->product_date);
                    $d2 = strtotime($b->expiry_date);
                    $totalSecondsDiff = abs($d2 - $d1);

                    $totalHoursDiff   = $totalSecondsDiff / 60 / 60;
                    // dd($totalHoursDiff);
                    $minutes = $b->minutes;
                    $hour = $minutes / 60;
                    $count = $b->max_price - $b->min_price;
                    $one_item = $count * $hour;
                    $total_for_one_item = $one_item / $totalHoursDiff;
                    $secound = $minutes * 60;
                    $final  = array('total_for_one_item' => $total_for_one_item, 'hour' => $hour, 'totalHoursDiff' => $totalHoursDiff, 'secound' => $secound);
                    array_push($res, $final);
                } else {
                    $fastProducts = [];
                }
            }

            $products = Product::whereTranslationLike('product_name', "%$request->searchWord%")->whereHas('maincategories', function ($query) use ($request) {
                $query->where('id', $request->mainCategoryId);
            })->get();
            return view('User.Search.searchResults', compact('fastProducts', 'products'));
        }
        //
        elseif ($request->searchWord == null && $request->mainCategoryId == "null") {

            return redirect('/home');
        }
    }
}
