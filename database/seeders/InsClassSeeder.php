<?php

namespace Database\Seeders;

use App\Models\InsClass;

use Illuminate\Database\Seeder;

class InsClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $session = \App\Models\Session::first();

        InsClass::updateOrcreate([
            'session_id'    => $session->id,
            'name'  => 'Six',
            'code'  => '006',
            'status'=> 1
        ]);

        InsClass::updateOrcreate([
            'session_id'    => $session->id,
            'name'  => 'Seven',
            'code'  => '007',
            'status'=> 1
        ]);

        InsClass::updateOrcreate([
            'session_id'    => $session->id,
            'name'  => 'Eight',
            'code'  => '008',
            'status'=> 1
        ]);
    }
}
