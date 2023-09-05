<?php

namespace Database\Seeders;

use App\Models\PeriodTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeriodTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PeriodTime::create([
            'shift_id'    => 1,
            'period_name' => "1st Period",
            'start_time'  => "10:00 AM",
            'end_time'    => "02:00 PM",
        ]);
        PeriodTime::create([
            'shift_id'    => 1,
            'period_name' => "2nd Period",
            'start_time'  => "10:00 AM",
            'end_time'    => "02:00 PM",
        ]);
        PeriodTime::create([
            'shift_id'    => 1,
            'period_name' => "3rd Period",
            'start_time'  => "10:00 AM",
            'end_time'    => "02:00 PM",
        ]);
        PeriodTime::create([
            'shift_id'    => 1,
            'period_name' => "4th Period",
            'start_time'  => "10:00 AM",
            'end_time'    => "02:00 PM",
        ]);
        PeriodTime::create([
            'shift_id'    => 1,
            'period_name' => "5th Period",
            'start_time'  => "10:00 AM",
            'end_time'    => "02:00 PM",
        ]);
        PeriodTime::create([
            'shift_id'    => 1,
            'period_name' => "6th Period",
            'start_time'  => "10:00 AM",
            'end_time'    => "02:00 PM",
        ]);
    }
}
