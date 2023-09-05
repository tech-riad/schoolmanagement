<?php

namespace App\Exports;

use App\Models\Teacher;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StaffsExport implements FromCollection, WithHeadings
{
    public $headings = [
        'Id No',
        'Name',
        'Gender',
        'Branch',
        'Designation',
        'Phone',
    ];


    public function collection()
    {
        $teachers = Teacher::with('branch','designation')->where('type','staff')->get()->toArray();

        $array = [];
        foreach($teachers as $teacher){
            array_push($array,[
                    'Id No'        => $teacher['id_no'],
                    'Name'         => $teacher['name'],
                    'Gender'       => $teacher['gender'],
                    'Branch'       => $teacher['branch']['title'],
                    'Designation'  => $teacher['designation']['title'],
                    'Phone'        => $teacher['mobile_number'],
            ]);
        }
        return collect($array);
    }


    public function headings() : array
    {
        return $this->headings;
    }
}
