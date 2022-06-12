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
            auth()->user()->fastProductWishlist()->attach(request('FastProductId'), ['price' => request('FastProductPrice')]);
        }
    }


    public function storeProduct()
    {
        if (!auth()->user()->wishlistHas(request('productId'))) {
            auth()->user()->wishlist()->attach(request('productId'));
        }
    }


    public function destroy(Request $request)
    {
        if ($request->type == 1) {
            auth()->user()->wishlist()->detach(request('productId'));
        } elseif ($request->type == 2) {
            auth()->user()->fastProductWishlist()->detach(request('productId'));
        }
    }
}
