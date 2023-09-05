<?php

namespace Database\Seeders;

use App\Models\FeesType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeesTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FeesType::create([
            'type'=> 'Admission Fees',
            'created_by' => '1',
           ]);
        FeesType::create([
            'type'=> 'Regular Fees',
            'created_by' => '1',
           ]);
        FeesType::create([
            'type'=> 'Exam Fees',
            'created_by' => '1',
           ]);
        FeesType::create([
            'type'=> 'Other Fees',
            'created_by' => '1',
           ]);
    }
}
