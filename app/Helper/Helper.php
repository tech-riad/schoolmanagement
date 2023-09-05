<?php

namespace App\Helper;

use App\Models\AcademicSetting;
use App\Models\ClassSubject;
use App\Models\InsClass;
use App\Models\Institution;
use App\Models\SchoolInfo;
use App\Models\Session;
use App\Models\Sms;
use App\Models\StockSms;
use App\Models\Student;
use App\Models\Teacher;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Calculation\Statistical;

class Helper
{

    public static function getSubjectByClassId($innClass_id)
    {
        $items = ClassSubject::where('ins_class_id', $innClass_id)
            ->select('subject_id')->get();

        $subject_ids = $items->map(function ($item) {
            return $item['subject_id'];
        });

        return $subject_ids->toArray();
    }

    public static function blood_groups()
    {
        $blood_groups = ['A+', 'A-', ' B+', 'B-', 'O+', 'O-', 'AB+', 'AB-'];
        return $blood_groups;
    }
    public static function months()
    {
        $months = [
            '1' => "January",
            '2' => "February",
            '3' => "March",
            '4' => "April",
            '5' => "May",
            '6' => "June",
            '7' => "July",
            '8' => "August",
            '9' => "September",
            '10' => "October",
            '11' => "November",
            '12' => "December",
        ];
        return $months;
    }

    public static function getMonths(){
        $months = [
            0 => ['id' => 1,'name' => "January"],
            1 => ['id' => 2,'name' => "February"],
            2 => ['id' => 3,'name' => "March"],
            3 => ['id' => 4,'name' => "April"],
            4 => ['id' => 5,'name' => "May"],
            5 => ['id' => 6,'name' => "June"],
            6 => ['id' => 7,'name' => "July"],
            7 => ['id' => 8,'name' => "August"],
            8 => ['id' => 9,'name' => "September"],
            9 => ['id' => 10,'name' => "October"],
            10 => ['id' => 11,'name' => "October"],
            11 => ['id' => 12,'name' => "December"],

        ];
        return $months;
    }



    public static function getMonthFromNumber($month)
    {

        $dateObj   = DateTime::createFromFormat('!m', $month);
        $monthName = $dateObj->format('F'); // March
        return $monthName;
    }

    public static function generateTeacherId()
    {

        $teacher = teacher::orderBy('id', 'DESC')->first();

        if ($teacher == null) {

            $fistReg = 0;
            $teacherId = $fistReg + 1;


            if ($teacherId < 10) {
                $id_no = '000' . $teacherId;
            } elseif ($teacherId < 100) {
                $id_no = '00' . $teacherId;
            } elseif ($teacherId < 1000) {
                $id_no = '0' . $teacherId;
            }

        } else {
            $teacher = teacher::orderBy('id', 'DESC')->first()->id;
            $teacherId = $teacher + 1;

            if ($teacherId < 10) {
                $id_no = '000' . $teacherId;
            } elseif ($teacherId < 100) {
                $id_no = '00' . $teacherId;
            } elseif ($teacherId < 1000) {
                $id_no = '0' . $teacherId;
            }
        }

        $final_id_no = $id_no;
        return $final_id_no;
    }

    public  static function studentIdGenerate($session_id, $class_id)
    {


        $check_year     = Session::find($session_id)->title;

        $year           = substr($check_year, 2);
        $class_code     = self::getClassName($class_id);


        $student    = Student::orderBy('id', 'DESC')->first();

        if ($student == null) {

            $fistReg = 0;
            $studentId = $fistReg + 1;

            if ($studentId < 10) {
                $studentId = '000' . $studentId;
            } elseif ($studentId < 100) {
                $studentId = '00' . $studentId;
            } elseif ($studentId < 1000) {
                $studentId = '0' . $studentId;
            }
        } else {
           // $student = Student::orderBy('id', 'DESC')->first()->id;
            $studentId = $student->id + 1;

            if ($studentId < 10) {
                $studentId = '000' . $studentId;
            } elseif ($studentId < 100) {
                $studentId = '00' . $studentId;
            } elseif ($studentId < 1000) {
                $studentId = '0' . $studentId;
            }
        }

        $final_id_no = $year . $class_code . $studentId;

        return $final_id_no;
    }

