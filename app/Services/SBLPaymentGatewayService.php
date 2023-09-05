<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class SBLPaymentGatewayService
{
    protected $invoiceNo;
    protected $amount;

    public function __construct($invoiceNo,$amount)
    {
        $this->invoiceNo = $invoiceNo;
        $this->amount    = $amount;
    }


    public function getAccessToken(){

        $data = [
            "AccessUser" => [
                "userName" => env('SBG_USERNAME'),
                "password" => env('SBG_PASSWORD'),
            ],
            "invoiceNo"   => 'SBG-'.$this->invoiceNo,
            "amount"      => $this->amount,
            "invoiceDate" => date('Y-m-d'),
            "accounts"    => [
                [
                    "crAccount" => "0002634313655",
                    "crAmount" => $this->amount
                ],
            ]
        ];

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://spgapi.sblesheba.com/api/v2/SpgService/GetAccessToken", // your preferred url
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => array(
                // Set here requred headers
                "accept: */*",
                "accept-language: en-US,en;q=0.8",
                "content-type: application/json",
                "Authorization: Basic ZHVVc2VyMjAxNDpkdVVzZXJQYXltZW50MjAxNA=="
            ),
        ));


        $response = curl_exec($curl);
        $err      = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            // print_r(json_decode($response));
            $data = json_decode($response);
            $array = json_decode(json_encode($data), true);
            return $this->createPaymentRequest($array['access_token']);
        }


    }


    public function createPaymentRequest($token)
    {

        $root = $_SERVER['HTTP_HOST'];

        $data = [
            "authentication" => [
                "apiAccessUserId" => env('SBG_USERNAME'),
                "apiAccessToken" => $token
            ],
            "referenceInfo" => [
                "invoiceNo"     => 'SBG-'.$this->invoiceNo,
                "invoiceDate"   => date('Y-m-d'),
                "returnUrl"     => sprintf("https://%s/transaction-verify",$root),
                "totalAmount"   => $this->amount,
                "applicentName" => Auth::guard('student')->user()->name,
                "applicentContactNo" => Auth::guard('student')->user()->student->mobile_number,
                "extraRefNo" => Auth::guard('student')->user()->id_no,
            ],
            "creditInformations" => [
                [
                    "slno" => "1",
                    "crAccount" => "0002634313655",
                    "crAmount" =>  $this->amount,
                    "tranMode" => "TRN"
                ]
            ]
        ];

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://spgapi.sblesheba.com/api/v2/SpgService/CreatePaymentRequest", // your preferred url
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => array(
                // Set here requred headers
                "accept: */*",
                "accept-language: en-US,en;q=0.8",
                "content-type: application/json",
                "Authorization: Basic ZHVVc2VyMjAxNDpkdVVzZXJQYXltZW50MjAxNA=="
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {

            $data = json_decode($response);
            $array = json_decode(json_encode($data), true);
            // dd($array);
            return Redirect::to('https://spg.sblesheba.com:6313/SpgLanding/SpgLanding/' . $array['session_token']);
        }
    }
}
