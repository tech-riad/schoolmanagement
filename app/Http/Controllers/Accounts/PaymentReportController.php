<?php

namespace App\Http\Controllers\Accounts;

use App\Http\Controllers\Controller;
use App\Helper\Helper;
use App\Models\Category;
use App\Models\Fees;
use App\Models\Section;
use App\Models\Session;
use App\Models\Student;
use App\Models\StudentFees;
use App\Models\TransactionDetail;
use App\Services\FeeReceivedService;
use App\Services\FeesCalculateService;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PaymentReportController extends Controller {

    private $service;
    private $feesCalculate;

    public function __construct(FeeReceivedService $feeReceivedService, FeesCalculateService $feesCalculateService) {
        parent::__construct();
        $this->service = $feeReceivedService;
    }

    public function index() {
        $sessions = Session::all();
        $sections = Section::where('institute_id', Helper::getInstituteId())->get();
        $categories = Category::all();
        $months = Helper::months();
        return view($this->backendTemplate['template']['path_name'] . '.accountsmanagement.reports.paid-report', compact('sessions', 'sections', 'categories', 'months'));
    }

    public function unpaid() {
        $sessions = Session::all();
        $sections = Section::where('institute_id', Helper::getInstituteId())->get();
        $categories = Category::all();
        $months = Helper::months();
        return view($this->backendTemplate['template']['path_name'] . '.accountsmanagement.reports.unpaid-report', compact('sessions', 'sections', 'categories', 'months'));
    }

    public function paidReport(Request $request) {

        $section = Section::find($request->section_id);
        $classId = $section->ins_class_id;
        $shiftId = $section->shift_id;

        $getStudents = Student::with('ins_class', 'shift', 'section', 'category')->where('session_id', $request->session_id)
                        ->where('shift_id', $shiftId)
                        ->where('section_id', $request->section_id)
                        ->where('class_id', $classId)
                        ->where('category_id', $request->category_id)
                        ->get()->map(function ($item) use ($request) {
            return [
        'id' => $item->id,
        'id_no' => $item->id_no,
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

        return response()->json($getStudents->where('status', 'Paid'));
    }

    public function unpaidReport(Request $request) {

        $section = Section::find($request->section_id);
        $classId = $section->ins_class_id;
        $shiftId = $section->shift_id;

        $getStudents = Student::with('ins_class', 'shift', 'section', 'category')->where('session_id', $request->session_id)
                        ->where('shift_id', $shiftId)
                        ->where('section_id', $request->section_id)
                        ->where('class_id', $classId)
                        ->where('category_id', $request->category_id)
                        ->get()->map(function ($item) use ($request) {
            return [
        'id' => $item->id,
        'id_no' => $item->id_no,
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

        return response()->json($getStudents->where('status', 'Unpaid'));
    }

    public function downloadReport(Request $request, $id, $month) {

        $student = Student::find($id);
       // $regularFees = $this->feesCalculate->regular_fees($student, $month);

        $data = [];
        $key = 0;
        $key2 = 0;

        /*
          foreach ($regularFees as $regFee) {
          foreach ($regFee->feeDetails as $item) {
          $key++;
          $data['regular_fees'][$key] = $item;
          }
          }

          $student_fees = $this->feesCalculate->student_fees($student, $month);

          foreach ($student_fees as $studentFee) {
          foreach ($studentFee->feeDetails as $fee) {
          $key2++;
          $data['student_fees'][$key2] = $fee;
          }
          }
         * 
         */



        $pdf = Pdf::loadView($this->backendTemplate['template']['path_name'].'.accountsmanagement.payment.invoice', compact('student', 'data'))->setOptions(['defaultFont' => 'sans-serif', 'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        return $pdf->download('invoice.pdf');
    }
}
