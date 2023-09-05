<?php

namespace App\Http\Controllers;

use App\Helper\Helper;
use App\Models\Institution;
use App\Models\OnlinePayment;
use App\Services\ShurjoPayService;
use Carbon\Carbon;
use Shurjomukhi\ShurjopayLaravelPlugin\Http\Controllers\Shurjopay;
use Shurjomukhi\ShurjopayLaravelPlugin\Http\Controllers\TransactionClasses\PaymentRequest;
use Illuminate\Http\Request;

class ShurjopayIntigrationController extends Controller
{
    public function getAccessToken()
    {
        $paymentGateway = new ShurjoPayService();
        return $paymentGateway->getToken();
    }

    public function verifyPayment(Request $request)
    {

        $paymentGateway = new ShurjoPayService();
        $payment        = $paymentGateway->verifyPayment($request->order_id);

        $data = $payment[0];

        //create Online payment
        if ($data['sp_message'] == 'Success') {

            OnlinePayment::updateOrCreate([
                'institute_id'       => Helper::getInstituteId(),
                'date'               => date('Y-m-d'),
                'order_id'           => $data['order_id'],
                'customer_order_id'  => $data['customer_order_id'],
                'bank_trx_id'        => $data['bank_trx_id'],
                'invoice_no'         => $data['invoice_no'],
                'status'             => $data['bank_status'],
                'method'             => $data['method'],
                'transaction_status' => $data['transaction_status'],
            ]);

            $institute = Institution::find(Helper::getInstituteId());
            $date      = Carbon::createFromFormat('Y-m-d', $institute->expire_date);
            $newDate   = $date->addDays($institute->package->duration);

            $institute->update([
                'expire_date' => $newDate
            ]);

        } else {
            return $data['sp_message'];
        }


        return redirect()->route('success-payment');
    }

    public function paymentSuccess()
    {
        return view('payment-success');
    }


    public function cancelPayment()
    {
        return view('payment-cancel');
    }
}
