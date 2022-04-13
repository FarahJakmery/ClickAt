<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Fastproduct;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class FastproductController extends Controller
{
    use ApiResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $date = new Carbon;
        $fastproducts = Fastproduct::translated()->where('expiry_date', '>', $date)->get();
        return $this->apiResponse($fastproducts, 'ok', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fastproduct = Fastproduct::find($id);
        if ($fastproduct) {
            return $this->apiResponse($fastproduct, 'OK', 200);
        }
        return $this->apiResponse($fastproduct, 'The Quick Selling Product Not Found', 401);
    }

    public function showFastSellingProductBelogsToMainCategory($mcategory_id, $id)
    {
        $products_id = DB::table('fastproduct_mcategory')->where('mcategory_id', $mcategory_id)->pluck('fastproduct_id');
        $product = DB::table('fastproducts')->whereIn('id', $products_id)->find($id);
        $product_with_translate = Fastproduct::find($product->id);
        if ($product_with_translate) {
            return $this->apiResponse($product_with_translate, 'OK', 200);
        }
        return $this->apiResponse($product_with_translate, 'The Product Not Found', 401);
    }
}
