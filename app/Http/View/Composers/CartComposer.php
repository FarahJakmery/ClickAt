<?php

namespace App\Http\View\Composers;

use App\Models\Cart;
use App\Models\Fastproduct;
use App\Models\Mcategory;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\View\View;

class CartComposer
{

    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $login = Auth::user();
        $quan_cart = 0;

        // If the user is not logged in
        if ($login == null) {
            $fastProducts = Fastproduct::all();
            $ids = [];
            $count_items = 0;

            foreach ($fastProducts as $fastProduct) {
                $fastProduct_id = Cookie::get($fastProduct->id);
                if ($fastProduct_id == null) {
                }
                //
                else {
                    $fastProduct_quantity = Cookie::get("quantity" . $fastProduct->id);
                    $count_items += 1;
                    array_push($ids, $fastProduct_id);
                }
            }

            $price_for_all_thing = 0;
            // If the arry of Ids is not null => so it has items in it
            if ($ids != null) {
                $fastProduct_detailss = [];
                $price = 0;
                $quan_cart = 1;
                $price_for_all_thing = 0;
                foreach ($ids as $fastProduct) {
                    $price                = 0;
                    $fastProduct_quantity = Cookie::get("quantity" . $fastProduct);
                    $fastProduct_price    = Cookie::get("price" . $fastProduct);
                    // dd($fastProduct_price);
                    $fastProduct          = Fastproduct::where('id', $fastProduct)->first();
                    $all_price            = $price + (int)$fastProduct_price;
                    $price                = $all_price * $fastProduct_quantity;
                    $price_for_all_thing += $price;
                    $final                = array(
                        'fast_product'               => $fastProduct,
                        'fast_product_quantity'      => $fastProduct_quantity,
                        'price'                      => $all_price,
                        'all_price'                  => $price
                    );
                    array_push($fastProduct_detailss, $final);
                }
                $array = [
                    'price_for_all_thing' => $price_for_all_thing,
                    'count_items' => $count_items,
                    'fastProduct_detailss' => $fastProduct_detailss,
                ];
                $view->with('array', $array);
            }
            // If the arry of Ids is null => so it has not items in it
            else {
                $fastProduct_detailss = [];
                $quan_cart = 0;
                $array = [
                    'price_for_all_thing'  => $price_for_all_thing,
                    'count_items'          => $count_items,
                    'fastProduct_detailss' => $fastProduct_detailss,
                ];
                $view->with('array', $array);
            }
        }
        // If the user is logged in
        else {
            $user  = Auth::user();
            $fastProducts = Fastproduct::all();
            $ids = [];
            foreach ($fastProducts as $fastProduct) {
                $fastProduct_id = Cookie::get($fastProduct->id);

                if ($fastProduct_id == null) {
                } else {
                    array_push($ids, $fastProduct_id);
                }
            }

            // foreach ($ids as $id) {
            //     $fastProduct_quantity = Cookie::get("quantity" . $id);
            //     $fastProduct_cost     = Cookie::get("price" . $id);
            //     $fastProduct          = Fastproduct::where('id', $id)->first();
            //     $total_price          = $fastProduct_quantity * (int)$fastProduct_cost;

            //     if(Cart::where('product_id', $fastProduct->id)->where('user_id', $user->id)->where('status', 'waiting')->exists()){
            //         $fastProduct_cookies  = Cart::where('product_id', $fastProduct->id)->where('user_id', $user->id)->where('status', 'waiting')->first();
            //     }//
            //     else{
            //         $fastProduct_cookies = null;
            //     }

            //     if ($fastProduct_cookies == null) {
            //         $data = [
            //             'user_id'     => $user->id,
            //             'product_id'  => $fastProduct->id,
            //             'quantity'    => $fastProduct_quantity,
            //             'price'       => $fastProduct_cost,
            //             'total_price' => $total_price,
            //             'status'      => 'waiting'
            //         ];

            //         Cart::create($data);

            //     } //
            //     else {
            //         if(Cookie::get($id)){
            //             $fastProduct_quantity1 = $fastProduct_cookies->quantity + $fastProduct_quantity;
            //             $total_price1          = $fastProduct_cookies->total_price + $total_price;
            //             $data = [
            //                 'quantity'    => $fastProduct_quantity1,
            //                 'total_price' => $total_price1,
            //             ];
            //             $fastProduct_cookies->update($data);
            //         }
            //     }


            //     // this line is to emptying cookie
            //     Cookie::queue(Cookie::forget("quantity" . $id));
            //     Cookie::queue(Cookie::forget("price" . $id));
            //     Cookie::queue(Cookie::forget($id));
            // }


            $fast_Products_From_Cart          = Cart::where('user_id', Auth::user()->id)->where('status', 'waiting')->get();
            $fastProduct_detailss = [];
            $price_for_all_thing = 0;
            $price = 0;
            foreach ($fast_Products_From_Cart as $fast_Product) {

                $price = 0;
                $pricee = 0;
                $fastProductInformation    = Fastproduct::where('id', $fast_Product->product_id)->first();
                $all_price                 = $pricee + (int)$fast_Product->price;
                $all_pricee                = $price  + (int)$fast_Product->total_price;
                $price                     = $all_pricee;
                $price_for_all_thing      += $price;
                $final                  = array(
                    'fast_product'      => $fastProductInformation,
                    'cart'              => $fast_Product,
                    'quantity'          => $fast_Product->quantity,
                    'price'             => $price,
                    'all_price'         => $all_price
                );
                array_push($fastProduct_detailss, $final);
            }

            $count_items = count($fast_Products_From_Cart);

            $array = [
                'price_for_all_thing' => $price_for_all_thing,
                'count_items' => $count_items,

                'fastProduct_detailss' => $fastProduct_detailss,
            ];
            $view->with('array', $array);
        }
    }
}
