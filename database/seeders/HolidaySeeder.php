<?php

namespace Database\Seeders;

use App\Models\Holiday;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HolidaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Holiday::create([
            'title' => "Victory Day",
            'type'  => "holiday",
            'start' => "2022-12-16",
        ]);
        Holiday::create([
            'title' => "Christmas Day",
            'type'  => "holiday",
            'start' => "2022-12-25",
        ]);
        Holiday::create([
            'title' => "Boxing Day",
            'type'  => "holiday",
            'start' => "2022-12-26",
        ]);
    }
}
