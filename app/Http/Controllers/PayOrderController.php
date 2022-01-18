<?php

namespace App\Http\Controllers;

use App\Billing\BankPaymentGateway;
use App\Billing\PaymentGateway;
use App\Billing\PaymentGatewayContract;
use App\Orders\OrderDetails;
use Illuminate\Http\Request;

class PayOrderController extends Controller
{
    public function store(OrderDetails $orderDetails, PaymentGatewayContract $bankPaymentGateway)
    {
        // $paymentGateway = new PaymentGateway("USD");
        $order = $orderDetails->all();

        dd($bankPaymentGateway->charge(2000));
    }
}
