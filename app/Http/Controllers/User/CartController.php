<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use App\Models\Cart;
use App\Models\Fastproduct;
use App\Models\Mcategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        // If the User is not logged in
        if (Auth::user() == null) {
            echo "not loin";
            $minutes = 1440;
            $product_id = Cookie::get($request->product_id);

            // If the product isn't added yet to the Cookie
            if ($product_id == null) {
                $quantity = $request->quantity;
                Cookie::queue("$request->product_id", $request->product_id, $minutes);
                Cookie::queue("quantity" . $request->product_id, $request->quantity, $minutes);
                Cookie::queue("price" . $request->product_id, $request->max_price, $minutes);
            }
            // If the product is already added to the Cookie
            else {
                $product_quantity = Cookie::get("quantity" . $request->product_id);
                $quantity = $request->quantity + $product_quantity;
                Cookie::queue("quantity" . $request->product_id, $quantity, $minutes);
                Cookie::queue("price" . $request->product_id, $request->max_price, $minutes);
            }
        }
        // If the User is logged in
        else {
            echo " loin";
            $user = User::find(Auth::user()->id);
            $FastProduct = Fastproduct::where('id', $request->product_id)->first();
            $cart_items = Cart::where('product_id', $request->product_id)->where('status', 'waiting')->first();
            // If There aren't any items added to cart before
            if ($cart_items == null) {
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
                $FastProduct = Cart::create($data);
            }
            // If There are items added to cart before
            else {
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
                $FastProduct = $cart_items->update($data);
            }
        }
    }


    /** This Function is to show the Products in the Cart*/

    // step1 : check if the user has been logged in or not
    // step2 : if the user has been logged in so we will do the next steps
    /**
     * 1 : Get All the FastProduct From the DataBase.
     * 2 : for every FastProduct we get it from the DataBase we will get its id from the Cookie
     * 3 : check if this id equal to null so => this FastProduct has not been Added to the Cookie
     * 4 : else => this FastProduct has been Added to the Cookie
     * 5 : get The quantity of this FastProduct From the Cookie
     * 6 : Increase the number of FastProducts by one
     * 7 : add the id of this FastProduct To an array "we will store the ids in it"
     */
    // step3 : for each id of those ids
    /**
     * 1 : get the quantity, price of the fastProduct id
     * 2 : get the fastProduct from the database
     * 3 : Calculate the total price
     * 4 : get this fastProduct from the cart to update it
     * now we have condition
     * 5 : check if the values that we get it from the cart if it is null or not
     * 6 : if it is equal to null that mean we dont have this item in the database to updata it so we will create it
     * 7 : else we will update the "quantity and the price"
     */
    // step4 : get all the fastProduct from the cart that its status is Witing for the user how is logged in to display it in the navbar
    // step5 : for each fastProduct in the cart
    /**
     * 1 : get all its information from The fastProduct table
     * 2 : get the price of the fastProduct that in the cart
     * 3 : get the total price of the fastProduct that in the cart
     */
    //step6 : Calculate the number of products in the cart

    public function show()
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
                $mainCategories = Mcategory::all();
                $fastProduct_detailss = [];
                $price = 0;
                $quan_cart = 1;
                $price_for_all_thing = 0;
                foreach ($ids as $fastProduct) {
                    $price                = 0;
                    $fastProduct_quantity = Cookie::get("quantity" . $fastProduct);
                    $fastProduct_price    = Cookie::get("price" . $fastProduct);
                    $fastProduct          = Fastproduct::where('id', $fastProduct)->first();
                    $all_price            = $price + $fastProduct_price;
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
                // return $fastProduct_detailss;
                return view('User.Cart.cart', compact('price_for_all_thing', 'quan_cart', 'fastProduct_detailss', 'count_items', 'mainCategories', 'price'));
            }
            // If the arry of Ids is null => so it has not items in it
            else {
                $mainCategories = Mcategory::all();
                $fastProduct_detailss = [];
                $quan_cart = 0;
                return view('User.Cart.cart', compact('price_for_all_thing', 'quan_cart', 'fastProduct_detailss', 'mainCategories', 'count_items'));
            }
        }
        // If the user is logged in
        else {
            $user  = User::find(Auth::user()->id);
            $fastProducts = Fastproduct::all();
            $ids = [];
            foreach ($fastProducts as $fastProduct) {
                $fastProduct_id = Cookie::get($fastProduct->id);

                if ($fastProduct_id == null) {
                } else {
                    array_push($ids, $fastProduct_id);
                }
            }

            foreach ($ids as $id) {
                $fastProduct_quantity = Cookie::get("quantity" . $id);
                $fastProduct_cost     = Cookie::get("price" . $id);
                $fastProduct          = Fastproduct::where('id', $id)->first();
                $total_price          = $fastProduct_quantity * $fastProduct_cost;
                $fastProduct_cookies  = Cart::where('product_id', $fastProduct->id)->where('user_id', $user->id)->where('status', 'waiting')->first();
                if ($fastProduct_cookies == null) {
                    $data = [
                        'product_id'     => $fastProduct->id,
                        'user_id'     => $user->id,
                        'quantity'    => $fastProduct_quantity,
                        'price'       => $fastProduct_cost,
                        'total_price' => $total_price,
                        'status'      => 'waiting'
                    ];
                    Cart::create($data);
                } else {
                    $fastProduct_quantity1 = $fastProduct_cookies->quantity + $fastProduct_quantity;
                    $total_price1          = $fastProduct_cookies->total_price + $total_price;
                    $data = [
                        'quantity'    => $fastProduct_quantity1,
                        'total_price' => $total_price1,
                    ];
                    $fastProduct_cookies->update($data);
                }
                // this line is to emptying cookie
                Cookie::queue(Cookie::forget($id));
            }


            $fast_Products_From_Cart          = Cart::where('user_id', $user->id)->where('status', 'waiting')->get();
            $fastProduct_detailss = [];
            $price_for_all_thing = 0;
            $price = 0;
            foreach ($fast_Products_From_Cart as $fast_Product) {
                $price = 0;
                $pricee = 0;
                $fastProductInformation    = Fastproduct::where('id', $fast_Product->product_id)->first();
                $all_price                 = $pricee + $fast_Product->price;
                $all_pricee                = $price  + $fast_Product->total_price;
                $price                     = $all_pricee;
                $price_for_all_thing      += $price;
                $final                = array(
                    'fast_product'              => $fastProductInformation,
                    'fast_product_quantity'     => $fast_Product->quantity,
                    'price'                     => $price,
                    'all_price'                 => $all_price
                );
                array_push($fastProduct_detailss, $final);
            }
            // return $fastProduct_detailss;
            $count_items = count($fast_Products_From_Cart);
            return view('User.Cart.cart', compact('price_for_all_thing', 'quan_cart', 'user', 'count_items', 'fastProduct_detailss', 'fast_Products_From_Cart', 'price'));
        }
    }
}
