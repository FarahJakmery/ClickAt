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
            $products = Product::whereTranslationLike('product_name', "%$request->searchWord%")->get();
            $fastProducts = Fastproduct::whereTranslationLike('name', "%$request->searchWord%")->get();
            $codes = Codeproduct::whereTranslationLike('codeproduct_name', "%$request->searchWord%")->get();
            $array = [
                'products'     => $products,
                'fastProducts' => $fastProducts,
                'codes' => $codes,
            ];
            return $array;
        } elseif ($request->searchWord == null && $request->mainCategoryId !== "null") {
            $products = Product::whereHas('maincategories', function ($query) use ($request) {
                $query->where('id', $request->mainCategoryId);
            })->get();
            $fastProducts = Fastproduct::whereHas('mcategories', function ($query) use ($request) {
                $query->where('id', $request->mainCategoryId);
            })->get();
            $array = [
                'products'     => $products,
                'fastProducts' => $fastProducts,
            ];
            return $array;
        } elseif ($request->searchWord !== null && $request->mainCategoryId !== "null") {
            $products = Product::whereTranslationLike('product_name', "%$request->searchWord%")->whereHas('maincategories', function ($query) use ($request) {
                $query->where('id', $request->mainCategoryId);
            })->get();
            $fastProducts = Fastproduct::whereTranslationLike('name', "%$request->searchWord%")->whereHas('mcategories', function ($query) use ($request) {
                $query->where('id', $request->mainCategoryId);
            })->get();
            $array = [
                'products'     => $products,
                'fastProducts' => $fastProducts,
            ];
            return $array;
        } elseif ($request->searchWord == null && $request->mainCategoryId == "null") {
            $f = "There is not any thing";
            return $f;
        }
    }
}
