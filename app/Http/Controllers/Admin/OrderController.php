<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::orderBy('created_at', 'DESC')->get();
        return view('Admin.Order.orders', compact('orders'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::where('id', $id)->first();
        $orderItems = OrderItem::where('order_id', $id)->get();
        return view('Admin.Order.orderDetails', compact('order', 'orderItems'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $order = Order::find($id);
        $order->delete();
        session()->flash('delete', 'تم حذف الطلب بنجاح');
        return redirect('/admin/orders');
    }

    public function update(Request $request)
    {
        $order = Order::find($request->id);

        if ($request->order_status === 'wait_shimp') {

            $order->update([
                'order_status' => $request->order_status,
            ]);
        } //
        elseif ($request->order_status === 'shimp') {
            $order->update([
                'order_status' => $request->order_status,
            ]);
        }
        //
        elseif ($request->order_status === 'done') {
            $order->update([
                'order_status' => $request->order_status,
            ]);
        }
        //
        elseif ($request->order_status === 'canceled') {
            $order->update([
                'order_status' => $request->order_status,
            ]);
        }
        session()->flash('تم تعديل حالة الطلب');
        return redirect()->back();
    }


    public function paying_order()
    {
        $orders = Order::where('order_status', 'paid')->orderBy('created_at', 'DESC')->get();
        return view('Admin.Order.paying_orders', compact('orders'));
    }

    public function wait_shimp()
    {
        $orders = Order::where('order_status', 'wait_shimp')->orderBy('created_at', 'DESC')->get();
        return view('Admin.Order.whait_shimp_orders', compact('orders'));
    }

    public function shimp()
    {
        $orders = Order::where('order_status', 'shimp')->orderBy('created_at', 'DESC')->get();
        return view('Admin.Order.shimp', compact('orders'));
    }

    public function done()
    {
        $orders = Order::where('order_status', 'done')->orderBy('created_at', 'DESC')->get();
        return view('Admin.Order.done', compact('orders'));
    }

    public function canceled()
    {
        $orders = Order::where('order_status', 'canceled')->orderBy('created_at', 'DESC')->get();
        return view('Admin.Order.canceled', compact('orders'));
    }
}
