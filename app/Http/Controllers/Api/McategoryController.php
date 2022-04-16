<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Mcategory;
use Illuminate\Http\Request;

class McategoryController extends Controller
{
    use ApiResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Mcategories = Mcategory::get();
        return $this->apiResponse($Mcategories, 'OK', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $MainCategory = Mcategory::find($id);
        if ($MainCategory) {
            return $this->apiResponse($MainCategory, 'OK', 200);
        }
        return $this->apiResponse($MainCategory, 'The Main Category Not Found', 401);
    }

    public function showAllFastSellingProductsBelogsToMainCategory($id)
    {
        $MainCategory = Mcategory::with('fastproducts')->find($id);
        if ($MainCategory) {
            return $this->apiResponse($MainCategory, 'OK', 200);
        }
        return $this->apiResponse($MainCategory, 'The Main Category Not Found', 401);
    }

    public function showAllProductsBelogsToMainCategory($id)
    {
        $MainCategory = Mcategory::with('products')->find($id);
        if ($MainCategory) {
            return $this->apiResponse($MainCategory, 'OK', 200);
        }
        return $this->apiResponse($MainCategory, 'The Product Not Found', 401);
    }
}
