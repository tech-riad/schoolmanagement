<?php

namespace App\Imports;


use Illuminate\Support\Collection;

use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\Importable;

use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\WithValidation;


class TeacherImport implements ToCollection,WithValidation
{
    use Importable;

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    // public function model(array $row)
    // {

    //     return $row;
    //     // return new Admission([

    //     //     'roll_no' => $row[0],
    //     //     'name' => $row[1],
    //     //     'gender' => $row[2],
    //     //     'religion' => $row[3],
    //     //     'father_name' => $row[4],
    //     //     'mother_name' => $row[5],
    //     //     'mobile_number' => $row[5],
    //     //     'class_id'  =>1,
    //     //     'session_id'=>1
    //     //     // 'class_id'  =>  $request->class_id,
    //     //     // 'session_id'  =>  $request->academic_year_id,
    //     //     // 'group_id' => $request->group_id,
    //     //     // 'category_id' => $request->category_id,
    //     //     // 'section_id' => $request->section_id,

    //     // ]);
    // }

    public function collection(Collection $rows)
    {
        return $rows;
    }

    public function rules(): array
    {
        return [
            '0' => 'required|numeric',
            '1' => 'required|string',
            '2' => 'required|string',
            '3' => 'required|string',
        ];
    }
}
