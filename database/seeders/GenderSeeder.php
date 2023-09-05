<?php

namespace Database\Seeders;

use App\Models\Gender;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gender::updateOrCreate([
            'name'  => 'Male',
        ]);

        Gender::updateOrCreate([
            'name'  => 'Female',
        ]);

        Gender::updateOrCreate([
            'name'  => 'Others',
        ]);
    }
}
