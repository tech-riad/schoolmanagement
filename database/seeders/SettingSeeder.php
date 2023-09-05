<?php

namespace Database\Seeders;

use App\Models\AcademicSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AcademicSetting::updateOrCreate([
            'admit_content'=>'<P>This Is Admit Content</P>',
            'id_card_content'=>'<P>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s</P> ',
            
            'transfer_certificate_content'=>'<p>This is to consenting that :name, :mother, :father of Village – :village, Post Office: Post, :thana, District –:District. His date of birth is : and had been studying in :class in this school up to the dated : 31/12/88. All the dues from him was received with understanding up to the dated : 31/12/88. He was passed the add mission test examination of :classI. At present he is Studying at…………………….. Remarks of Student Study progress Satisfactory I with all his Success in life.</p> ',
            'school_name'=>'Mohammadpur High School ',
            'image'=>' image_1671299514.jpg ',
            'testimonial_content'=>'<p>This is to consenting that :name, :mother, :father of Village – :village, Post Office: Post, :thana, District –:District. His date of birth is : and had been studying in :class in this school up to the dated : 31/12/88. All the dues from him was received with understanding up to the dated : 31/12/88. He was passed the add mission test examination of :classI. At present he is Studying at…………………….. Remarks of Student Study progress Satisfactory I with all his Success in life.</p> ',
        ]);
    }
}
