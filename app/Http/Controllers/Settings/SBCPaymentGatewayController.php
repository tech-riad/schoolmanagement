<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\SBGPayment;
use App\Models\StudentFeeReceived;
use App\Services\SBLTransactionVerifyService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SBCPaymentGatewayController extends Controller
{
    // public function getAccessToken()
    // {

    //     $data = [
    //         "AccessUser" => [
    //             "userName" => env('SBG_USERNAME'),
    //             "password" => env('SBG_PASSWORD'),
    //         ],
    //         "invoiceNo" => "123456789",
    //         "amount" => "200",
    //         "invoiceDate" => date('Y-m-d'),
    //         "accounts" => [
    //             [
    //                 "crAccount" => "0002634313655",
    //                 "crAmount" => 200
    //             ],
    //         ]
    //     ];

    //     $curl = curl_init();
    //     curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    //     curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
    //     curl_setopt_array($curl, array(
    //         CURLOPT_URL => "https://spgapi.sblesheba.com/api/v2/SpgService/GetAccessToken", // your preferred url
    //         CURLOPT_RETURNTRANSFER => true,
    //         CURLOPT_ENCODING => "",
    //         CURLOPT_MAXREDIRS => 10,
    //         CURLOPT_TIMEOUT => 30000,
    //         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //         CURLOPT_CUSTOMREQUEST => "POST",
    //         CURLOPT_POSTFIELDS => json_encode($data),
    //         CURLOPT_HTTPHEADER => array(
    //             // Set here requred headers
    //             "accept: */*",
    //             "accept-language: en-US,en;q=0.8",
    //             "content-type: application/json",
    //             "Authorization: Basic ZHVVc2VyMjAxNDpkdVVzZXJQYXltZW50MjAxNA=="
    //         ),
    //     ));

    //     $response = curl_exec($curl);
    //     $err = curl_error($curl);

    //     curl_close($curl);

    //     if ($err) {
    //         echo "cURL Error #:" . $err;
    //     } else {
    //         // print_r(json_decode($response));
    //         $data = json_decode($response);
    //         $array = json_decode(json_encode($data), true);
    //         return $this->createPaymentRequest($array['access_token']);
    //     }
    // }


    // public function createPaymentRequest($token)
    // {

    //     $root = $_SERVER['HTTP_HOST'];

    //     $data = [
    //         "authentication" => [
    //             "apiAccessUserId" => env('SBG_USERNAME'),
    //             "apiAccessToken" => $token
    //         ],
    //         "referenceInfo" => [
    //             "InvoiceNo" => "123456789",
    //             "invoiceDate" => "2019-02-26",
    //             "returnUrl" => sprintf("https://%s/transaction-verify",$root),
    //             "totalAmount" => "200",
    //             "applicentName" => "Md. Hasan Monsur",
    //             "applicentContactNo" => "01710563521",
    //             "extraRefNo" => "2132"
    //         ],
    //         "creditInformations" => [
    //             [
    //                 "slno" => "1",
    //                 "crAccount" => "0002634313655",
    //                 "crAmount" => "200",
    //                 "tranMode" => "TRN"
    //             ]
    //         ]
    //     ];

    //     $curl = curl_init();
    //     curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    //     curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
    //     curl_setopt_array($curl, array(
    //         CURLOPT_URL => "https://spgapi.sblesheba.com/api/v2/SpgService/CreatePaymentRequest", // your preferred url
    //         CURLOPT_RETURNTRANSFER => true,
    //         CURLOPT_ENCODING => "",
    //         CURLOPT_MAXREDIRS => 10,
    //         CURLOPT_TIMEOUT => 30000,
    //         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //         CURLOPT_CUSTOMREQUEST => "POST",
    //         CURLOPT_POSTFIELDS => json_encode($data),
    //         CURLOPT_HTTPHEADER => array(
    //             // Set here requred headers
    //             "accept: */*",
    //             "accept-language: en-US,en;q=0.8",
    //             "content-type: application/json",
    //             "Authorization: Basic ZHVVc2VyMjAxNDpkdVVzZXJQYXltZW50MjAxNA=="
    //         ),
    //     ));

    //     $response = curl_exec($curl);
    //     $err = curl_error($curl);

    //     curl_close($curl);

    //     if ($err) {
    //         echo "cURL Error #:" . $err;
    //     } else {

    //         $data = json_decode($response);
    //         $array = json_decode(json_encode($data), true);
    //         // dd($array);
    //         return Redirect::to('https://spg.sblesheba.com:6313/SpgLanding/SpgLanding/' . $array['session_token']);
    //     }
    // }

    public function transactionVerify(Request $request)
    {


        $transaction = new SBLTransactionVerifyService($request->all());
        $response = $transaction->verifyTransaction();

        $data  = json_decode($response);
        $array = json_decode(json_encode($data), true);


        if ($array['status'] == 200) {
            $invoiceNo = $array['InvoiceNo'];
            $invoice   = explode('-', $invoiceNo);

            StudentFeeReceived::find($invoice[1])->update([
                'status' => 1
            ]);

            SBGPayment::create([
                'date'           => $array['InvoiceDate'],
                'invoice_no'     => $array['InvoiceNo'],
                'transaction_id' => $array['TransactionId'],
                'br_code'        => $array['BrCode'],
                'pay_mode'       => $array['PayMode'],
                'total_amount'   => $array['TotalAmount'],
                'pay_amount'     => $array['PayAmount'],
                'payment_status' => $array['PaymentStatus'],
                'status'         => $array['status'],
                'message'        => $array['msg'],
            ]);
            //notification
            $notification = array(
                'message' =>'Payment Successfully ',
                'alert-type' =>'success'
            );
            return redirect()->route('parentportal')->with($notification);
        }
    }
}
