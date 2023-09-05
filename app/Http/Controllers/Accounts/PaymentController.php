<?php

namespace App\Http\Controllers\Accounts;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Fees;
use App\Models\Section;
use App\Models\Session;
use App\Models\Student;
use App\Models\StudentFeeReceived;
use App\Models\StudentFees;
use App\Models\Transaction;
use App\Services\FeeReceivedService;
use App\Services\TransactionService;
use Illuminate\Http\Request;
use App\Models\Session as StdSession;

class PaymentController extends Controller {

    private $service;

    public function __construct(FeeReceivedService $feeReceivedService) {
        $this->service = $feeReceivedService;

        parent::__construct();
    }

    public function index() {
        $academic_years = StdSession::all();
        $categories = Category::all();
        $months = Helper::months();
        return view($this->backendTemplate['template']['path_name'] . '.accountsmanagement.payment.index', compact('academic_years', 'categories', 'months'));
    }

    public function getPayments(Request $request) {
        $section = Section::find($request->section_id);
        $classId = $section->ins_class_id;
        $shiftId = $section->shift_id;
        $groupId = $request->group_id;

        if ($request->category_id) {
            $getStudents = Student::with('ins_class', 'shift', 'section', 'category')->where('session_id', $request->session_id)
                            ->where('shift_id', $shiftId)
                            ->where('group_id', $groupId)
                            ->where('section_id', $request->section_id)
                            ->where('class_id', $classId)
                            ->where('category_id', $request->category_id)
                            ->get()->map(function ($item) use ($request) {
                return [
            'id' => $item->id,
            'id_no' => $item->id_no,
            'roll_no' => $item->roll_no,
            'name' => $item->name,
            'class' => $item->ins_class->name,
            'shift' => $item->shift->name,
            'section' => $item->section->name,
            'category' => $item->category->name,
            'month' => $request->month,
            'regular_fee' => $this->service->getRegularFees($item),
            'student_fee' => $this->service->getStudentFees($item),
            'total' => $this->service->getRegularFees($item) + $this->service->getStudentFees($item),
            'status' => $this->service->checkPaymentStatus($item),
                ];
            });
        } else {
            $getStudents = Student::with('ins_class', 'shift', 'section', 'category')->where('session_id', $request->session_id)
                            ->where('shift_id', $shiftId)
                            ->where('group_id', $groupId)
                            ->where('section_id', $request->section_id)
                            ->where('class_id', $classId)
                            ->get()->map(function ($item) use ($request) {
                return [
            'id' => $item->id,
            'id_no' => $item->id_no,
            'roll_no' => $item->roll_no,
            'name' => $item->name,
            'class' => $item->ins_class->name,
            'shift' => $item->shift->name,
            'section' => $item->section->name,
            'category' => $item->category,
            'month' => $request->month,
            'regular_fee' => $this->service->getRegularFees($item),
            'student_fee' => $this->service->getStudentFees($item),
            'total' => $this->service->getRegularFees($item) + $this->service->getStudentFees($item),
            'status' => $this->service->checkPaymentStatus($item),
                ];
            });
        }
        return $getStudents;
    }

    public function storeTransactions(Request $request) {

        $student = Student::find($request->student_id);

        $feeReceived = StudentFeeReceived::create([
                    'date' => date('Y-m-d'),
                    'student_id' => $request->student_id,
                    'month' => $request->month,
                    'year' => date('Y'),
                    'total' => $request->total,
                    'status' => 1
        ]);

        //get regular fees
        $regularFees = Fees::where('class_id', $student->class_id)
                        ->where('category_id', $student->category_id)
                        ->where('month', $request->month)->get();

        if ($regularFees->count() > 0) {

            foreach ($regularFees as $regularFee) {
                $regularFee->fees_received_details()->create([
                    'student_fee_received_id' => $feeReceived->id,
                    'amount' => $regularFee->total_amount
                ]);
            }
        }

        //get Student fees
        $studentFees = StudentFees::where('student_id', $student->id)->where('month', $request->month)->get();

        if ($studentFees->count() > 0) {

            foreach ($studentFees as $studentFee) {
                $studentFee->fees_received_details()->create([
                    'student_fee_received_id' => $feeReceived->id,
                    'amount' => $studentFee->total_amount
                ]);
            }
        }

        //journal entry
        $transaction = new TransactionService($feeReceived);
        $transaction->feeReceived();

        return response()->json(['status' => 200]);
    }

    /*
      |--------------------------------------------------------------------------
      | GET ALL PAYMENT DETAILS
      |--------------------------------------------------------------------------
     */

    public function viewPayments(Request $request) {

        $student = Student::with('ins_class', 'shift', 'section')->find($request->student_id);
        $regular_fees = Fees::select('id', 'title', 'date', 'month', 'year', 'total_amount')->where('session_id', $student->session_id)
                        ->where('class_id', $student->class_id)
                        ->where('category_id', $student->category_id)
                        ->where('month', $request->month)
                        ->get()->toArray();

        $student_fees = StudentFees::select('id', 'title', 'date', 'month', 'year', 'total_amount')->where('student_id', $student->id)
                        ->where('month', $request->month)
                        ->get()->toArray();

        $result = array_merge($regular_fees, $student_fees);
        $data['payments'] = $result;
        $data['student'] = $student;

        return response()->json($data);
    }

}
