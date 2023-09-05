<?php

namespace Database\Seeders;

use App\Models\Religion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReligionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Religion::updateOrCreate([
            'name'  => 'Islam'
        ]);

        Religion::updateOrCreate([
            'name'  => 'Hinduism'
        ]);

        Religion::updateOrCreate([
            'name'  => 'Christianity'
        ]);
        Religion::updateOrCreate([
            'name'  => 'Buddhism'
        ]);
        Religion::updateOrCreate([
            'name'  => 'Others'
        ]);

    }
}
