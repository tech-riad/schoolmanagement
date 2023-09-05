<?php

namespace Database\Seeders;

use App\Models\InsTemplate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        InsTemplate::create([
            'name' => 'Theme 1',
            'path_name' => 'theme1',
            'thumbnail' => 'theme-thumbnail-1.png'
        ]);

        InsTemplate::create([
            'name' => 'Theme 2',
            'path_name' => 'theme2',
            'thumbnail' => 'theme-thumbnail-2.png',
        ]);
        InsTemplate::create([
            'name' => 'Theme 3',
            'path_name' => 'theme3',
            'thumbnail' => 'theme-thumbnail-2.png',
        ]);
        InsTemplate::create([
            'name' => 'Theme 4',
            'path_name' => 'theme4',
            'thumbnail' => 'theme-thumbnail-3.png',
        ]);
    }
}
