<?php

namespace App\Services;

use App\Helper\Helper;
use Shurjomukhi\ShurjopayLaravelPlugin\Http\Controllers\Shurjopay;
use Shurjomukhi\ShurjopayLaravelPlugin\Http\Controllers\TransactionClasses\PaymentRequest;

class ShurjoPayService
{
    protected $institute;

    public function __construct($institute)
    {
        $this->institute = $institute;
    }


    public function makePayment(){


        $data = Helper::getCustomerInfo();
        $data['amount']         = $this->institute->package->price;
        $data['customer_name']  = $this->institute->title;
        $data['customer_phone'] = $this->institute->phone;
        $data['customer_email'] = $this->institute->email;
        $data['order_id']       = '1250';

        $requestArray      = array($data);
        $request           = new PaymentRequest($requestArray);
        $shurjopay_service = new Shurjopay();
        return $shurjopay_service->makePayment($request);
    }


}
