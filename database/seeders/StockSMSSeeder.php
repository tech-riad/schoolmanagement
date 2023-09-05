<?php

namespace Database\Seeders;

use App\Models\StockSms;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StockSMSSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StockSms::updateOrCreate([
            'total_balance' => 0,
            'total_spend'   => 0,
            'currentBalance'=> 0,
            'alertBalance'  => 50,
        ]);
    }
}
