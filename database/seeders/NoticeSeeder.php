<?php

namespace Database\Seeders;

use App\Models\Notice;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NoticeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()


    {
        Notice::create([
            'title'          => 'এসএসসি ও সমমান পরীক্ষা ২০২২ স্থগিত প্রসঙ্গে ',
            'published_date' => '১৯/১০/২০২২',
            'content'        => 'এসএসসি ও সমমান পরীক্ষা ২০২২ স্থগিত প্রসঙ্গে ',
            'slug'           => 'notice',
            'status'         => '1',
           ]);

        Notice::create([
            'title'  => '6Sep সেপ্টেম্বর ২০২২ মাসের বেতন (পূর্বের বকেয়াসহ) পরিশোধ প্রসঙ্গে। ',
            'published_date'  => '১৯/১০/২০২২',
            'content'      => '6Sep সেপ্টেম্বর ২০২২ মাসের বেতন (পূর্বের বকেয়াসহ) পরিশোধ প্রসঙ্গে। ',
            'slug'          => 'notice',
            'status'          => '1',
           ]);
        Notice::create([
            'title'  => '১৯/১০/২০২২ তারিখে ১০ম-২০২২ শ্রেণির টেস্ট পরীক্ষা শুরু হবে।',
            'published_date'  => '১৯/১০/২০২২',
            'content'      => '১৯/১০/২০২২ তারিখে ১০ম-২০২২ শ্রেণির টেস্ট পরীক্ষা শুরু হবে।',
            'slug'          => 'notice',
            'status'          => '1',
           ]);
    }
}
