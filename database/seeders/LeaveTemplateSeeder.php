<?php

namespace Database\Seeders;

use App\Models\LeaveTemplate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LeaveTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LeaveTemplate::updateOrCreate([
            'title'         => 'Sick Leave',
            'application'   => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout'
        ]);

        LeaveTemplate::updateOrCreate([
            'title'         => 'Casual Leave',
            'application'   => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout'
        ]);
    }
}
