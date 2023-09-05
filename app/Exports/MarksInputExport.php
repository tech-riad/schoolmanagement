<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MarksInputExport implements FromCollection, WithHeadings,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $students;

    public function __construct(array $data)
    {
        $this->students = $data;
    }

    public function collection()
    {
        //dd($this->students);
        $data = [];

        foreach ($this->students['students'] as $student){
            array_push($data,[
                'id_no'   => $student['id_no'],
                'name'    => $student['name'],
                'roll_no' => $student['roll_no'],
            ]);
        }

        return collect($data);
    }

    public function headings() : array
    {
        //dd($this->students['mark_dists']);
        $headings = [
            "STUDENT ID",
            "STUDENT NAME",
            "ROLL NO"
        ];
        foreach ($this->students['mark_dists'] as $mark_dist){
            $mDist = $mark_dist->subMarkDistType->title.' '.'('.$mark_dist->mark.'-'.$mark_dist->pass_mark.')';
            array_push($headings,$mDist);
        }
        return $headings;
    }
}
