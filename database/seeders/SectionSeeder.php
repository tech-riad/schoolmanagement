<?php

namespace Database\Seeders;

use App\Helper\Helper;
use App\Models\Section;

use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $classes = \App\Models\InsClass::with('shifts')->get()->take(3);
        $shift   = \App\Models\Shift::where('ins_class_id',$classes[0]->id)->first();

        foreach ($classes as $class){
            Section::updateOrCreate([
                'institute_id'  => Helper::getInstituteId(),
                'ins_class_id'  => $class->id,
                'shift_id'      => $shift->id,
                'name'          => 'N/A'
            ]);
        }

    }
}