    public static function getClassName($class_id)
    {
        $class = InsClass::find($class_id);
        $class_code = substr($class->code, 1);
        return $class_code;
    }

    public static function default_image()
    {
        return "https://png.pngtree.com/png-vector/20210129/ourlarge/pngtree-boys-default-avatar-png-image_2854357.jpg";
    }

    public static function default_signature_image()
    {
        return asset('signature.png');
    }

    public static function default_image_female()
    {
        return asset('uploads/avater2.png');
    }

    public static function default_image_male()
    {
        return asset('uploads/boy.png');
    }


    public static function banner_image()
    {
        return asset('uploads/banner2.jpg');
    }

    public static function teacher_image()
    {
        return asset('uploads/teacher.png');
    }

    public static function video_image()
    {
        return "https://thumbs.dreamstime.com/z/blogging-blog-concepts-ideas-worktable-blogging-blog-concepts-ideas-white-worktable-110423482.jpg";
    }
    public static function ins_image($item)
    {
        return asset('uploads/institutephoto/'.$item->image);
    }

    public static function all_teacher()
    {
        return Teacher::all();
    }


    public static function all_student()
    {
        return Student::all();
    }

    public static function class_subjects($id)
    {
        $subjects = InsClass::with('subjects')->findOrfail($id);
        return $subjects;
    }


    public static function getDomain(){
        $user   = Auth::user();
        $domain = $user->institute->domain;
        return $domain;
    }


    public static function getInstituteId(){

        if(isset($_SERVER['HTTP_HOST']) && !empty($_SERVER['HTTP_HOST'])){
            $currentUrl = str_replace('www.','',$_SERVER['HTTP_HOST']) ?? env('APP_URL');
        }else{
            $currentUrl =  env('APP_URL');
        }
        $ins = Institution::where('domain',$currentUrl)->first();
        return $ins->id ?? 1;
    }
    public static function getTemplate(){

        return DB::table('ins_templates')
             ->join('institution_template', 'institution_template.template_id', 'ins_templates.id')
             ->where('institution_template.institution_id', Helper::getInstituteId())
             ->first()->path_name ?? 'theme1';
    }

    public static function institute_info()
    {
        return Institution::find(Helper::getInstituteId());
    }

    public static function smsBalance()
    {
        return StockSms::where('institute_id',Helper::getInstituteId())->first();
    }

    public static function academic_setting()
    {
        return AcademicSetting::where('institute_id',Helper::getInstituteId())->first();
    }


    public static function school_info()
    {
        return SchoolInfo::where('institute_id',Helper::getInstituteId())->first();
    }

    // send SMS from API

