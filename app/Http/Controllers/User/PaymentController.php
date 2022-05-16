<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Paytabscom\Laravel_paytabs\Facades\paypage;

class PaymentController extends Controller
{
    public function getPaymentPage()
    {
        $pay = paypage::sendPaymentCode('all')

            ->sendTransaction('sale')

            ->sendCart(10, 100, 'test')

            ->sendCustomerDetails('Walaa Elsaeed', 'w.elsaeed@paytabs.com', '0101111111', 'test', 'Nasr City', 'Cairo', 'EG', '1234', '100.279.20.10')

            ->sendShippingDetails('Walaa Elsaeed', 'w.elsaeed@paytabs.com', '0101111111', 'test', 'Nasr City', 'Cairo', 'EG', '1234', '100.279.20.10')

            ->sendURLs('http://localhost:8000/Payment_Page', 'http://localhost:8000/paymentIPN')

            ->sendLanguage('en')

            ->create_pay_page();

        return $pay;
    }
}
