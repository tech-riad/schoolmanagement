<?php

namespace App\Http\Controllers\Accounts;

use App\Http\Controllers\Controller;
use App\Models\Fees;
use App\Models\FeesType;
use App\Models\Scholarship;
use App\Models\ScholarshipDetail;
use App\Models\Student;
use Illuminate\Http\Request;

class ScholershipController extends Controller
{
    public function index(){
        $scholarships = Scholarship::latest('id')->get();
        return view($this->backendTemplate['template']['path_name'].'.accountsmanagement.scholarship.index',compact('scholarships'));
    }


    public function create(){
        $feetypes = FeesType::all();
        $students = Student::all();
        return view($this->backendTemplate['template']['path_name'].'.accountsmanagement.scholarship.create',compact('feetypes','students'));
    }

    public function store(Request $request){


        $exists = Scholarship::where('fees_type_id',$request->fees_type_id)->where('student_id',$request->student_id)->get();

        if($exists->count() > 0){
            //notification
            $notification = array(
                'message' =>'Already Assigned',
                'alert-type' =>'error'
            );
            return redirect()->back()->with($notification);

        }
        else{

            $scholarship = Scholarship::create([
                'fees_type_id' => $request->fees_type_id,
                'student_id' => $request->student_id,
                'note' => $request->note,
            ]);
            foreach($request->fees_id as $key => $feesId){
                ScholarshipDetail::create([
                    'scholarship_id'  => $scholarship->id,
                    'fees_id'         => $feesId,
                    'month'           => $request->months[$key],
                    'year'            => date('Y'),
                    'discount'        => $request->discount[$key],
                ]);
            }
        }




        return redirect()->route('scholarship.index');
    }


    public function getFeeDetails(Request $request){

        $student = Student::find($request->student_id);
        $fees = Fees::where('fees_type_id',$request->fees_type_id)
                ->where('session_id',$student->session_id)
                ->where('class_id',$student->class_id)
                ->where('category_id',$student->category_id)
                ->get();

        return $fees;

    }


    public function getScholarshipDetails(Request $request){
        $details = ScholarshipDetail::with('fees')->where('scholarship_id',$request->scholarship_id)->get();
        return $details;
    }
}
