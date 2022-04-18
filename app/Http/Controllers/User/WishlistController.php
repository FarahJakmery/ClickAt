<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Fastproducts = auth()->user()->fastProductWishlist()->latest()->get();
        $products = auth()->user()->wishlist()->latest()->get();

        return view('User.Wishlist.wishlist', compact('Fastproducts', 'products'));
    }

    public function storeFastProduct()
    {
        if (!auth()->user()->fastProductWishlistHas(request('FastProductId'))) {
            auth()->user()->fastProductWishlist()->attach(request('FastProductId'));
            return $this->apiResponse(null, 'The Fast Product Added to Wishlist', 200);
        }
        return $this->apiResponse(null, 'The Fast Product already Added to Wishlist', 401);
    }


    public function storeProduct()
    {
        if (!auth()->user()->wishlistHas(request('productId'))) {
            auth()->user()->wishlist()->attach(request('productId'));
            return $this->apiResponse(null, 'The Product Added to Wishlist', 200);
        }
        return $this->apiResponse(null, 'The Product already Added to Wishlist', 401);
    }


    public function destroy(Request $request)
    {
        if ($request->type == 1) {
            auth()->user()->wishlist()->detach(request('Id'));
            return $this->apiResponse(null, 'The Product Remove From Wishlist', 200);
        } elseif ($request->type == 2) {
            auth()->user()->fastProductWishlist()->detach(request('Id'));
            return $this->apiResponse(null, 'The Fast Product Remove From Wishlist', 200);
        }
    }
}
