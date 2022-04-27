<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Fastproduct;
use App\Models\Mcategory;
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
        return view('User.FastProducts.fastProduct', compact('mainCategories'));
    }
}
