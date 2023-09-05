<?php

namespace Database\Seeders;

use App\Models\Shift;

use Illuminate\Database\Seeder;

class ShiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $classes = \App\Models\InsClass::get()->take(3);

        foreach ($classes as $class){
            Shift::create([
                'ins_class_id'  => $class->id,
                'name'          => 'N/A'
            ]);
        }



    }
}
