<?php

namespace Database\Seeders;

use App\Models\Institution;

use Illuminate\Database\Seeder;

class InstituteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Institution::updateOrCreate([
            'id'               => '4',
            'institution_id'   => 'sc1',
            'seller_id'        => '1',
            'institution_package_id'  => '1',
            'title'            => 'schoolcollege',
            'domain'           => 'schoolcollege.xyz',
            'principal_name'   => 'Mr schoolcollege',
            'phone'            => '091887787',
            'email'            => 'principle@schoolcollege.xyz',
            'password'         =>  bcrypt(87654321),
            'district_id'      => '1',
            'upazila_id'       => '1',
            'payment_method'   => 'online',
            'active_date'      => '2024-01-15',
            'expire_date'      => '2024-02-15',
            'trial_period_end' => '2024-01-10',
            'status'=>'active'
        ]);


        Institution::updateOrCreate([
            'id'               => '2',
            'institution_id'   => 'sc1',
            'seller_id'        => '1',
            'institution_package_id'  => '1',
            'title'            => 'Dev Schoolcollege',
            'domain'           => 'dev.schoolcollege.xyz',
            'principal_name'   => 'Mr schoolcollege',
            'phone'            => '09188778709',
            'email'            => 'dev@schoolcollege.xyz',
            'password'         =>  bcrypt(87654321),
            'district_id'      => '1',
            'upazila_id'       => '1',
            'payment_method'   => 'online',
            'active_date'      => '2024-01-15',
            'expire_date'      => '2024-02-15',
            'trial_period_end' => '2024-01-10',
            'status'=>'active'
        ]);
        Institution::updateOrCreate([
            'id'               => '3',
            'institution_id'   => 'sc1',
            'seller_id'        => '1',
            'institution_package_id'  => '1',
            'title'            => 'schoolcollege',
            'domain'           => 'localhost:90',
            'principal_name'   => 'Mr schoolcollege',
            'phone'            => '091887454787',
            'email'            => 'sajid@gmail.com',
            'password'         =>  bcrypt(87654321),
            'district_id'      => '1',
            'upazila_id'       => '1',
            'payment_method'   => 'online',
            'active_date'      => '2024-01-15',
            'expire_date'      => '2024-01-15',
            'trial_period_end' => '2024-01-10',
            'status'=>'active'
        ]);
        Institution::updateOrCreate([

            'institution_id'   => 'sc1',
            'seller_id'        => '1',
            'institution_package_id'  => '1',
            'title'            => 'schoolcollege',
            'domain'           => 'localhost',
            'principal_name'   => 'Mr schoolcollege',
            'phone'            => '091887454787',
            'email'            => 'sajid@gmail.com',
            'password'         =>  bcrypt(87654321),
            'district_id'      => '1',
            'upazila_id'       => '1',
            'payment_method'   => 'online',
            'active_date'      => '2024-01-15',
            'expire_date'      => '2024-01-15',
            'trial_period_end' => '2024-01-10',
            'status'=>'active'
        ]);

        Institution::updateOrCreate([
            'id'               => '1',
            'institution_id'   => 'sc1',
            'seller_id'        => '1',
            'institution_package_id'  => '1',
            'title'            => 'Localhost',
            'domain'           => '127.0.0.1:8000',
            'principal_name'   => 'Mr schoolcollege',
            'phone'            => '091887787',
            'email'            => 'localhost@schoolcollege.xyz',
            'password'         =>  bcrypt(87654321),
            'district_id'      => '1',
            'upazila_id'       => '1',
            'payment_method'   => 'online',
            'active_date'      => '2024-01-15',
            'expire_date'      => '2024-02-15',
            'trial_period_end' => '2024-01-10',
            'status'=>'active'
        ]);


    }
}
