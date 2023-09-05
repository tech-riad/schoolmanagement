<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        News::UpdateOrCreate([
           'title'=>'Technology',
           'published_date'=>'2022/12/19',
           'description'=>'High Time for Cyberlaw Enforcement and a Future of Work Strategy',
           'slug'=>'Technology',
           'image'=>'gal1.png',
           'status'=>'1',

        ]);
        News::UpdateOrCreate([
           'title'=>'Hospital',
           'published_date'=>'2022/12/19',
           'description'=>'Hospital management system is a computer system that helps manage the information related to health care and aids in the job completion of health care providers effectively.',
           'slug'=>'Hospital',
           'image'=>'gal2.png',
           'status'=>'1',

        ]);
    }
}
