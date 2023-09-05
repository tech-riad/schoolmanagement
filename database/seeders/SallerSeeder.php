<?php

namespace Database\Seeders;

use App\Models\Seller;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SallerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seller::updateOrCreate([
        //     'institute_id'  => 1,
        //     'name'          => 'Faysal Ahmed',
        //     'phone'         =>  '01771501865',
        //     'email'         => 'faysalahmed@gmail.com',
        //     'sms_balance'   =>  500,
        //     'payment_method'=> 'online',
        //     'payment_status'=> 'paid',
        //     'district'      => 'Rajshahi',
        //     'upazila'       => 'Putia',
        //     'password'      => bcrypt(11111111),
        //     'status'        => 'active',
        // ]);
    }
}
