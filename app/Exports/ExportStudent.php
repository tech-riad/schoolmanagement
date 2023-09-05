<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportStudent implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public $headings = [
        'Id No',
        'Name',
        'Roll',
        'Class',
        'Phone',
        'Gender',
    ];

    public function collection()
    {
        $students = session()->get('students');
        $array = [];
        foreach($students as $student){
            array_push($array,[
                'id_no' => $student['id_no'],
                'name' => $student['name'],
                'roll_no' => $student['roll_no'],
                'class' => $student['ins_class']['name'],
                'mobile_number' => $student['mobile_number'],
                'gender' => $student['gender'],
            ]);
        }
        return collect($array);
    }

    public function headings() : array
    {
        return $this->headings;
    }
}
