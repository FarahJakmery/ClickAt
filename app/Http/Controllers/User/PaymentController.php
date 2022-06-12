<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Address;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;
use App\Models\Fastproduct;
use Paytabscom\Laravel_paytabs\Facades\paypage;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function checkout(Request $request)
    {
        DB::transaction(function () use ($request) {

            // Update User
            $user = User::find(auth()->id());
            $user->update([
                'name'           => $request->name,
                'email'          => $request->email,
                'mobile_number'  => $request->mobile_number,
            ]);
            // Create or Update Address
            Address::updateOrCreate(
                ['user_id' => auth()->id()],
                [
                    'address1'             => $request->address1,
                    'city1'                => $request->city1,
                    'state1'               => $request->state1,
                    'country1'             => $request->country1,
                    'zip1'                 => $request->zip1,
                    'address2'             => $request->address2,
                    'city2'                => $request->city2,
                    'state2'               => $request->state2,
                    'country2'             => $request->country2,
                    'zip2'                 => $request->zip2,
                    'user_id'              => auth()->id()
                ]
            );

            // Calculate the total amount
            $total_price = Cart::where('user_id', auth()->id())->where('status', 'waiting')->sum('total_price');

            // Create Order
            $latestOrder = Order::orderBy('created_at', 'DESC')->first();
            if ($latestOrder == null) {
                $order_number = '#' . str_pad(0 + 1, 8, "0", STR_PAD_LEFT);
            } else
                $order_number = '#' . str_pad($latestOrder->id + 1, 8, "0", STR_PAD_LEFT);
            $order = Order::create([
                'order_number'     => $order_number,
                'total_price'      => $total_price,
                'order_status'     => "Unpaid",
                'user_id'          => auth()->id(),
            ]);

            // Assign Products To The Order
            $OrderItems = [];
            $cart = Cart::where('user_id', auth()->id())->where('status', 'waiting')->get();
            foreach ($cart as $cartProduct) {
                $fastProduct    = Fastproduct::where('id', $cartProduct->product_id)->first();
                $newOrderItem = OrderItem::create([
                    'item_name'          => $fastProduct['name'],
                    'item_photo'         => $fastProduct['photo_name'],
                    'quantity'           => $cartProduct['quantity'],
                    'current_price'      => $cartProduct['price'],
                    'fastproduct_id'     => $fastProduct['id'],
                    'order_id'           => Order::latest()->first()->id,
                ]);
                array_push($OrderItems, $newOrderItem);
            }
        });
        $order_ID = Order::where('user_id', auth()->id())->orderBy('created_at', 'DESC')->first();
        $id = $order_ID->id;

        // Calculate the total amount
        $total_price = Cart::where('user_id', auth()->id())->where('status', 'waiting')->sum('total_price');

        // Empty the Cart
        $cart = Cart::where('user_id', auth()->id())->where('status', 'waiting')->get();
        foreach ($cart as $cartProduct) {
            Cart::where('user_id', auth()->id())->where('status', 'waiting')->delete();
        }

        // Passing Data To Payment Page
        $pay = paypage::sendPaymentCode('all')

            ->sendTransaction('sale')

            ->sendCart(10, $total_price, 'test')

            ->sendCustomerDetails($request->name, $request->email, $request->mobile_number, $request->address1, $request->city1, $request->state1, $request->country1, $request->zip1, '100.279.20.10')

            ->sendShippingDetails($request->name, $request->email, $request->mobile_number, $request->address2, $request->city2, $request->state2, $request->country2, $request->zip2, '100.279.20.10')

            ->sendURLs('https://zzgolden.online/paytaps_response/' . $id, 'https://zzgolden.online/paytaps_response/' . $id)

            ->sendLanguage('en')

            ->create_pay_page();

        return $pay;
    }


    public function paytaps_response($id)
    {

        $tran_ref        = $_POST['tranRef'];
        $response_status = $_POST['respStatus'];

        $order = Order::where('id', $id)->first();

        if ($response_status == "A") {
            // Change Order Status
            $data = ['order_status' => 'paid'];
            $order->update($data);
            // Decrease Quantities To The Fast Products
            $order_items = OrderItem::where('order_id', $id)->get();

            foreach ($order_items as $FastProduct) {

                Fastproduct::find($FastProduct->fastproduct_id)->decrement('quantity', $FastProduct->quantity);
            }

            return redirect("success_payment");
        } elseif ($response_status == "C") {

            // Change Order Status
            $data = ['order_status' => "Cancelled"];
            $order->update($data);

            return redirect("cancel_payment");
        } else {
            $data = ['order_status' => "Failed"];
            $order->update($data);

            return redirect("failed_payment");
        }
    }
}
