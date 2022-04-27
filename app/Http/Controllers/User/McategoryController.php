<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Mcategory;
use Illuminate\Http\Request;

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
        return view('User.MainCategory.fast_product_of_main_category', compact('MainCategory'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showAllProductsBelogsToMainCategory($id)
    {
        $MainCategory = Mcategory::with('products')->find($id);
        return view('User.MainCategory.products_of_main_category', compact('MainCategory'));
    }
}
