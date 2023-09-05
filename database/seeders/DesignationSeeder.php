<?php

namespace Database\Seeders;

use App\Models\Designation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DesignationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Designation::create([
            'title' => "Teacher",

        ]);
        Designation::create([
            'title' => "Staff",

        ]);
        Designation::create([
            'title' => "Chairman",

        ]);
        Designation::create([
            'title' => "Guardian Representative",

        ]);
        Designation::create([
            'title' => "Member Secretary",

        ]);
        Designation::create([
            'title' => "Committee",

        ]);
        
    }
}
