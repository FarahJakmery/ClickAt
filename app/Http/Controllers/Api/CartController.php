<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Fastproduct;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    use ApiResponseTrait;

    public function addToCart(Request $request)
    {
        $user = User::find($request->user_id);
        $quantity    = $request->quantity;
        $price       = $request->max_price;
        $total_price = $quantity * $price;
        $data = [
            'user_id'     => $user->id,
            'product_id'  => $request->product_id,
            'quantity'    => $quantity,
            'price'       => $request->max_price,
            'total_price' => $total_price,
            'status'      => 'waiting'
        ];
        $cart_item = Cart::create($data);
        if ($cart_item) {
            return $this->apiResponse(null, 'The Fast Product Added To Cart Successfully', 200);
        }
        return $this->apiResponse(null, 'The Fast Product Was Not Added Successfully To The Cart', 401);
    }

    public function show(Request $request)
    {
        // Initializing variables
        $price = 0;
        $price_for_all_thing = 0;
        $fastProduct_detailss = [];
        // Get Data From Data_Base
        $user = User::find($request->user_id);
        $cart_items = Cart::where('user_id', $user->id)->where('status', 'waiting')->get();

        foreach ($cart_items as $cart_item) {
            $price = 0;
            $total_price = 0;
            $fast_Product_Info         = Fastproduct::where('id', $cart_item->product_id)->first();
            $Price                     = $price  + (int)$cart_item->price;
            $Total_Price               = $total_price  + (int)$cart_item->total_price;
            $price_for_all_thing      += $Total_Price;
            $final = array(
                'fast_product_Info'         => $fast_Product_Info,
                'fast_product_quantity'     => $cart_item->quantity,
                'price'                     => $Price,
                'total_price'               => $Total_Price
            );
            array_push($fastProduct_detailss, $final);
        }
        $count_items = count($cart_items);
        $array = [
            'price_for_all_thing'  => $price_for_all_thing,
            'user'                 => $user,
            'count_items'          => $count_items,
            'fastProduct_detailss' => $fastProduct_detailss,
        ];
        if ($cart_items) {
            return $this->apiResponse($array, 'OK', 200);
        }
        return $this->apiResponse(null, 'There are not products in the cart', 401);
    }
    public function update(Request $request)
    {
        $cart_item  = Cart::where('user_id', $request->user_id)->where('product_id', $request->product_id)->where('status', 'waiting')->first();
        $new_quantity    = $request->quantity;
        $new_total_price = $request->price * $new_quantity;
        $data = [
            'quantity'    => $new_quantity,
            'total_price' => $new_total_price,
        ];
        $cart_item->update($data);
        return $this->apiResponse(null, 'The Fast Product Updated successfully From Cart', 200);
    }

    public function removeFromCart(Request $request)
    {
        $cart_item = Cart::where('product_id', $request->product_id)->where('user_id', $request->user_id)->where('status', 'waiting')->first();
        if ($cart_item !== null) {
            $cart_item->delete();
            return $this->apiResponse(null, 'The Fast Product Remove From Cart', 200);
        }
    }
}
