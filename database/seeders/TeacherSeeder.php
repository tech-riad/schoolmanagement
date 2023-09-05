<?php

namespace Database\Seeders;

use App\Models\Designation;
use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $teachers  = ['Hasan Alam','Tanvir Rahman','Imram Mahmud','Kamrul Hasan','Arifur Rahman'];
        $staffs    = ['Emon Alam','Ishak Rahman','Shimul Mahmud','Kamrul Hasan','Arifur Ahmed'];

        $designations = Designation::all();

        foreach($teachers as $teacher){
            Teacher::create([
                'name'           => $teacher,
                'type'           => "teacher",
                'finger_id'      => rand(1000,5000),
                'gender'         => rand(0,1)? 'male':'female',
                'id_no'          =>  rand(1000,5000),
                'mobile_number'  => "01588464864",
                'designation_id' => $designations[0]->id,

            ]);
        }

        foreach($staffs as $staff){
            Teacher::create([
                'name'           => $staff,
                'type'           => "staff",
                'finger_id'      => rand(2000,5000),
                'gender'         => rand(0,1)? 'male':'female',
                'id_no'          =>  rand(2000,5000),
                'mobile_number'  => "01588464864",
                'designation_id' =>  $designations[1]->id,

            ]);
        }



        Teacher::create([
            'name'           => "Air Vice Marshal Md. Zahidur Rahman, BSP, GUP, nswc, psc",
            'type'           => "committee",
            'finger_id'      => rand(3000,5000),
            'gender'         => rand(0,1)? 'male':'female',
            'id_no'          => rand(3000,5000),
            'mobile_number'  => "01588464864",
            'designation_id' =>  $designations[2]->id,

        ]);
        Teacher::create([
            'name'           => "Group Captain Md. Abdul Ahad, BPM, psc",
            'type'           => "committee",
            'finger_id'      => rand(3000,5000),
            'gender'         => rand(0,1)? 'male':'female',
            'id_no'          => rand(3000,5000),
            'mobile_number'  => "01588464864",
            'designation_id' =>  $designations[3]->id,

        ]);

        Teacher::create([
            'name'           => "Principal, BAF Shaheen College Dhaka",
            'type'           => "committee",
            'finger_id'      => rand(3000,5000),
            'gender'         => rand(0,1)? 'male':'female',
            'id_no'          => rand(3000,5000),
            'mobile_number'  => "01588464864",
            'designation_id' =>  $designations[4]->id,

        ]);
        Teacher::create([
            'name'           => "Wing Commander Lutfun Nahar, psc",
            'type'           => "committee",
            'finger_id'      => rand(3000,5000),
            'gender'         => rand(0,1)? 'male':'female',
            'id_no'          => rand(3000,5000),
            'mobile_number'  => "01588464864",
            'designation_id' =>  $designations[5]->id,

        ]);



    }
}
