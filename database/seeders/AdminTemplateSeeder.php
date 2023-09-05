<?php

namespace Database\Seeders;

use App\Helper\Helper;
use App\Models\BackendTemplate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $template = BackendTemplate::create([
            'name' => 'Template 1',
            'path_name' => 'template1',
            // 'thumbnail' => 'theme-thumbnail-1.png'
        ]);

       DB::table('backend_template_institution')->insert([
          'institution_id'      => Helper::getInstituteId(),
          'backend_template_id' =>  $template->id
       ]);

        BackendTemplate::create([
            'name' => 'Template 2',
            'path_name' => 'template2',
            // 'thumbnail' => 'theme-thumbnail-2.png',
        ]);
    }
}
