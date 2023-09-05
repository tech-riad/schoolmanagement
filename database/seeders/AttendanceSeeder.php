<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teachers = Teacher::all();
        $students = Student::take(20)->get();

        for($i = 1; $i <=  date('t'); $i++)
        {
            $dates[] = date('Y') . "-" . date('m') . "-" . str_pad($i, 2, '0', STR_PAD_LEFT);
        }

        foreach($dates as $date){

            foreach($teachers as $teacher){
                $teacher->attendance()->updateOrCreate([
                    'date'       => $date,
                    'finger_id'  => $teacher->finger_id ?? rand(1000, 2000),
                    'in_time'    => rand(0,23).":".str_pad(rand(0,59), 2, "0", STR_PAD_LEFT),
                    'out_time'   => rand(0,23).":".str_pad(rand(0,59), 2, "0", STR_PAD_LEFT),
                    'status'     => rand(0,1) ? 'present':'absent'
                ]);
            }

            foreach($students as $student){

                $student->attendance()->updateOrCreate([
                    'date'       => $date,
                    'finger_id'  => $student->finger_id ?? rand(1000, 2000),
                    'in_time'    => rand(0,23).":".str_pad(rand(0,59), 2, "0", STR_PAD_LEFT),
                    'out_time'   => rand(0,23).":".str_pad(rand(0,59), 2, "0", STR_PAD_LEFT),
                    'status'     => rand(0,1) ? 'present':'absent'
                ]);
            }



        }


    }
}
