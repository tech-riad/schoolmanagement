<?php

namespace Database\Seeders;
use App\Models\Video;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Video::create([
            'title'  => "Open School's Institut Constructivism School this Fast",
            'thumbnail'=> 'default.png',
            'description'   => 'description',
            'date'  => 'Feb 13, 17',
            'type'  => 'vimeo',
            'code' => '783455338',
            'status' => '1',
           ]);
        Video::create([
            'title'  => "Open School's Institut Constructivism School this Fast",
            'thumbnail'=> 'default.png',
            'description'   => 'description',
            'date'  => 'Feb 13, 17',

            'code' => 'BpUtCjC9ggo',
            'status' => '1',
           ]);
        Video::create([
            'title'  => "Open School's Institut Constructivism School this Fast",
            'thumbnail'=> 'default.png',
            'description'   => 'description',
            'date'  => 'Feb 13, 17',
            'type'  => 'vimeo',
            'code' => '787100106',
            'status' => '1',
           ]);

    }
}
