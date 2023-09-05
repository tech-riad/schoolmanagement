<?php

namespace Database\Seeders;

use App\Models\FrontSection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FrontSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FrontSection::create([
            'name'  => 'Header',
            // 'title' => 'this is header section',
        ]);
        FrontSection::create([
            'name'  => 'Menubar',
            // 'title' => 'this is header section',
        ]);
        FrontSection::create([
            'name'  => 'Marquee',
            // 'title' => 'this is header section',
        ]);
        FrontSection::create([
            'name'  => 'Programs',
            // 'title' => 'this is header section',
        ]);
        FrontSection::create([
            'name'  => 'LatestNews',
            // 'title' => 'this is header section',
        ]);
        FrontSection::create([
            'name'  => 'VisiteSchool',
            // 'title' => 'this is header section',
        ]);
        FrontSection::create([
            'name'  => 'WhyChooseUs',
            // 'title' => 'this is header section',
        ]);
        FrontSection::create([
            'name'  => 'VisiteSchool',
            // 'title' => 'this is header section',
        ]);
        FrontSection::create([
            'name'  => 'Blog',
            // 'title' => 'this is header section',
        ]);
        FrontSection::create([
            'name'  => 'Event',
            // 'title' => 'this is header section',
        ]);
        FrontSection::create([
            'name'  => 'Gallery',
            // 'title' => 'this is header section',
        ]);
        FrontSection::create([
            'name'  => 'Footer',
            // 'title' => 'this is header section',
        ]); 
        FrontSection::create([
            'name'  => 'TinyFooter',
            // 'title' => 'this is header section',
        ]);
    }
}
