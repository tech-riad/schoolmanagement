<?php

namespace App\Http\Controllers\ExamManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\MarksInputExport;
use App\Models\ClassSubject;
use App\Models\InsClass;
use App\Models\Session;
use App\Models\Exam;
use App\Models\Student;
use App\Models\StudentMarksInput;
use App\Models\StudentMarksInputDetail;
use App\Models\StudentSubjectAssign;
use App\Models\Subject;
use App\Models\SubMarksDist;
use Maatwebsite\Excel\Facades\Excel;

class ExamDashboardController extends Controller
{
    public function index(){
    	$academic_years = Session::all();
        $exams=Exam::all();
        return view($this->backendTemplate['template']['path_name'].'.exammanagement.dashboard.index',compact('academic_years'),compact('exams'));
    }
}
