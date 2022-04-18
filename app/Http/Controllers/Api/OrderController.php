<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Fastproduct;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    use ApiResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $orders = Order::where('user_id', $request->id)->with('orderItems')->get();
        if ($orders) {
            return $this->apiResponse($orders, 'OK', 200);
        }
        return $this->apiResponse(null, 'There is not any orders for this user', 401);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make(
            $request->all(),
            [
                'order_number' => ['required'],
                'total_price'  => ['required'],
                'order_status' => ['required'],
                'user_id'      => ['required'],
            ]
        );

        $order = Order::create([
            'order_number'     => $request->order_number,
            'total_price'      => $request->total_price,
            'order_status'     => $request->order_status,
            'user_id'          => $request->user_id,
        ]);

        $orderItems = $request->items;
        foreach ($orderItems as $orderItem) {
            $newOrderItem = OrderItem::create([
                'item_name'      => $orderItem['item_name'],
                'item_photo'     => $orderItem['item_photo'],
                'quantity'       => $orderItem['quantity'],
                'current_price'  => $orderItem['current_price'],
                'product_id'     => $orderItem['product_id'],
                'order_id'       => $orderItem['order_id'],
            ]);
            $newOrderItems = array();
            array_push($newOrderItems, $newOrderItem);
        }
        if ($order && $newOrderItems) {
            return $this->apiResponse(null, 'The Order and its OrderItems Added Successfully', 200);
        }
        return $this->apiResponse(null, 'The Order has not been registered', 401);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
