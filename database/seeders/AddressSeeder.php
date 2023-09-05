<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sql  = public_path('divisions.sql');
        $sql2 = public_path('districts.sql');
        $sql3 = public_path('upazilas.sql');

        //for windows
        DB::unprepared(file_get_contents($sql));
        DB::unprepared(file_get_contents($sql2));
        DB::unprepared(file_get_contents($sql3));


        //for linux
        
        // $command1 =  "mysql -h".env('DB_HOST')." -u".env('DB_USERNAME')." ".(env('DB_PASSWORD')?"-p'".env('DB_PASSWORD')."'":'')." ".env('DB_DATABASE')." < ".$sql;
        // exec($command1);

        // $command2 =  "mysql -h".env('DB_HOST')." -u".env('DB_USERNAME')." ".(env('DB_PASSWORD')?"-p'".env('DB_PASSWORD')."'":'')." ".env('DB_DATABASE')." < ".$sql2;
        // exec($command2);

        // $command3 =  "mysql -h".env('DB_HOST')." -u".env('DB_USERNAME')." ".(env('DB_PASSWORD')?"-p'".env('DB_PASSWORD')."'":'')." ".env('DB_DATABASE')." < ".$sql3;
        // exec($command3);


    }
}
