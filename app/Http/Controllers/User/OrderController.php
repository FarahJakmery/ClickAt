<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::where('user_id', Auth::user()->id)->get();
        return view('User.Order.orders', compact('orders'));
    }


    public function getOrderItems($id)
    {
        $orderItems = OrderItem::where('order_id', $id)->get();
        return json_encode($orderItems);
    }
}
