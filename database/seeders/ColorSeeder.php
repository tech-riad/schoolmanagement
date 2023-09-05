<?php

namespace Database\Seeders;

use App\Models\Color;
use App\Models\FrontSection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sections = FrontSection::all();

        foreach ($sections as $key => $section) {
            Color::create([
                'front_section_id' =>$section->id,
            ]);
        }

    }
}
