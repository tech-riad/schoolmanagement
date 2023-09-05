<?php

namespace Database\Seeders;

use App\Models\Getintouch;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GetInTouchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GetInTouch::updateOrCreate([
            'phone'  => '+8801407020100',
            'email'  => 'info@schoolcollege.com',
            'address'=> '2/4 Block G, 3rd Floor, Lalmatia, Dhaka-1207'
           ]);
      
    }
}
