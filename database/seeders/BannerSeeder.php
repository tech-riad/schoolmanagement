<?php

namespace Database\Seeders;
use App\Models\Banner;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Banner::create([
            'imagetitle'  => 'Image',
            'description'      => 'Seeder Data',
            'image'          => '/banner/banner_image_xe0k3T4K1679894472.jpg',
            'slug'          => 'sky',
            'sl_no'          => '01',
            'status'          => '1',
           ]);
        Banner::create([
            'imagetitle'  => 'Image',
            'description'      => 'Seeder Data',
            'image'          => '/banner/banner_image_xe0k3T4K1679894472.jpg',
            'slug'          => 'sky',
            'sl_no'          => '02',
            'status'          => '1',
           ]);
        Banner::create([
            'imagetitle'  => 'Image',
            'description'      => 'Seeder Data',
            'image'          => '/banner/banner_image_xe0k3T4K1679894472.jpg',
            'slug'          => 'sky',
            'sl_no'          => '03',
            'status'          => '1',
           ]);
    }
}
