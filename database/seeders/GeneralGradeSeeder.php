<?php

namespace Database\Seeders;

use App\Models\GeneralGrade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GeneralGradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GeneralGrade::updateOrCreate([
            'ins_class_id'  => 1,
            'gpa_name'      => 'A+',
            'range_from'    => 100,
            'range_to'      => 80,
            'gpa_point'     => 5.0,
        ]);

        GeneralGrade::updateOrCreate([
            'ins_class_id'  => 1,
            'gpa_name'      => 'A',
            'range_from'    => 79,
            'range_to'      => 60,
            'gpa_point'     => 4.0,
        ]);
    }
}
