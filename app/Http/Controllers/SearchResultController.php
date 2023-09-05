<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Exam;
use App\Models\Group;
use App\Models\InsClass;
use App\Models\Section;
use App\Models\Session;
use App\Models\Shift;
use Illuminate\Http\Request;

class SearchResultController extends Controller
{
    public function result(Request $request)
    {
        $data['academic_year'] = Session::find($request->academic_year_id);
        $data['category']      = Category::find($request->category_id);
        $data['class']         = InsClass::find($request->class_id);
        $data['exam']          = Exam::find($request->exam_id);
        $data['group']         = Group::find($request->group_id);
        $data['section']       = Section::find($request->section_id);
        $data['shifts']        = Shift::find($request->shift_id);

        return response()->json($data);

        
    }
}
