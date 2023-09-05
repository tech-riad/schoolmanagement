<?php

namespace Database\Seeders;

use App\Helper\Helper;
use App\Models\Category;
use App\Models\Group;
use App\Models\InsClass;
use App\Models\Section;
use App\Models\Session;
use App\Models\Shift;
use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $students  = [  "Sajid Hasan","Munna Hasan","Nafiz Ahmed","Emon Hasan","Zakir Hasan",
                       "Ismail Shekh","Hasan Ahmed","Ishrak Khan","Peyal Hasan","Afif Mozumder"
                     ];

        $session    = Session::with('section')->first();

        $sections   = $session->section;
        //dd($sections);

        foreach ($sections as $section){

            foreach($students as $index => $student){
                Student::create([
                    'id_no'         => Helper::studentIdGenerate($session->id,$section->ins_class_id),
                    'name'          => $student,
                    'finger_id'     => rand(1000,10000),
                    'session_id'    => $session->id,
                    'class_id'      => $section->ins_class_id,
                    'shift_id'      => $section->shift_id,
                    'section_id'    => $section->id,
                    'religion'      => 'Islam',
                    'mobile_number' => '01683813854',
                    'father_name'   => 'Rafiq Khan',
                    'mother_name'   => 'Nilima Hasan',
                    'roll_no'       => '10'.$index,
                    'gender'        => rand(0, 1) ? 'male' : 'female'
                ]);
            }
        }



    }
}
