<?php

namespace App\Http\Controllers\Accounts;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\Fees;
use App\Models\FeesType;
use App\Models\InsClass;
use App\Models\Section;
use App\Models\Session;
use FontLib\TrueType\Collection;
use Illuminate\Http\Request;

class FeesSetupController extends Controller
{
    public function index(){
        $academic_years = Session::all();
        $feesTypes      = FeesType::all();
        $months         = Helper::months();
        return view($this->backendTemplate['template']['path_name'].'.accountsmanagement.fees-setup.index',compact('academic_years','feesTypes','months'));
    }


    public function store(Request $request)
    {

        $session = Session::find($request->academic_year_id);
        $class   = InsClass::with('categories')->find($request->class_id);
        $data    = $request->all();

        foreach ($request->fees_type as $key => $feesType){

            if(!$data['category_id']){
                foreach($class->categories as $category){
                    $regularFee = Fees::updateOrCreate([
                        'session_id'   =>  $session->id,
                        'class_id'     =>  $request->class_id,
                        'category_id'  =>  $category->id,
                        'group_id'     =>  $request->group_id ?? null,
                        'fees_type_id' =>  $feesType,
                        'title'        =>  $request->title[$key],
                        'date'         =>  $session->title.'-'.$request->month[$key].'-'.'01',
                        'month'        =>  $request->month[$key],
                        'year'         =>  $session->title,
                        'due_date'     =>  $request->due_date[$key],
                        'total_amount' =>  array_sum($data['amount-'.$feesType]),
                    ]);

                    foreach($data['head-'.$feesType] as $key2 =>  $feeHead){
                        $regularFee->feeDetails()->create([
                            'head'   => $feeHead,
                            'amount' => $data['amount-'.$feesType][$key2],
                        ]);
                    }

                }
            }
            else{
                $regularFee = Fees::updateOrCreate([
                    'session_id'   =>  $session->id,
                    'class_id'     =>  $request->class_id,
                    'category_id'  =>  $request->category_id,
                    'group_id'     =>  $request->group_id ?? null,
                    'fees_type_id' =>  $feesType,
                    'title'        =>  $request->title[$key],
                    'date'         =>  '08-02-2023',
                    'month'        =>  $request->month[$key],
                    'year'         =>  $session->title,
                    'due_date'     =>  $request->due_date[$key],
                    'total_amount' =>  array_sum($data['amount-'.$feesType]),
                ]);
                foreach($data['head-'.$feesType] as $key2 =>  $feeHead){
                    $regularFee->feeDetails()->create([
                        'head'   => $feeHead,
                        'amount' => $data['amount-'.$feesType][$key2],
                    ]);
                }
            }


        }

        //notification
        $notification = array(
            'message' =>'Fees Setup Successfully ',
            'alert-type' =>'success'
        );
        return redirect()->route('accountsmanagement.general.index')->with($notification);
    }


    public function edit(){
        $academic_years = Session::all();
        $feesTypes      = FeesType::all();
        $months         = Helper::months();
        return view($this->backendTemplate['template']['path_name'].'.accountsmanagement.fees-setup.edit',compact('academic_years','feesTypes','months'));
    }


    public function deleteFees($request){

        $fees = Fees::with('feeDetails')->where('session_id',$request->academic_year_id)->where('class_id',$request->class_id)->get();
        foreach($fees as $fee){
            $fee->feeDetails()->delete();
            $fee->delete();
        }
    }


    public function getFeesData(Request $request){

        $section = Section::find($request->section_id);


        $data['fees']      = Fees::with('feeDetails')->where('class_id',$section->ins_class_id)->get();
        $data['fees_type'] = FeesType::all();
        $data['months'] = Helper::getMonths();

        return $data;
    }
}
