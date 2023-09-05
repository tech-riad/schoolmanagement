<?php

namespace App\Http\Controllers\Accounts;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\Fees;
use App\Models\StudentFees;
use App\Models\FeesDetail;
use Illuminate\Http\Request;
use App\Models\FeesType;
use App\Models\Student;
use App\Models\User;
use App\Models\Session;
use App\Models\InsClass;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpSpreadsheet\Calculation\DateTimeExcel\Month;
use App\Models\Session as StdSession;
class AccountsFeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function studentindex()
    {
        $fees     = StudentFees::all();
        $feesType = FeesType::all();
        return view($this->backendTemplate['template']['path_name'].'.accountsmanagement.fees.index',compact('fees','feesType'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function studentcreate()
    {
        $feesType = FeesType::all();
        $students = Student::all();
        $months   = Helper::months();
        return view ($this->backendTemplate['template']['path_name'].'.accountsmanagement.fees.create',compact('feesType','months', 'students'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function studentstore(Request $request)
    {

        $studentFee = StudentFees::create([
                            'student_id'      => $request->student_id,
                            'fees_type_id'    => $request->fees_type_id,
                            'title'           => $request->title,
                            'date'            => $request->date,
                            'month'           => $request->month,
                            'year'            => date("Y"),
                            'due_date'        => $request->due_date,
                        ]);

        $total = 0;
        foreach($request->check as $key => $ch)
        {
            $total += $request->amount[$ch];
            $studentFee->feeDetails()->create([
                'head'   => $request->head[$ch],
                'amount' => $request->amount[$ch],
            ]);
        }

        $studentFee->update([
            'total_amount' => $total
        ]);

       return redirect()->route('accountsmanagement.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fees  $fees
     * @return \Illuminate\Http\Response
     */
    public function studentshow(Fees $fees)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fees  $fees
     * @return \Illuminate\Http\Response
     */
    public function studentedit($id)
    {
        $feesType = FeesType::all();
        $students = Student::all();
        $fees = StudentFees::find($id);
        $months   = Helper::months();
        return view($this->backendTemplate['template']['path_name'].'.accountsmanagement.fees.create', compact('feesType','students','fees','months'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fees  $fees
     * @return \Illuminate\Http\Response
     */
    public function studentupdate(Request $request, $id)
    {
        $fees = StudentFees ::find($id);
        $fees->user_id=$request->user_id;
        $fees->student_id=$request->student_id;
        $fees->fees_type_id=$request->fees_type_id;
        $fees->title=$request->title;
        $fees->date=$request->date;
        $fees->month=$request->month;
        $fees->due_date=$request->due_date;
        $fees->save();

        $total=0;
        foreach($request->head as $key => $h)
        {
            FeesDetail::create([
                'fees_id' => $fees->id,
                'head' => $request->head[$key],
                'amount' => $request->amount[$key],
            ]);
            $total +=$request->amount[$key];
        }

       $fees->total_amount=$total;
       $fees->save();

        $fees->save();
        return redirect()->route('accountsmanagement.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fees  $fees
     * @return \Illuminate\Http\Response
     */
    public function studentdestroy(Fees $fees)
    {
        //
    }

    // General Controller
    public function generalindex()
    {
        $fees = Fees::with('student')->get();
        return view($this->backendTemplate['template']['path_name'].'.accountsmanagement.fees.generalstudent.index',compact('fees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generalcreate()
    {
        $academic_years = StdSession::all();
        $users      = User::all();
        $session    = Session::all();
        $feesType   = FeesType::all();
        $class      = InsClass::all();
        $categories = Category::all();
        $months     = Helper::months();

        return view ($this->backendTemplate['template']['path_name'].'.accountsmanagement.fees.generalstudent.create',compact('academic_years','months','feesType', 'users','session','class','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function generalstore(Request $request)
    {
        //dd($request->all());


        $regularFee = Fees::create([
                        'session_id'   => $request->academic_year_id,
                        'class_id'     => $request->class_id,
                        'category_id'  => $request->category_id,
                        'fees_type_id' => $request->fees_type_id,
                        'title'        => $request->title,
                        'date'         => $request->date,
                        'month'        => $request->month,
                        'year'         => date("Y"),
                        'due_date'     => $request->due_date,
                    ]);

        $total = 0;
        foreach($request->check as $key => $ch)
        {
            $total += $request->amount[$ch];
            $regularFee->feeDetails()->create([
                'head' => $request->head[$ch],
                'amount' => $request->amount[$ch]
            ]);
        }

        $regularFee->update([
            'total_amount' => $total
        ]);

        return redirect()->route('accountsmanagement.general.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fees  $fees
     * @return \Illuminate\Http\Response
     */
    public function generalshow(Fees $fees)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fees  $fees
     * @return \Illuminate\Http\Response
     */
    public function generaledit($id)
    {
        $feesType = FeesType::all();
        $students = Student::all();
        $academic_years = Session::all();
        $class = InsClass::all();
        $categories = Category::all();
        $fees = Fees::find($id);
        $months   = Helper::months();
        return view($this->backendTemplate['template']['path_name'].'.accountsmanagement.fees.generalstudent.create', compact('months','feesType','students','fees','academic_years','class','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fees  $fees
     * @return \Illuminate\Http\Response
     */
    public function generalupdate(Request $request, $id)
    {

        $fees = Fees ::find($id);
        $fees->user_id=$request->user_id;

        $fees->fees_type_id=$request->fees_type_id;
        $fees->title=$request->title;
        $fees->date=$request->date;
        $fees->month=$request->month;
        $fees->due_date=$request->due_date;
        $fees->total_amount=$request->total_amount;

        $fees->save();
        return redirect()->route('accountsmanagement.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fees  $fees
     * @return \Illuminate\Http\Response
     */
    public function generaldestroy(Fees $fees)
    {
        //
    }
}
