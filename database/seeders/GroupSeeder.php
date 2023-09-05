<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $classes = \App\Models\InsClass::get()->take(3);
        $shift   = \App\Models\Shift::where('ins_class_id',$classes[0]->id)->first();


        foreach ($classes as $class){
            Group::updateOrCreate([
                'ins_class_id'  => $class->id,
                'shift_id'      => $shift->id,
                'name'          => 'N/A'
            ]);
        }
    }
}
