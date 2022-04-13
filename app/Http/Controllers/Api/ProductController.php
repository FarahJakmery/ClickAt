<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResourse;
use App\Models\Mcategory;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    use ApiResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::get();
        return $this->apiResponse($products, 'ok', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        if ($product) {
            return $this->apiResponse($product, 'OK', 200);
        }
        return $this->apiResponse($product, 'The Product Not Found', 401);
    }

    public function showProductBelogsToMainCategory($mcategory_id, $id)
    {
        $products_id = DB::table('mcategory_product')->where('mcategory_id', $mcategory_id)->pluck('product_id');
        $product = DB::table('products')->whereIn('id', $products_id)->find($id);
        $product_with_translate = Product::translated()->find($product->id);
        if ($product_with_translate) {
            return $this->apiResponse($product_with_translate, 'OK', 200);
        }
        return $this->apiResponse($product_with_translate, 'The Product Not Found', 401);
    }
}
