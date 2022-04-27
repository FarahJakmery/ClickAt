<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Codeproduct;
use App\Models\Fastproduct;
use App\Models\Product;
use Illuminate\Http\Request;


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

            $fastProducts = Fastproduct::whereHas('mcategories', function ($query) use ($request) {
                $query->where('id', $request->mainCategoryId);
            })->get();
            $products = Product::whereHas('maincategories', function ($query) use ($request) {
                $query->where('id', $request->mainCategoryId);
            })->get();
            return view('User.Search.searchResults', compact('fastProducts', 'products'));
        }
        //
        elseif ($request->searchWord !== null && $request->mainCategoryId !== "null") {

            $fastProducts = Fastproduct::whereTranslationLike('name', "%$request->searchWord%")->whereHas('mcategories', function ($query) use ($request) {
                $query->where('id', $request->mainCategoryId);
            })->get();
            $products = Product::whereTranslationLike('product_name', "%$request->searchWord%")->whereHas('maincategories', function ($query) use ($request) {
                $query->where('id', $request->mainCategoryId);
            })->get();
            return view('User.Search.searchResults', compact('fastProducts', 'products'));
        }
        //
        elseif ($request->searchWord == null && $request->mainCategoryId == "null") {

            return view('User.Search.searchResults');
        }
    }
}
