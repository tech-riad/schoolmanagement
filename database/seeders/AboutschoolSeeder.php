<?php

namespace Database\Seeders;
use App\Models\Aboutschool;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutschoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Aboutschool::updateOrCreate([
            'content'  => 'Please input an email address down below. address down below school. Please input an email. Below and school.',
            'link'=> 'getboard.com',
            
           ]);
    }
}
