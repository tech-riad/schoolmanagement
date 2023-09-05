<?php

namespace Database\Seeders;

use App\Models\Ataglance;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GlanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ataglance::UpdateOrCreate([
            'content'=>'<ul><li>প্রতিষ্ঠানের নাম: বিএএফ শাহীন কলেজ ঢাকা (BAF Shaheen College Dhaka)</li><li>প্রতিষ্ঠা: ১ মার্চ, ১৯৬০ (ইংরেজি মাধ্যম স্কুল হিসেবে)</li><li>শিক্ষা বোর্ডের স্বীকৃতি: ৩১ অক্টোবর, ১৯৬২</li><li>ইংরেজির পাশাপাশি বাংলা মাধ্যম চালু: ১ জানুয়ারি ১৯৬৭</li><li>শুধু বাংলা মাধ্যম চালু: ১ জানুয়ারি ১৯৭১</li><li>উচ্চমাধ্যমিক কলেজে উন্নীত: ১ জুলাই ১৯৭৭</li><li>বাংলার পাশাপাশি ইংরেজি মাধ্যম চালু: ১ জানুয়ারি ২০০৬</li><li>দ্বিতীয় শিফট চালু (১ম শ্রেণি পর্যন্ত): ১ জানুয়ারি ২০১৫</li><li>ডিগ্রি কলেজে উন্নীত: ১৯৯০-৯১ শিক্ষাবর্ষ</li><li>ডিগ্রি অবলুপ্ত: ২০০৬-২০০৭</li><li>স্কুলের স্বীকৃতি: ১ জুলাই ১৯৬২</li><li>কলেজের স্বীকৃতি: ১ জুলাই ১৯৭৮</li><li>স্কুল কোড: ১২৭২</li><li>কলেজ কোড: ১০৫১</li><li>EIIN: 500765</li></ul>'

        ]);

    }
}
