<?php

namespace Database\Seeders;

use App\Models\AssignTeacher;
use Illuminate\Database\Seeder;


class TeacherAssignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teachers = \App\Models\Teacher::where('type','teacher')->get()->take(3);
        $sections = \App\Models\Section::get()->take(3);

        foreach ($teachers as $key => $teacher){
            AssignTeacher::create([
                'teacher_id' => $teacher->id,
                'section_id' => $sections[$key]['id'],
                'class_id' => $sections[$key]['ins_class_id'],
                'shift_id' => $sections[$key]['shift_id'],
            ]);
        }

    }
}
