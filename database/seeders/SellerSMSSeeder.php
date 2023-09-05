<?php

namespace Database\Seeders;

use App\Models\SellerSmsPackage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SellerSMSSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SellerSmsPackage::updateOrCreate([
            'seller_id' => 1,
            'title'     => 'Basic',
            'total_sms' => 5000,
            'sms_rate'  => 0.32,
            'amount'    => 1600,
            'status'    => 'active',
        ]);

        SellerSmsPackage::updateOrCreate([
            'seller_id' => 1,
            'title'     => 'Package SMS',
            'total_sms' => 500,
            'sms_rate'  => 0.32,
            'amount'    => 160,
            'status'    => 'active',
        ]);

        SellerSmsPackage::updateOrCreate([
            'seller_id' => 1,
            'title'     => 'Standard SMS Package',
            'total_sms' => 3000,
            'sms_rate'  => 0.27,
            'amount'    => 810,
            'status'    => 'active',
        ]);
    }
}
