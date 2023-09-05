<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Branch::create([
            'title' => "Dhaka",

        ]);
        Branch::create([
            'title' => "Cumilla",

        ]);
        Branch::create([
            'title' => "Rajshahi",

        ]);
    }
}
