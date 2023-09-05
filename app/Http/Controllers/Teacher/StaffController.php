<?php

namespace App\Http\Controllers\Teacher;

use App\Exports\StaffsExport;
use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Designation;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class StaffController extends Controller
{
    public function index()
    {
        $staffs = Teacher::where('type', 'staff')->get();
        return view($this->backendTemplate['template']['path_name'].'.teachers.staff.index', compact('staffs'));
        
    }


    public function create()
    {
        $branches     = Branch::all();
        $designations = Designation::all();
        $table_number = 1;
        return view($this->backendTemplate['template']['path_name'].'.teachers.staff.create', compact('branches', 'designations', 'table_number'));
    }


    public function getNumberOfTable(Request $request)
    {

        $table_number = $request->table_number;
        $branches = Branch::all();
        $designations = Designation::all();
        return view($this->backendTemplate['template']['path_name'].'.teachers.staff.create', compact('branches', 'designations', 'table_number'));
    }


    public function store(Request $request)
    {

        $data = $request->all();

        if (!empty($data['check'])) {
            $count_array = count($data['check']);
            for ($i = 0; $i < $count_array; $i++) {
                $teacher                 = new Teacher;
                $teacher->id_no          = Helper::generateTeacherId();
                $teacher->name           = $data['name'][$i];
                $teacher->type           = 'staff';
                $teacher->photo          = 'default.png';
                $teacher->mobile_number  = $data['mobile_number'][$i];
                $teacher->designation_id = $data['designation_id'][$i];
                $teacher->branch_id      = $data['branch_id'][$i];
                $teacher->save();
            }
        } else {
            return redirect()->route('staff.index');
        }

        $notification = array(
            'message' =>' Successfull ',
            'alert-type' =>'success'
        );

        return redirect()->route('staff.index')
            ->with($notification);
    }

    public function exportStaffs()
    {
        return Excel::download(new StaffsExport, 'staffs.xlsx');
    }
}
