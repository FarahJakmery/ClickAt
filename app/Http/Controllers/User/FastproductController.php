<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Fastproduct;
use App\Models\Mcategory;
use App\Models\FastproductMcategory;
use Illuminate\Http\Request;

class FastproductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mainCategories = Mcategory::with('fastproducts')->get();
        $x = [];

        foreach ($mainCategories as $mainCategory) {
            $FastProducts_ids = FastproductMcategory::where('mcategory_id', $mainCategory->id)->get();
            $Fast_Products_To_Show = [];
            foreach ($FastProducts_ids as $FastProducts_id) {
                array_push($Fast_Products_To_Show, $FastProducts_id->fastproduct_id);
            }
            array_push($x, $Fast_Products_To_Show);
        }


        /*--------------------------------------*/
        $i = 0;
        $res12 = [];
        foreach ($mainCategories as $mainCategory) {
            if (FastproductMcategory::where('mcategory_id', $mainCategory->id)->exists()) {
                $FastProduct_Object_for_me = Fastproduct::whereIn('id', $x[$i])->where('status_for_show', 1)->paginate(2);
            } else {
                $FastProduct_Object_for_me = null;
            }
            array_push($res12, $FastProduct_Object_for_me);
            $i++;
        }
        // dd($res12[2]->total());


        $res = [];
        $cat = [];

        foreach ($mainCategories as $mainCategory) {
            if (FastproductMcategory::where('mcategory_id', $mainCategory->id)->exists()) {
                $fast_category = FastproductMcategory::where('mcategory_id', $mainCategory->id)->paginate(2);
            } else {
                $fast_category = null;
            }

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
            array_push($cat, $fast_category);
        }

        return view('User.FastProducts.fastProduct', compact('mainCategories', 'res', 'cat', 'x', 'res12'));
    }
}
