<?php

namespace App\Services;

use App\Models\Fees;
use App\Models\Student;
use App\Models\StudentFees;
use PhpParser\Node\Expr\FuncCall;

class FeesService
{
    public $studentId;

    public function __construct($studentId)
    {
        $this->studentId = $studentId;
    }


    public function getRegularFees()
    {
        $student = Student::find($this->studentId);
        $fees    = Fees::where('session_id', $student->session_id)
            ->where('class_id', $student->class_id)
            ->where('category_id', $student->category_id)
            ->get();
        return $fees;
    }


    public function getRegularFeesByMonth($month, $year)
    {

        $student = Student::find($this->studentId);

        $query = Fees::where('session_id', $student->session_id)
                ->where('class_id', $student->class_id)
                ->where('month', $month)
                ->where('category_id', $student->category_id);

        if ($year) {
            $query->where('year', $year);
        }

        $fees = $query->get();
        return $fees;
    }


    public function getStudentFeesByMonth($month, $year)
    {

        $query = StudentFees::where('student_id', $this->studentId)
            ->where('month', $month);
        if ($year) {
            $query->where('year', $year);
        }
        $fees = $query->get();
        return $fees;
    }
}
