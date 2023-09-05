<?php

namespace Database\Seeders;

use App\Models\SchoolInfo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SchoolInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SchoolInfo::create([
            'name'          => 'MAHI CARE EDUCATION',
            'logo'          => 'logo.jpg',
            'eiin_no'       =>  500765,
            'school_photo'  =>  'event.png',
            'founded_at'    =>  2000,
            'about'         => 'Formed in 1898, the Educational Committee (Anjuman-i Ma arf) was the first organized program to promote educational reform not funded by the state.[8] The committee was composed of members of foreign services, ulama, wealthy merchants, physicians, and other prominent people.',
            'address'       => '2/4 Block G, 3rd Floor, Lalmatia, Dhaka-1207'
        ]);
    }
}
