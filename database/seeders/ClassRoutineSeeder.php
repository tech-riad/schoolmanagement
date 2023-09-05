<?php

namespace Database\Seeders;

use App\Models\ClassRoutine;
use App\Models\PeriodTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class ClassRoutineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $days    =  ['Saturday','Sunday','Monday','Tuesday','Wednesday','Thusday'];
        $periods   = PeriodTime::all();

        foreach($days as $key => $day){

            ClassRoutine::create([
                'class_id'       => 1,
                'section_id'     => 1,
                'shift_id'       => 1,
                'group_id'       => 1,
                'day'            => $day,
                'subject_id'     => rand(1,20),
                'period_time_id' => $periods[$key]['id'],
                'teacher_id'     => rand(1,5),
            ]);
        }

    }
}