    public static function sd_send_sms_api($number, $message): bool
    {
        $sms_api_key=env('SMS_API_KEY');
        $sms_secret_key=env('SMS_SECRET_KEY');
        $sms_sender_id=env('SMS_SENDER_ID');

        $stock_sms = StockSms::where('institute_id',Helper::getInstituteId())->first();

        if($stock_sms->total_balance > 0){

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'http://188.138.41.146:7788/sendtext?apikey='. $sms_api_key .'&secretkey=' . $sms_secret_key . '&callerID=' . $sms_sender_id . '&toUser=' . $number . '&messageContent=' . urlencode($message),
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => false,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json'
                ),
            ));

            $response = curl_exec($curl);
            $responseToJson = json_decode($response, true);

            curl_close($curl);

            if ($responseToJson['Text'] != "ACCEPTD" && $responseToJson['Status'] != 0) {
                return false;
            }

            return true;

        }else{
            return false;
        }

    }


    public static function getCustomerInfo(){
        return [
            'currency' => 'BDT',
            "discount_amount" => 0,
            "disc_percent" => 0,
            "customer_address" => "Dhaka",
            "customer_city" => "Dhaka",
            "customer_state" => "Dhaka",
            "customer_postcode" => 1216,
            "customer_country" => "BD"
        ];
    }


    public static function institutePaymentMethod(){
        $institute = Institution::find(self::getInstituteId());
        return $institute->payment_method;
    }


    public static function convertNumberFormat($amount){
        return number_format($amount,2);
    }


    // get SMS balance from API

    // public static function sd_send_balance_api(): string
    // {

    //     $sms_api_key=env('SMS_API_KEY');
    //     $sms_secret_key=env('SMS_SECRET_KEY');
    //     $sms_sender_id=env('SMS_SENDER_ID');
    //     $curl = curl_init();

    //     curl_setopt_array($curl, array(
    //         CURLOPT_URL => 'http://bangladeshsms.com/miscapi/' . $sms_api_key . '/getBalance',
    //         CURLOPT_RETURNTRANSFER => true,
    //         CURLOPT_ENCODING => '',
    //         CURLOPT_MAXREDIRS => 10,
    //         CURLOPT_TIMEOUT => 0,
    //         CURLOPT_FOLLOWLOCATION => false,
    //         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //         CURLOPT_CUSTOMREQUEST => 'GET'
    //     ));

    //     $response = curl_exec($curl);

    //     curl_close($curl);

    //     return preg_replace('/[^0-9.]+/', '', $response);
    // }


         public static function sd_shurjopay_integration($data)
         {


             $payment_url = sd_application_setting('shurjopay_test') == 'test' ? 'https://sandbox.shurjopayment.com' : 'https://engine.shurjopayment.com';
             $api_url = $payment_url . '/api/get_token';

             $curl = curl_init();

             curl_setopt_array($curl, array(
                 CURLOPT_URL => $api_url,
                 CURLOPT_RETURNTRANSFER => true,
                 CURLOPT_ENCODING => '',
                 CURLOPT_MAXREDIRS => 10,
                 CURLOPT_TIMEOUT => 0,
                 CURLOPT_FOLLOWLOCATION => false,
                 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                 CURLOPT_CUSTOMREQUEST => 'POST',
                 CURLOPT_POSTFIELDS => array('username' => sd_application_setting('shurjopay_merchant_username'),'password' => sd_application_setting('shurjopay_merchant_password'))
             ));

             $response = curl_exec($curl);

             $err = curl_error($curl);
             $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
             $curlErrorNo = curl_errno($curl);
             curl_close($curl);

             $response_json = json_decode($response, true);

             if ($code == 200 & !($curlErrorNo)) {
                 return sd_payment_curl($response_json, $data);
             }

             return 'cURL Error #:' . $err;
         }


     //Payment Curl

         public static function sd_payment_curl($response, $data)
         {
             $curl = curl_init();

             curl_setopt_array($curl, array(
                 CURLOPT_URL => $response['execute_url'],
                 CURLOPT_RETURNTRANSFER => true,
                 CURLOPT_ENCODING => '',
                 CURLOPT_MAXREDIRS => 10,
                 CURLOPT_TIMEOUT => 0,
                 CURLOPT_FOLLOWLOCATION => false,
                 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                 CURLOPT_CUSTOMREQUEST => 'POST',
                 CURLOPT_POSTFIELDS => array('token' => $response['token'],'store_id' => $response['store_id'],'prefix' => sd_application_setting('shurjopay_merchant_key_prefix'),'currency' => 'BDT','return_url' => route('package.payment.redirect'),'cancel_url' => url('dashboard'),'amount' => $data["package_price"],'order_id' => sd_application_setting('shurjopay_merchant_key_prefix') . sd_generate_username_prefix() . sd_generate_random_password(7),'customer_name' => $data["user"]->name,'customer_phone' => $data["user"]->mobile_number,'customer_address' => $data["customer_address"],'customer_city' => $data["customer_city"],'value1' => $data["package_info"]->id,'value2' => $data['description'],'value3' => $data["user"]->id, 'client_ip' => $data["client_ip"]),
             ));

             $res = curl_exec($curl);

             $err = curl_error($curl);
             $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
             $curlErrorNo = curl_errno($curl);
             curl_close($curl);

             $response_json = json_decode($res, true);

             if ($code == 200 & !($curlErrorNo)) {
                 return ['response' => $response_json, 'token' => $response['token']];
             }

             return 'cURL Error #:' . $err;
         }

}



