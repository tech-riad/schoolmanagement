<?php

namespace Database\Seeders;
use App\Models\Fees;
use App\Models\Student;
use App\Models\StudentFees;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Fees::UpdateOrCreate([
            'session_id'=>'1',
            'class_id'=>'1',
            'category_id'=>'1',
            'fees_type_id'=>'1',
            'title'=>'Fees',
            'date'=>'2022/12/19',
            'month'=>'1',
            'year'=>'2022',
            'due_date'=>'2022/12/19',
            'total_amount'=>'500',
        ]);
        Fees::UpdateOrCreate([
            'session_id'=>'1',
            'class_id'=>'1',
            'category_id'=>'1',
            'fees_type_id'=>'1',
            'title'=>'Fees',
            'date'=>'2022/12/19',
            'month'=>'1',
            'year'=>'2022',
            'due_date'=>'2022/12/19',
            'total_amount'=>'700',

        ]);
        Fees::UpdateOrCreate([
            'session_id'=>'1',
            'class_id'=>'1',
            'category_id'=>'1',
            'fees_type_id'=>'1',
            'title'=>'Fees',
            'date'=>'2022/12/19',
            'month'=>'1',
            'year'=>'2022',
            'due_date'=>'2022/12/19',
            'total_amount'=>'200',

        ]);

        $students = Student::get()->take(3);

        StudentFees::UpdateOrCreate([
            'student_id'=>$students[0]->id,
            'fees_type_id'=>'2',
            'title'=>'Fees',
            'date'=>'2022/12/19',
            'month'=>'1',
            'year'=>'2022',
            'due_date'=>'2022/12/19',
            'total_amount'=>'200',

        ]);
        StudentFees::UpdateOrCreate([
            'student_id'=>$students[1]->id,
            'fees_type_id'=>'2',
            'title'=>'Fees',
            'date'=>'2022/12/19',
            'month'=>'2',
            'year'=>'2022',
            'due_date'=>'2022/12/19',
            'total_amount'=>'500',

        ]);
        StudentFees::UpdateOrCreate([
            'student_id'=>$students[2]->id,
            'fees_type_id'=>'3',
            'title'=>'Fees',
            'date'=>'2022/12/19',
            'month'=>'2',
            'year'=>'2022',
            'due_date'=>'2022/12/19',
            'total_amount'=>'400',

        ]);
    }
}

