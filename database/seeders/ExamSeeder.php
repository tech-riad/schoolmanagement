<?php

namespace Database\Seeders;

use App\Models\Exam;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Exam::create([
            'name'       => '1st Semister',
            'start_date' => '2023-02-22',
            'end_date'   => '2023-02-22',
        ]);

        Exam::create([
            'name'      => '2nd Semister',
            'start_date' => '2023-02-22',
            'end_date'   => '2023-02-22',
        ]);

        Exam::create([
            'name'      => '3rd Semister',
            'start_date' => '2023-02-22',
            'end_date'   => '2023-02-22',
        ]);
    }
}
