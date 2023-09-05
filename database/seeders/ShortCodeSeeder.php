<?php

namespace Database\Seeders;

use App\Models\SubMarksDistType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShortCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubMarksDistType::create([
            'title' => "MCQ",
            'details' => "Multiple Choice Question"
        ]);
        SubMarksDistType::create([
            'title' => "Subjective",
            'details' => "Subjective"
        ]);

        SubMarksDistType::create([
            'title' => "CL",
            'details' => "Class Test"
        ]);
    }
}
