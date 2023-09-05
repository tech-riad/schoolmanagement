<?php

namespace Database\Seeders;

use App\Models\Institutephoto;
use Illuminate\Database\Seeder;

class InstitutephotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Institutephoto::create([
            'title'     => 'Instute Photo',
            'image'     => 'default.png',
            'sl_no'     => '01',
            'status'    => '1',
           ]);
        Institutephoto::create([
            'title'     => 'Instute Photo',
            'image'     => 'default.png',
            'sl_no'     => '02',
            'status'    => '1',
           ]);
        Institutephoto::create([
            'title'     => 'Instute Photo',
            'image'     => 'default.png',
            'sl_no'     => '03',
            'status'    => '1',
           ]);
        Institutephoto::create([
            'title'     => 'Instute Photo',
            'image'     => 'default.png',
            'sl_no'     => '04',
            'status'    => '1',
           ]);
        Institutephoto::create([
            'title'     => 'Instute Photo',
            'image'     => 'default.png',
            'sl_no'     => '05',
            'status'    => '1',
           ]);
        Institutephoto::create([
            'title'     => 'Instute Photo',
            'image'     => 'default.png',
            'sl_no'     => '06',
            'status'    => '1',
           ]);
    }
}
