<?php

namespace Database\Seeders;

use App\Models\IdcardTheam;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IdcardTheamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        IdcardTheam::updateOrCreate([
            'name'  => 'Type-1',
            'image' => 'idcard1.png'
        ]);

        IdcardTheam::updateOrCreate([
            'name'  => 'Type-2',
            'image' => 'idcard2.png'
        ]);

        IdcardTheam::updateOrCreate([
            'name'  => 'Type-3',
            'image' => 'idcard3.png'
        ]);
    }
}
