<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\PaymentGateway;
use Illuminate\Http\Request;

class PaymentGatewayController extends Controller
{
    public function index(){
        $paymentGateways = PaymentGateway::with('payment_gateway_details')->get();
        return view($this->backendTemplate['template']['path_name'].'.settings.payment-gateway.index',compact('paymentGateways'));
    }
}
