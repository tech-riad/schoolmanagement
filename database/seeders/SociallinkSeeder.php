<?php

namespace Database\Seeders;

use App\Models\Sociallink;
use Illuminate\Database\Seeder;

class SociallinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sociallink::updateOrCreate([
            'facebook'  => 'https://www.facebook.com/',
            'linkedin'=> 'https://www.linkedin.com/',
            'twitter'=> 'https://twitter.com/',
            'youtube'=> 'https://www.youtube.com/',

           ]);
    }
}
